<?php

# Categorie.php - Model for course categories

namespace Models;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Webmasters\Doctrine\ORM\Util;

/**
 * @ORM\Entity
 * @ORM\Table(name="categories")
 */
class Category {

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
     * @ORM\OneToMany(targetEntity="Course", mappedBy="category")
     */
    private $courses;
    
    # magic methods

    public function __construct(array $data = array()) {
        Util\ArrayMapper::setEntity($this)->setData($data);
        $this->courses = new \Doctrine\Common\Collections\ArrayCollection();
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

    public function setCreated($created) {
        $this->created = new Util\DateTime($created);
    }
    
    public function setUpdated($updated) {
        $this->updated = new Util\DateTime($updated);
    }
    
    public function clearCourses() {
        $this->courses->clear();
    }
    
    public function addCourse(Course $course) {
        $this->courses->add($course);
    }
    
    public function hasCourse(Course $course) {
        return $this->courses->contains($course);
    }
    
    public function removeCourse(Course $course) {
        $this->courses->removeElement($course);
    }
            
}

?>