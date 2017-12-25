<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\RoadEvent;
use Doctrine\ORM\EntityManagerInterface;

class RoadEventController extends Controller
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }
    /**
     * @Route("/event", name="road_event")
     */
    public function index()
    {
        $query = $this->em->createQuery(<<<DQL
    SELECT e FROM App:RoadEvent e
    ORDER BY e.dotId
DQL
)->setMaxResults(20);
        $events = $query->getResult();
        return $this->render('RoadEvent/index.html.twig', [
            "events" => $events
        ]);
    }
}
