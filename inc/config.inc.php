<?php

# config.inc.php - configurationfile

# database config
$connectionOptions = array(
    'default' => array(
        'driver' => 'pdo_mysql',
        'dbname' => 'DB2882109',
        'host' => 'rdbms.strato.de',
        'user' => 'U2882109',
        'password' => '9Cg7dOvReGNw'
    )
);

# application config
$applicationOptions = array(
    'debug_mode' => false
);

# load autoloader
require_once 'vendor/autoload.php';

# initialize entity manager (em)
$em = Webmasters\Doctrine\Bootstrap::getInstance($connectionOptions, $applicationOptions)->getEm();

if (false) {
    $em->getConnection()->getConfiguration()->setSQLLogger(new \Doctrine\DBAL\Logging\EchoSQLLogger());
}

?>