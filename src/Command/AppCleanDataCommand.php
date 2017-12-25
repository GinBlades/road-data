<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Doctrine\ORM\EntityManagerInterface;

class AppCleanDataCommand extends Command
{
    protected static $defaultName = 'app:clean-data';

    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct();
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

        $this->cleanEvents();

        $io->success('Complete');
    }

    private function cleanEvents()
    {
        $query = $this->em->createQuery("SELECT DISTINCT e.dotId FROM App:RoadEvent e");
        $dotIds = $query->getScalarResult();
        foreach($dotIds as $dotId) {
            $matchQuery = $this->em->createQuery("SELECT e FROM App:RoadEvent e WHERE e.dotId = :dotId")
                ->setParameter("dotId", $dotId["dotId"]);
            $matchingEvents = $matchQuery->getResult();
            if (count($matchingEvents) > 1) {
                foreach(array_slice($matchingEvents, 1) as $event) {
                    $this->em->remove($event);
                }
                $this->em->flush();
                $this->em->clear();
            }
        }
    }
}
