<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CameraRepository")
 */
class Camera
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
    private $directionOfTravel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $roadwayName;

    /**
     * @ORM\Column(type="string", length=510)
     */
    private $url;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $disabled;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $blocked;

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param float
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }


    /**
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param float
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
    public function getRoadwayName()
    {
        return $this->roadwayName;
    }

    /**
     * @param string
     */
    public function setRoadwayName($roadwayName)
    {
        $this->roadwayName = $roadwayName;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return boolean
     */
    public function getDisabled()
    {
        return $this->disabled;
    }

    /**
     * @param boolean
     */
    public function setDisabled($disabled)
    {
        $this->disabled = $disabled;
    }


    /**
     * @return boolean
     */
    public function getBlocked()
    {
        return $this->blocked;
    }

    /**
     * @param boolean
     */
    public function setBlocked($blocked)
    {
        $this->blocked = $blocked;
    }
}
