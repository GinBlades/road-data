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
     * @ORM\Column(type="string", length=255, nullable=true)
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
     * @ORM\Column(type="datetime")
     */
    private $timestamp;

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
     * @return \DateTime
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @param string
     */
    public function setTimestamp($timestamp)
    {
        if (is_string($timestamp)) {
            $timestamp = $this->dateFromJson($timestamp);
        }

        $this->timestamp = $timestamp;
    }

    /**
     * For import from JSON
     * @param string
     */
    public function setCondition($roadCondition)
    {
        $this->roadCondition = $roadCondition;
    }

    /**
     * Data will have dates like this:
     *   "LastUpdated": "18/09/2017 13:38:59",
     * @param string
     *
     * @return \DateTime
     */
    public function dateFromJson($dateString)
    {
        if (empty($dateString)) {
            return null;
        }

        // createFromFormat returns false if dateString does not fit format
        $properDate = \DateTime::createFromFormat("d/m/Y G:i:s", $dateString);
        if (!$properDate) {
            throw new \Exception("Unable to set date from $dateString");
        }
        return $properDate;
    }
}
