<?php

# Event.php - Model for events (compbination of date, course and room)

namespace Models;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Webmasters\Doctrine\ORM\Util;

/**
 * @ORM\Entity
 * @ORM\Table(name="events")
 */
class Event {

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id = 0;
    
    /**
     * @ORM\Column(type="date")
     */
    private $startdate;
    
    /**
     * @ORM\Column(type="date")
     */
    private $enddate;

    /**
     * @ORM\Column(type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    private $created;

    /**
     * @ORM\Column(type="datetime")
     * @Gedmo\Timestampable(on="update")
     */
    private $updated;
    
    /**
     * @ORM\ManyToOne(targetEntity="Course", inversedBy="events")
     */
    private $course;
    
    /**
     * @ORM\ManyToOne(targetEntity="Room", inversedBy="events")
     */
    private $room;
    
    /**
     * @ORM\OneToMany(targetEntity="Booking", mappedBy="booking")
     */
    private $booking;

    # magic methods

    public function __construct(array $data = array()) {
        Util\ArrayMapper::setEntity($this)->setData($data);
    }

    public function __toString() {
        return trim($this->getId());
    }

    # getter

    public function getId() {
        return $this->id;
    }

    public function getCreated() {
        return new Util\DateTime($this->created);
    }

    public function getUpdated() {
        return new Util\DateTime($this->updated);
    }
    
    public function getStartdate() {
        return new Util\DateTime($this->startdate);
    }
    
    public function getEnddate() {
        return new Util\DateTime($this->enddate);
    }
    
    public function getCourse() {
        return $this->course;
    }
    
    public function getRoom() {
        return $this->room;
    }
    
    public function getBooking() {
        return $this->booking;
    }
    
    # setter
    
    public function setCourse($course) {
        $this->course = $course;
    }
    
    public function setRoom($room) {
        $this->room = $room;
    }

    public function setCreated($created) {
        $this->created = new Util\DateTime($created);
    }
    
    public function setStartdate($startdate) {
        $this->startdate = new Util\DateTime($startdate);
    }
    
    public function setEnddate($enddate) {
        $this->enddate = new Util\DateTime($enddate);
    }

    public function setUpdated($updated) {
        $this->updated = new Util\DateTime($updated);
    }

}

?>