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
            $output->writeln($category);
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
                foreach ($item as $key => $value) {
                    if (strtolower($key) == "id") {
                        $obj->setDotId($value);
                    } else {
                        $obj->{"set".ucfirst($key)}($value);
                    }
                }
                $this->em->persist($obj);
            }
            $this->em->flush();
            $this->em->clear();
        }

        $io->success('Complete');
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
}
