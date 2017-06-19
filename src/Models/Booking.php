<?php

# Booking.php - Model for booked events

namespace Models;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Webmasters\Doctrine\ORM\Util;

/**
 * @ORM\Entity
 * @ORM\Table(name="bookings")
 */
class Booking {

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id = 0;

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
     * @ORM\ManyToOne(targetEntity="Event", inversedBy="events")
     */
    private $event;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="users")
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ipAdress = '';

    # magic methods

    public function __construct(array $data = array()) {
        Util\ArrayMapper::setEntity($this)->setData($data);
        $this->courses = new \Doctrine\Common\Collections\ArrayCollection();
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

    public function getIpAdress() {
        return $this->ipAdress;
    }

    public function getUser() {
        return $this->user;
    }

    public function getEvent() {
        return $this->event;
    }

    # setter

    public function setCreated($created) {
        $this->created = new Util\DateTime($created);
    }

    public function setUpdated($updated) {
        $this->updated = new Util\DateTime($updated);
    }

    public function setIpAdress() {
        $ipadress = '';
        if (getenv('HTTP_CLIENT_IP')) {
            $ipadress = getenv('HTTP_CLIENT_IP');
        } else if (getenv('HTTP_X_FORWARDED_FOR')) {
            $ipadress = getenv('HTTP_X_FORWARDED_FOR');
        } else if (getenv('HTTP_X_FORWARDED')) {
            $ipadress = getenv('HTTP_X_FORWARDED');
        } else if (getenv('HTTP_FORWARDED_FOR')) {
            $ipadress = getenv('HTTP_FORWARDED_FOR');
        } else if (getenv('HTTP_FORWARDED')) {
            $ipadress = getenv('HTTP_FORWARDED');
        } else if (getenv('REMOTE_ADDR')) {
            $ipadress = getenv('REMOTE_ADDR');
        } else {
            $ipadress = 'UNKNOWN';
        }
        if ($ipadress == '127.0.0.1' or $ipadress == '::1') {
            $ipadress = 'localhost';
        }
        $this->ipAdress = $ipadress;
    }

    public function setEvent($event) {
        $this->event = $event;
    }

    public function setUser($user) {
        $this->user = $user;
    }

}

?>