<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RoadEventRepository")
 */
class RoadEvent
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $lastUpdated;

    /**
     * @ORM\Column(type="float")
     */
    private $latitude;

    /**
     * @ORM\Column(type="float")
     */
    private $longitude;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $plannedEndDate;

    /**
     * @ORM\Column(type="datetime")
     */
    private $reported;

    /**
     * @ORM\Column(type="datetime")
     */
    private $startDate;

    /**
     * @ORM\Column(type="string", length=120, unique=true)
     */
    private $dotId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $regionName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $countyName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $severity;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $roadwayName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $directionOfTravel;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $location;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lanesAffected;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lanesStatus;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lcsEntries;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $navteqLinkId;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $primaryLocation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $secondaryLocation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $firstArticleCity;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $secondCity;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $eventType;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $eventSubType;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $mapEncodedPolyline;

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
    public function getLastUpdated()
    {
        return $this->lastUpdated;
    }

    /**
     * @param string
     */
    public function setLastUpdated($lastUpdated)
    {
        if (is_string($lastUpdated)) {
            $lastUpdated = $this->dateFromJson($lastUpdated);
        }

        $this->lastUpdated = $lastUpdated;
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
    public function getPlannedEndDate()
    {
        return $this->plannedEndDate;
    }

    /**
     * @param string
     */
    public function setPlannedEndDate($plannedEndDate)
    {
        if (is_string($plannedEndDate)) {
            $plannedEndDate = $this->dateFromJson($plannedEndDate);
        }

        $this->plannedEndDate = $plannedEndDate;
    }


    /**
     * @return string
     */
    public function getReported()
    {
        return $this->reported;
    }

    /**
     * @param string
     */
    public function setReported($reported)
    {
        if (is_string($reported)) {
            $reported = $this->dateFromJson($reported);
        }

        $this->reported = $reported;
    }


    /**
     * @return string
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param string
     */
    public function setStartDate($startDate)
    {
        if (is_string($startDate)) {
            $startDate = $this->dateFromJson($startDate);
        }

        $this->startDate = $startDate;
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
    public function getRegionName()
    {
        return $this->regionName;
    }

    /**
     * @param string
     */
    public function setRegionName($regionName)
    {
        $this->regionName = $regionName;
    }


    /**
     * @return string
     */
    public function getCountyName()
    {
        return $this->countyName;
    }

    /**
     * @param string
     */
    public function setCountyName($countyName)
    {
        $this->countyName = $countyName;
    }


    /**
     * @return string
     */
    public function getSeverity()
    {
        return $this->severity;
    }

    /**
     * @param string
     */
    public function setSeverity($severity)
    {
        $this->severity = $severity;
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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }


    /**
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param string
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }


    /**
     * @return string
     */
    public function getLanesAffected()
    {
        return $this->lanesAffected;
    }

    /**
     * @param string
     */
    public function setLanesAffected($lanesAffected)
    {
        $this->lanesAffected = $lanesAffected;
    }


    /**
     * @return string
     */
    public function getLanesStatus()
    {
        return $this->lanesStatus;
    }

    /**
     * @param string
     */
    public function setLanesStatus($lanesStatus)
    {
        $this->lanesStatus = $lanesStatus;
    }


    /**
     * @return string
     */
    public function getLcsEntries()
    {
        return $this->lcsEntries;
    }

    /**
     * @param string
     */
    public function setLcsEntries($lcsEntries)
    {
        $this->lcsEntries = $lcsEntries;
    }


    /**
     * @return string
     */
    public function getNavteqLinkId()
    {
        return $this->navteqLinkId;
    }

    /**
     * @param string
     */
    public function setNavteqLinkId($navteqLinkId)
    {
        $this->navteqLinkId = $navteqLinkId;
    }


    /**
     * @return string
     */
    public function getPrimaryLocation()
    {
        return $this->primaryLocation;
    }

    /**
     * @param string
     */
    public function setPrimaryLocation($primaryLocation)
    {
        $this->primaryLocation = $primaryLocation;
    }


    /**
     * @return string
     */
    public function getSecondaryLocation()
    {
        return $this->secondaryLocation;
    }

    /**
     * @param string
     */
    public function setSecondaryLocation($secondaryLocation)
    {
        $this->secondaryLocation = $secondaryLocation;
    }


    /**
     * @return string
     */
    public function getFirstArticleCity()
    {
        return $this->firstArticleCity;
    }

    /**
     * @param string
     */
    public function setFirstArticleCity($firstArticleCity)
    {
        $this->firstArticleCity = $firstArticleCity;
    }


    /**
     * @return string
     */
    public function getSecondCity()
    {
        return $this->secondCity;
    }

    /**
     * @param string
     */
    public function setSecondCity($secondCity)
    {
        $this->secondCity = $secondCity;
    }


    /**
     * @return string
     */
    public function getEventType()
    {
        return $this->eventType;
    }

    /**
     * @param string
     */
    public function setEventType($eventType)
    {
        $this->eventType = $eventType;
    }


    /**
     * @return string
     */
    public function getEventSubType()
    {
        return $this->eventSubType;
    }

    /**
     * @param string
     */
    public function setEventSubType($eventSubType)
    {
        $this->eventSubType = $eventSubType;
    }

    /**
     * @return string
     */
    public function getMapEncodedPolyline()
    {
        return $this->mapEncodedPolyline;
    }

    /**
     * @param string
     */
    public function setMapEncodedPolyline($mapEncodedPolyline)
    {
        $this->mapEncodedPolyline = $mapEncodedPolyline;
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
