<?php

# index.php - maincontroller

/*
 * Seminarmanager based on Doctrine
 * written by Sven Sonntag for CBW Collage Berufliche Weiterbildung
 * Dozent: Bishara Sabbagh
 */

session_start();

require_once 'inc/config.inc.php';
require_once 'inc/functions.inc.php';

use Webmasters\Doctrine\ORM\Util\ArrayMapper;
use Models\User;
use Models\Category;
use Models\Course;
use Models\Room;
use Models\Event;
use Models\Booking;

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null;
$view = $action;


switch ($action) {

    # actions without any model
    # -----------------------------------------------------------------------------------------------------------------

    case "logout":
        foreach ($_SESSION as $key) {
            unset($_SESSION[$key]);
        }
        session_destroy();
        redirect('index.php');
        break;

    # category controller
    # -----------------------------------------------------------------------------------------------------------------

    case "viewCategories":
        if (isVerifiedAdmin()) {
            $title = "Kategorien - Liste";
            $categories = $em->getRepository('Models\Category')->findAll();
        } else {
            redirect('index.php?action=login');
        }
        break;

    case "editCategory":
        if (isVerifiedAdmin()) {
            $title = "Kategorie - Details";
            $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
            $category = $em->getRepository('Models\Category')->find($id);
            if ($_POST && isset($_REQUEST["submitbutton"])) {
                ArrayMapper::setEntity($category)->setData($_POST);
                $em->persist($category);
                $em->flush();
                setUserMessage('Die Kategorie wurde gespeichert.');
                redirect('index.php?action=viewCategories');
            }
        } else {
            redirect('index.php?action=login');
        }
        break;

    case "newCategory":
        if (isVerifiedAdmin()) {
            $title = "Kategorie - Neu";
            $category = new Category;
            if ($_POST && isset($_REQUEST["submitbutton"])) {
                ArrayMapper::setEntity($category)->setData($_POST);
                $em->persist($category);
                $em->flush();
                setUserMessage('Die Kategorie wurde erstellt.');
                redirect('index.php?action=viewCategories');
            }
            $view = 'editCategory';
        } else {
            redirect('index.php?action=login');
        }
        break;

    case "deleteCategory":
        if (isVerifiedAdmin()) {
            $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
            $category = $em->getRepository('Models\Category')->find($id);
            $em->remove($category);
            $em->flush();
            setUserMessage('Die Kategorie wurde gelöscht.');
            redirect('index.php?action=viewCategories');
        } else {
            redirect('index.php?action=login');
        }
        break;

    # user controller
    # -----------------------------------------------------------------------------------------------------------------

    case "login":
        $title = "Anmelden";
        if ($_POST && isset($_REQUEST["submitbutton"])) {
            $user = $em->getRepository('Models\User')->findOneByEmail($_POST['email']);
            if ($user) {
                $user->setClearpwd($_POST['clearpwd']);
                if ($user->verifyPassword()) {
                    $_SESSION['verifiedUserGroup'] = $user->getUsergroup();
                    $_SESSION['verifiedUserName'] = $user->getFullUsername();
                    $_SESSION['verifiedUserID'] = $user->getId();
                    setUserMessage('Sie wurde am System angemeldet.');
                    redirect('index.php');
                } else {
                    setUserMessage('Der Benutzername oder das Passwort ist nicht korrekt.');
                }
            } else {
                setUserMessage('Der Benutzername oder das Passwort ist nicht korrekt.');
            }
        }
        break;

    case "viewUsers":
        if (isVerifiedAdmin()) {
            $title = "Benutzer - Liste";
            $users = $em->getRepository('Models\User')->findAll();
        } else {
            redirect('index.php?action=login');
        }
        break;

    case "editUser":
        if (isVerifiedAdmin()) {
            $title = "Benutzer - Details";
            $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
            $user = $em->getRepository('Models\User')->find($id);
            if ($_POST && isset($_REQUEST["submitbutton"])) {
                ArrayMapper::setEntity($user)->setData($_POST);
                if ($user->isClearpwdSet()) {
                    $user->hashPassword();
                }
                $em->persist($user);
                $em->flush();
                setUserMessage('Der Benutzer wurde gespeichert.');
                redirect('index.php?action=viewUsers');
            }
        } else {
            redirect('index.php?action=login');
        }
        break;

    case "newUser":
        if (isVerifiedAdmin()) {
            $title = "Benutzer - Neu";
            $user = new User;
            if ($_POST && isset($_REQUEST["submitbutton"])) {
                ArrayMapper::setEntity($user)->setData($_POST);
                if ($user->isClearpwdSet()) {
                    $user->hashPassword();
                }
                $em->persist($user);
                $em->flush();
                setUserMessage('Der Benutzer wurde erstellt.');
                redirect('index.php?action=viewUsers');
            }
            $view = 'editUser';
        } else {
            redirect('index.php?action=login');
        }
        break;

    case "deleteUser":
        if (isVerifiedAdmin()) {
            $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
            $user = $em->getRepository('Models\User')->find($id);
            $em->remove($user);
            $em->flush();
            setUserMessage('Der Benutzer wurde gelöscht.');
            redirect('index.php?action=viewUsers');
        } else {
            redirect('index.php?action=login');
        }
        break;

    # course controller
    # -----------------------------------------------------------------------------------------------------------------
    
    case "viewCourses":
        if (isVerifiedAdmin()) {
            $title = "Seminare - Liste";
            $courses = $em->getRepository('Models\Course')->findAll();
        } else {
            redirect('index.php?action=login');
        }
        break;

    case "editCourse":
        if (isVerifiedAdmin()) {
            $title = "Seminar - Details";
            $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
            $course = $em->getRepository('Models\Course')->find($id);
            $categories = $em->getRepository('Models\Category')->findAll();
            if ($_POST && isset($_REQUEST["submitbutton"])) {
                ArrayMapper::setEntity($course)->setData($_POST);
                # set course category
                $course->setCategory($em->getRepository('Models\Category')->find($_POST['category']));
                $em->persist($course);
                $em->flush();
                setUserMessage('Das Seminar wurde gespeichert.' . $_POST['category']);
                redirect('index.php?action=viewCourses');
            }
        } else {
            redirect('index.php?action=login');
        }
        break;

    case "newCourse":
        if (isVerifiedAdmin()) {
            $title = "Seminar - Neu";
            $course = new Course;
            $categories = $em->getRepository('Models\Category')->findAll();
            if ($_POST && isset($_REQUEST["submitbutton"])) {
                ArrayMapper::setEntity($course)->setData($_POST);
                # set course category
                $course->setCategory($em->getRepository('Models\Category')->find($_POST['category']));
                $em->persist($course);
                $em->flush();
                setUserMessage('Das Seminar wurde erstellt.');
                redirect('index.php?action=viewCourses');
            }
            $view = 'editCourse';
        } else {
            redirect('index.php?action=login');
        }
        break;

    case "deleteCourse":
        if (isVerifiedAdmin()) {
            $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
            $course = $em->getRepository('Models\Course')->find($id);
            $em->remove($course);
            $em->flush();
            setUserMessage('Das Seminar wurde gelöscht.');
            redirect('index.php?action=viewCourse');
        } else {
            redirect('index.php?action=login');
        }
        break;

    # room controller
    # -----------------------------------------------------------------------------------------------------------------
        
    case "viewRooms":
        if (isVerifiedAdmin()) {
            $title = "Räume - Liste";
            $rooms = $em->getRepository('Models\Room')->findAll();
        } else {
            redirect('index.php?action=login');
        }
        break;

    case "editRoom":
        if (isVerifiedAdmin()) {
            $title = "Raum - Details";
            $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
            $room = $em->getRepository('Models\Room')->find($id);
            if ($_POST && isset($_REQUEST["submitbutton"])) {
                ArrayMapper::setEntity($room)->setData($_POST);
                $em->persist($room);
                $em->flush();
                setUserMessage('Der Raum wurde gespeichert.');
                redirect('index.php?action=viewRooms');
            }
        } else {
            redirect('index.php?action=login');
        }
        break;

    case "newRoom":
        if (isVerifiedAdmin()) {
            $title = "Raum - Neu";
            $room = new Room;
            if ($_POST && isset($_REQUEST["submitbutton"])) {
                ArrayMapper::setEntity($room)->setData($_POST);
                $em->persist($room);
                $em->flush();
                setUserMessage('Der Raum wurde erstellt.');
                redirect('index.php?action=viewRooms');
            }
            $view = 'editRoom';
        } else {
            redirect('index.php?action=login');
        }
        break;

    case "deleteRoom":
        if (isVerifiedAdmin()) {
            $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
            $room = $em->getRepository('Models\Room')->find($id);
            $em->remove($room);
            $em->flush();
            setUserMessage('Der Raum wurde gelöscht.');
            redirect('index.php?action=viewRooms');
        } else {
            redirect('index.php?action=login');
        }
        break;

    # event controller
    # -----------------------------------------------------------------------------------------------------------------

    case "viewEvents":
        if (isVerifiedAdmin()) {
            $title = "Termine - Liste";
            $events = $em->getRepository('Models\Event')->findAll();
        } else {
            redirect('index.php?action=login');
        }
        break;

    case "editEvent":
        if (isVerifiedAdmin()) {
            $title = "Termin - Details";
            $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
            $courses = $em->getRepository('Models\Course')->findAll();
            $rooms = $em->getRepository('Models\Room')->findAll();
            $event = $em->getRepository('Models\Event')->find($id);
            if ($_POST && isset($_REQUEST["submitbutton"])) {
                ArrayMapper::setEntity($event)->setData($_POST);
                $event->setRoom($em->getRepository('Models\Room')->find($_POST['room']));
                $event->setCourse($em->getRepository('Models\Course')->find($_POST['course']));
                $em->persist($event);
                $em->flush();
                setUserMessage('Der Termin wurde gespeichert.');
                redirect('index.php?action=viewEvents');
            }
        } else {
            redirect('index.php?action=login');
        }
        break;

    case "newEvent":
        if (isVerifiedAdmin()) {
            $title = "Termin - Neu";
            $courses = $em->getRepository('Models\Course')->findAll();
            $rooms = $em->getRepository('Models\Room')->findAll();
            $event = new Event;
            if ($_POST && isset($_REQUEST["submitbutton"])) {
                ArrayMapper::setEntity($event)->setData($_POST);
                $event->setRoom($em->getRepository('Models\Room')->find($_POST['room']));
                $event->setCourse($em->getRepository('Models\Course')->find($_POST['course']));
                $em->persist($event);
                $em->flush();
                setUserMessage('Der Termin wurde erstellt.');
                redirect('index.php?action=viewEvents');
            }
            $view = 'editEvent';
        } else {
            redirect('index.php?action=login');
        }
        break;

    case "deleteEvent":
        if (isVerifiedAdmin()) {
            $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
            $event = $em->getRepository('Models\Event')->find($id);
            $em->remove($event);
            $em->flush();
            setUserMessage('Der Termin wurde gelöscht.');
            redirect('index.php?action=viewEvents');
            break;
        } else {
            redirect('index.php?action=login');
        }
        break;

    # booking controller
    # -----------------------------------------------------------------------------------------------------------------
        
    case "viewBookings":
        if (isVerifiedAdmin()) {
            $title = "Buchungen - Liste";
            $bookings = $em->getRepository('Models\Booking')->findAll();
        } else {
            redirect('index.php?action=login');
        }
        break;

    case "editBooking":
        if (isVerifiedAdmin()) {
            $title = "Buchungen - Details";
            $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
            $event = $em->getRepository('Models\Booking')->find($id);
        } else {
            redirect('index.php?action=login');
        }
        break;

    # frontend controller (all nessesary models)
    # -----------------------------------------------------------------------------------------------------------------

    case "courses":
        $title = "Unser Seminarangebot";

        /* SELECT course_id, room_id, startdate, enddate, courses.title, courses.description, categories.title, rooms.title, rooms.seats
          FROM events
          JOIN courses ON events.course_id = courses.id
          JOIN categories ON courses.category_id = categories.id
          JOIN rooms ON events.room_id = rooms.id
          ORDER BY categories.title, courses.title, startdate; */
        $search = isset($_REQUEST['search']) ? $_REQUEST['search'] : null;
        if (is_null($search)) {
            $query = $em->createQuery(
                    'SELECT e, c, r FROM Models\Event e JOIN e.course c JOIN c.category k JOIN e.room r ORDER BY k.title , c.title, e.startdate');
        } else {
            $query = $em->createQuery(
                    'SELECT e, c, r FROM Models\Event e JOIN e.course c JOIN c.category k JOIN e.room r WHERE c.title LIKE :search ORDER BY k.title , c.title, e.startdate');
            $query->setParameter('search', '%' . $search . '%');
        }
        $allCourses = $query->getResult();
        if (isset($_SESSION['verifiedUserID'])) {
            $currentUser = $em->getRepository('Models\User')->find($_SESSION['verifiedUserID']);
        }
        $tmpCategory = '';
        $tmpCategoryId = -1;
        $tmpCourse = '';
        $tmpCourseId = -1;
        $viewArray = array();

        foreach ($allCourses as $course) {
            if ($course->getCourse()->getCategory()->getTitle() != $tmpCategory) {
                $tmpCategoryId++;
                $tmpCategory = $course->getCourse()->getCategory()->getTitle();
                $viewArray[$tmpCategoryId] = array('category' => $course->getCourse()->getCategory()->getTitle());
            }
            if ($course->getCourse()->getTitle() != $tmpCourse) {
                $tmpCourseId++;
                $viewArray[$tmpCategoryId]['course'][$tmpCourseId] = array(
                    'title' => $course->getCourse()->getTitle(),
                    'description' => $course->getCourse()->getDescription(),
                    'price' => $course->getCourse()->getPrice()
                );
                $tmpCourse = $course->getCourse()->getTitle();
            }
            # determing how many seats are booked
            $query = $em->createQuery('SELECT COUNT(b) AS booked FROM Models\Booking b WHERE b.event=' . $course->getId());
            $bookings = intval($query->getResult()[0]['booked']);
            if (isset($_SESSION['verifiedUserID'])) {
                $bookedQuery = $em->createQuery('SELECT b FROM Models\Booking b WHERE b.event=' . $course->getId() . ' AND b.user=' . $currentUser->getId());
                $bookedResult = $bookedQuery->getResult();
                if (count($bookedResult) > 0) {
                    $booked = true;
                } else {
                    $booked = false;
                }
            } else {
                $booked = false;
            }

            $viewArray[$tmpCategoryId]['course'][$tmpCourseId]['event'][] = array(
                'eventId' => $course->getId(),
                'eventStart' => $course->getStartdate()->format('D, d.m.Y'),
                'eventEnd' => $course->getEnddate()->format('D, d.m.Y'),
                'eventRoom' => $course->getRoom()->getTitle(),
                'eventSeats' => $course->getRoom()->getSeats(),
                'eventBookings' => $bookings,
                'eventBooked' => $booked
            );
        }

        break;

    case "bookCourse":
        $title = "Seminar buchen";
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
        $event = $em->getRepository('Models\Event')->find($id);
        $user = $em->getRepository('Models\User')->find($_SESSION['verifiedUserID']);
        if ($_POST && isset($_REQUEST["submitbutton"])) {
            $booking = new Booking();
            $booking->setUser($user);
            $booking->setEvent($event);
            $booking->setIpAdress();
            $em->persist($booking);
            $em->flush();
            setUserMessage('Sie haben Sich erfolgreich für dieses Seminar angemeldet.');
            redirect('index.php?action=courses');
        }
        break;

    case "mybookings":
        if (isVerifiedUser()) {
            $title = "Meine gebuchten Seminare";
            $bookings = $em->getRepository('Models\Booking')->findByUser($em->getRepository('Models\User')->find($_SESSION['verifiedUserID']));
        } else {
            redirect('index.php?action=login');
        }
        break;

    case "register":
        $title = "Registriere Dich!";
        $user = new User;
        $user->setUsergroup('user');
        if ($_POST && isset($_REQUEST["submitbutton"])) {
            ArrayMapper::setEntity($user)->setData($_POST);
            if ($user->isClearpwdSet()) {
                $user->hashPassword();
            }
            $em->persist($user);
            $em->flush();
            setUserMessage('Sie haben Sich erfolgreich registriert.');
            redirect('index.php?action=login');
        }

        break;

    default:
        $title = "Home";
        $view = 'home';
}

$message = getUserMessage();

require_once 'views/layout.tpl.php';
?>