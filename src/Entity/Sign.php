<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SignRepository")
 */
class Sign
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $latitude;

    /**
     * @ORM\Column(type="float")
     */
    private $longitude;

    /**
     * @ORM\Column(type="string", length=120, unique=true)
     */
    private $dotId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $roadway;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $directionOfTravel;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $messages;

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param string
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * @return string
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param string
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * @return string
     */
    public function getDotId()
    {
        return $this->dotId;
    }

    /**
     * @param string
     */
    public function setDotId($dotId)
    {
        $this->dotId = $dotId;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getRoadway()
    {
        return $this->roadway;
    }

    /**
     * @param string
     */
    public function setRoadway($roadway)
    {
        $this->roadway = $roadway;
    }

    /**
     * @return string
     */
    public function getDirectionOfTravel()
    {
        return $this->directionOfTravel;
    }

    /**
     * @param string
     */
    public function setDirectionOfTravel($directionOfTravel)
    {
        $this->directionOfTravel = $directionOfTravel;
    }

    /**
     * @return string
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * @param string
     */
    public function setMessages($messages)
    {
        if (is_array($messages)) {
            $messages = implode("|", $messages);
        }
        
        $this->messages = $messages;
    }
}
