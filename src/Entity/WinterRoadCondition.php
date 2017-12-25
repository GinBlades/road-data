<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\WinterRoadConditionRepository")
 */
class WinterRoadCondition
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $roadCondition;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $areaName;

    /**
     * @ORM\Column(type="string", length=510)
     */
    private $locationDescription;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $roadwayName;

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
    public function getRoadCondition()
    {
        return $this->roadCondition;
    }

    /**
     * @param string
     */
    public function setRoadCondition($roadCondition)
    {
        $this->roadCondition = $roadCondition;
    }

    /**
        * @return string
     */
    public function getAreaName()
    {
        return $this->areaName;
    }

    /**
     * @param string
     */
    public function setAreaName($areaName)
    {
        $this->areaName = $areaName;
    }

    /**
        * @return string
     */
    public function getLocationDescription()
    {
        return $this->locationDescription;
    }

    /**
     * @param string
     */
    public function setLocationDescription($locationDescription)
    {
        $this->locationDescription = $locationDescription;
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
     * For import from JSON
     * @param string
     */
    public function setCondition($roadCondition)
    {
        $this->roadCondition = $roadCondition;
    }
}
