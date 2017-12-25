<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\DependencyInjection\ContainerInterface;
use App\Entity\RoadEvent;
use App\Entity\Roadway;
use App\Entity\Camera;
use App\Entity\Sign;
use App\Entity\WinterRoadCondition;
use App\Entity\RoadAlert;
use Doctrine\ORM\EntityManagerInterface;

class AppImportJsonCommand extends Command
{
    protected static $defaultName = 'app:import-json';

    private $projectDir;
    private $em;

    public function __construct(ContainerInterface $container, EntityManagerInterface $em)
    {
        parent::__construct();
        $this->projectDir = $container->getParameter("kernel.project_dir");
        $this->em = $em;
    }

    protected function configure()
    {
        $this
            ->setDescription('Add a short description for your command')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        $output->writeln($this->projectDir);

        $dataFiles = scandir($this->projectDir . "/data");
        foreach ($dataFiles as $file) {
            if (substr($file, -4) != "json") {
                continue;
            }
            // Filenames will be in the format:
            // 2017_10_01_15_00_03-getevents-f1e4b673bfdf03fa1d761d692ed1271c.json
            $category = $this->getFileCategory($file);
            $output->writeln($file);
            $className = null;
            switch ($category) {
                case "getevents":
                    $className = RoadEvent::class;
                    break;
                case "getroadways":
                    $className = Roadway::class;
                    break;
                case "getcameras":
                    $className = Camera::class;
                    break;
                case "getmessagesigns":
                    $className = Sign::class;
                    break;
                case "getwinterroadconditions":
                    $className = WinterRoadCondition::class;
                    break;
                case "getalerts":
                    $className = RoadAlert::class;
                    break;
            }
            $content = file_get_contents($this->projectDir . "/data/" . $file);
            $data = json_decode($content, true);
            foreach ($data as $item) {
                $obj = new $className();
                // Winter Road Conditions don't have a nice unique identifier or timestamp,
                // so this has to be more complicated
                if ($className == WinterRoadCondition::class) {
                    $this->setWinterRoadConditions($obj, $item, $file);
                }
                foreach ($item as $key => $value) {
                    if (strtolower($key) == "id") {
                        $obj->setDotId($value);
                    } else {
                        $obj->{"set".ucfirst($key)}($value);
                    }
                }
                if ($this->passUniqueCheck($className, $obj)) {
                    $this->em->persist($obj);
                }
            }
            $this->em->flush();
            $this->em->clear();
        }

        $io->success('Complete');
    }

    private function passUniqueCheck($className, $obj) {
        $match = null;
        if (in_array($className, [Camera::class, RoadAlert::class, RoadEvent::class, Sign::class])) {
            // check DotID for these classes
            $match = $this->em->getRepository($className)
                ->findOneBy(["dotId" => $obj->getDotId()]);
        } else if (in_array($className, [Roadway::class])) {
            // check name for these classes
            $match = $this->em->getRepository($className)
                ->findOneBy(["name" => $obj->getName()]);
        } else {
            // No unique value to check
            return true;
        }
        if ($match) {
            // It is not unique
            return false;
        } else {
            // Match is null, it is unique
            return true;
        }
    }

    /**
     * Pull file category (getevents, getroadways, etc.) from file name in the format:
     *   2017_10_01_15_00_03-getevents-f1e4b673bfdf03fa1d761d692ed1271c.json
     * @param string
     * @return boolean|string
     */
    private function getFileCategory($filename)
    {
        $parts = explode("-", $filename);
        if (count($parts) == 1) {
            // Only one part, incorrect filename format
            return false;
        }
        return $parts[1];
    }

    /**
     * @param $obj WinterRoadCondition
     * @param $item array Associative array from JSON data
     * @param $file filename
     */
    private function setWinterRoadConditions($obj, $item, $file)
    {
        $dateString = explode("-", $file)[0];
        $date = \DateTime::createFromFormat("Y_m_d_G_i_s", $dateString);
        $obj->setTimestamp($date);
    }
}
