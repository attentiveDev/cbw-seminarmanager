<?php

# Room.php - Model for the course rooms

namespace Models;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Webmasters\Doctrine\ORM\Util;

/**
 * @ORM\Entity
 * @ORM\Table(name="rooms")
 */
class Room {

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id = 0;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $title = '';
    
    /**
     * @ORM\Column(type="integer")
     */
    private $seats = '';
    
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
     * @ORM\OneToMany(targetEntity="Event", mappedBy="event")
     */
    private $events;
    
    # magic methods

    public function __construct(array $data = array()) {
        Util\ArrayMapper::setEntity($this)->setData($data);
    }
    
    public function __toString() {
        return $this->getTitle();
    }

    # getter

    public function getId() {
        return $this->id;
    }
    
    public function getTitle() {
        return $this->title;
    }
    
    public function getSeats() {
        return $this->seats;
    }
    
    public function getCreated() {
        return new Util\DateTime($this->created);
    }
    
    public function getUpdated() {
        return new Util\DateTime($this->updated);
    }
    
    # setter
    
    public function setTitle($title) {
        $this->title = trim($title);
    }
    
    public function setSeats($seats) {
        $this->seats = $seats   ;
    }

    public function setCreated($created) {
        $this->created = new Util\DateTime($created);
    }
    
    public function setUpdated($updated) {
        $this->updated = new Util\DateTime($updated);
    }
            
}

?>