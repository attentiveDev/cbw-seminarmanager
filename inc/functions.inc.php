<?php

# functions.inc.php - generic functions

function redirect($location) {
    # redirects to the given location
    header('Location:' . $location);
    exit();
}

function setUserMessage($message) {
    # save a message for the user in the session
    $_SESSION['userMessage'] = $message;
}

function getUserMessage() {
    # returns previous saved message from the session
    $message = false;
    if (isset($_SESSION['userMessage'])) {
        $message = $_SESSION['userMessage'];
        unset($_SESSION['userMessage']);
    }
    return $message;
}

function isVerifiedUser() {
    # check if the logged in user is verified
    return isset($_SESSION['verifiedUserGroup']) ? true : false;
}

function isVerifiedAdmin() {
    # check if the logged in user is an verified administrator
    return isset($_SESSION['verifiedUserGroup']) && $_SESSION['verifiedUserGroup'] == 'admin' ? true : false;
}

function neat($data) {
    # cleans data for output to the clients browser
    echo htmlspecialchars(strip_tags($data), ENT_QUOTES);
}

?>
