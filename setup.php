<?php

# setup.php - create all tables via orm

require_once 'inc/config.inc.php';

# setup the database with schematool
$schemaTool = new \Doctrine\ORM\Tools\SchemaTool($em);
$metadata = $em->getMetadataFactory()->getAllMetadata();

try {
    $schemaTool->updateSchema($metadata);
} catch (PDOException $e) {
    echo 'ACHTUNG: Bei der Aktualisierung des Schemas gab es ein Problem: ';
    echo $e->getMessage() . "<br />";
    if (preg_match("/Unknown database '(.*)'/", $e->getMessage(), $matches)) {
        die(sprintf('Erstellen Sie die Datenbank %s mit der Kollation utf8_general_ci!', $matches[1]));
    }
}

echo "Das Schema-Tool wurde durchlaufen.";
