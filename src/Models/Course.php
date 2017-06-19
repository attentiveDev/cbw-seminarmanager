<?php

# Course.php - Model for courses e.g. main table for this application

namespace Models;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Webmasters\Doctrine\ORM\Util;

/**
 * @ORM\Entity
 * @ORM\Table(name="courses")
 */
class Course {

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id = 0;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title = '';

    /**
     * @ORM\Column(type="text")
     */
    private $description = '';

    /**
     * @ORM\Column(type="decimal", precision=6, scale=2)
     */
    private $price = '';

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
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="categories")
     */
    private $category;
    
    /**
     * @ORM\OneToMany(targetEntity="Event", mappedBy="event")
     */
    private $events;

    # magic methods

    public function __construct(array $data = array()) {
        Util\ArrayMapper::setEntity($this)->setData($data);
    }

    public function __toString() {
        return trim($this->getTitle());
    }

    # getter

    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getCreated() {
        return new Util\DateTime($this->created);
    }

    public function getUpdated() {
        return new Util\DateTime($this->updated);
    }
    
    public function getCategory() {
        return $this->category;
    }

    # setter

    public function setTitle($title) {
        $this->title = trim($title);
    }

    public function setDescription($description) {
        $this->description = trim($description);
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function setCreated($created) {
        $this->created = new Util\DateTime($created);
    }

    public function setUpdated($updated) {
        $this->updated = new Util\DateTime($updated);
    }
    
    public function setCategory($category) {
        $this->category = $category;
    }

}

?>