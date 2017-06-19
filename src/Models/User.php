<?php

# User.php - Model for user management

namespace Models;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Webmasters\Doctrine\ORM\Util;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User {

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id = 0;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $email = '';

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstname = '';

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname = '';

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password = '';

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $street = '';

    /**
     * @ORM\Column(type="string", length=16)
     */
    private $postcode = '';

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city = '';

    /**
     * @ORM\Column(type="string", length=16)
     */
    private $usergroup = '';
    
    /**
     * @ORM\OneToMany(targetEntity="Booking", mappedBy="booking")
     */
    private $booking;

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
    
    // password input
    private $clearpwd;

    # magic methods

    public function __construct(array $data = array()) {
        Util\ArrayMapper::setEntity($this)->setData($data);
    }

    public function __toString() {
        return $this->getFullUsername();
    }

    # getter

    public function getId() {
        return $this->id;
    }

    public function getEmail() {
        return $this->email;
    }

    private function getPassword() {
        return $this->password;
    }

    public function getFirstname() {
        return $this->firstname;
    }

    public function getStreet() {
        return $this->street;
    }

    public function getPostcode() {
        return $this->postcode;
    }

    public function getCity() {
        return $this->city;
    }

    public function getLastname() {
        return $this->lastname;
    }

    public function getUsergroup() {
        return $this->usergroup;
    }

    public function getCreated() {
        return new Util\DateTime($this->created);
    }

    public function getUpdated() {
        return new Util\DateTime($this->updated);
    }

    private function getClearpwd() {
        return $this->clearpwd;
    }

    public function isClearpwdSet() {
        if (strlen($this->getClearpwd()) > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    public function getFullUsername() {
         return trim($this->getFirstname() . ' ' . $this->getLastname());
    }

    # setter

    public function setEmail($email) {
        $this->email = trim(strtolower($email));
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setFirstname($firstname) {
        $this->firstname = trim($firstname);
    }

    public function setStreet($street) {
        $this->street = trim($street);
    }

    public function setPostcode($postcode) {
        $this->postcode = trim($postcode);
    }

    public function setCity($city) {
        $this->city = trim($city);
    }

    public function setLastname($lastname) {
        $this->lastname = trim($lastname);
    }

    public function setUsergroup($usergroup) {
        $this->usergroup = $usergroup;
    }

    public function setCreated($created) {
        $this->created = new Util\DateTime($created);
    }

    public function setUpdated($updated) {
        $this->updated = new Util\DateTime($updated);
    }

    public function setClearpwd($clearpwd) {
        $this->clearpwd = trim($clearpwd);
    }

    # other

    public function hashPassword() {
        $this->password = password_hash($this->clearpwd, PASSWORD_DEFAULT);
    }

    public function verifyPassword() {
        return password_verify($this->getClearpwd(), $this->getPassword());
    }

}

?>