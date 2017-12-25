<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RoadAlertRepository")
 */
class RoadAlert
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $dotId;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $message;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $notes;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $areaNames;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
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
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
        * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param string
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    }

    /**
        * @return string
     */
    public function getAreaNames()
    {
        return $this->areaNames;
    }

    /**
     * @param array|string
     */
    public function setAreaNames($areaNames)
    {
        if (is_array($areaNames)) {
            $areaNames = implode("|", $areaNames);
        }
        
        $this->areaNames = $areaNames;
    }
}
