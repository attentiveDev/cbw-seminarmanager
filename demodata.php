<?php

# demodata.php - creates some data for demonstration

require_once 'inc/config.inc.php';

use Models\User;
use Models\Category;
use Models\Course;
use Models\Room;
use Models\Event;

# delete all old content

$em->getConnection()->query('SET FOREIGN_KEY_CHECKS=0;');
$em->getConnection()->query('TRUNCATE TABLE users;');
$em->getConnection()->query('TRUNCATE TABLE categories;');
$em->getConnection()->query('TRUNCATE TABLE rooms;');
$em->getConnection()->query('TRUNCATE TABLE courses;');
$em->getConnection()->query('TRUNCATE TABLE events;');
$em->getConnection()->query('SET FOREIGN_KEY_CHECKS=1;');

# add some users

$entry = array(
    'email' => 'admin@cbw.local',
    'firstname' => 'Sven',
    'lastname' => 'Sonntag',
    'street' => 'Veitstrasse 9',
    'postcode' => '13507',
    'city' => 'Berlin',
    'usergroup' => 'admin'
);
$user = new User($entry);
$user->setClearpwd('admin');
$user->hashPassword();
$em->persist($user);

$entry = array(
    'email' => 'user@cbw.local',
    'firstname' => 'Markus',
    'lastname' => 'Mustermann',
    'street' => 'Musterstraße 15',
    'postcode' => '12347',
    'city' => 'Berlin',
    'usergroup' => 'user'
);
$user = new User($entry);
$user->setClearpwd('user');
$user->hashPassword();
$em->persist($user);

# add some categories

$fieldname = 'title';
$entries = array(
    array($fieldname => 'Web-Development'),
    array($fieldname => 'Android Development'),
    array($fieldname => 'IT-Systemadministration'),
    array($fieldname => 'Gutes für Körper & Geist'),
    array($fieldname => 'Kaufmännische Weiterbildung'),
    array($fieldname => 'Sonstiges')
);

foreach ($entries as $entry) {
    $category = new Category($entry);
    $em->persist($category);
}

# add some rooms

$entries = array(
    array('title' => 'Raum 4.1', 'seats' => 21),
    array('title' => 'Raum 4.2', 'seats' => 20),
    array('title' => 'Raum 4.3', 'seats' => 19),
    array('title' => 'Raum 4.4', 'seats' => 28),
    array('title' => 'Raum 4.5', 'seats' => 22),
    array('title' => 'Raum 4.6', 'seats' => 20),
    array('title' => 'Raum 5.1', 'seats' => 8),
    array('title' => 'Raum 5.2', 'seats' => 12),
    array('title' => 'Raum 5.3', 'seats' => 15)
);

foreach ($entries as $entry) {
    $room = new Room($entry);
    $em->persist($room);
}

$em->flush();

# add some courses

$entries = array(
    array(
        'category_id' => 1,
        'title' => 'HTML5 und CSS3 für Anfänger',
        'description' => 'Der richtige Einstieg für Web-Entwickler und solche die es werden wollen.',
        'price' => 1299.95,
    ),
    array(
        'category_id' => 1,
        'title' => 'JavaScript für Fortgeschrittene',
        'description' => 'Mit JavaScript werden Ihre Web-Anwendungen interaktiv und ansprechender.',
        'price' => 899.95,
    ),
    array(
        'category_id' => 3,
        'title' => 'Linux Systemadministration',
        'description' => 'Kein Web ohne Webserver. Vom System angefangen bis zum sicheren Webserver lernen Sie alles über Linux in diesem Kurs.',
        'price' => 998.50,
    ),
    array(
        'category_id' => 4,
        'title' => 'Mediation für Dummies',
        'description' => 'Jeder muss sich auch einmal entspannen. Lernen Sie wie!',
        'price' => 199.90,
    ),
    array(
        'category_id' => 1,
        'title' => 'HTML5 und CSS3 für Fortgeschrittene',
        'description' => 'Der Folgekurs für das Seminar HTML5 und CSS3 für Anfanger. Erweitern Sie Ihre Kenntnisse.',
        'price' => 1150.0,
    ),
);

foreach ($entries as $entry) {
    $course = new Course($entry);
    $course->setCategory($em->getRepository('Models\Category')->find($entry["category_id"]));
    $em->persist($course);
}

$em->flush();

# add some events

$entries = array(
    array(
        'course_id' => 1,
        'room_id' => 2,
        'startdate' => '2016-12-05',
        'enddate' => '2016-12-16',
    ),
    array(
        'course_id' => 4,
        'room_id' => 1,
        'startdate' => '2016-12-05',
        'enddate' => '2016-12-09',
    ),
    array(
        'course_id' => 2,
        'room_id' => 5,
        'startdate' => '2016-12-19',
        'enddate' => '2016-12-30',
    ),
    array(
        'course_id' => 3,
        'room_id' => 6,
        'startdate' => '2016-12-05',
        'enddate' => '2016-12-16',
    ),
    array(
        'course_id' => 5,
        'room_id' => 3,
        'startdate' => '2017-01-02',
        'enddate' => '2017-01-13',
    ),
    array(
        'course_id' => 1,
        'room_id' => 3,
        'startdate' => '2017-01-16',
        'enddate' => '2017-01-27',
    ),
);

foreach ($entries as $entry) {
    $event = new Event($entry);
    $event->setRoom($em->getRepository('Models\Room')->find($entry["room_id"]));
    $event->setCourse($em->getRepository('Models\Course')->find($entry["course_id"]));
    $em->persist($event);
}

$em->flush();

echo "Die Demo-Daten wurden angelegt.";
