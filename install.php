<?php

require_once 'config.php';

$sql = "CREATE TABLE IF NOT EXISTS user (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            firstname VARCHAR(25) NOT NULL,
            lastname VARCHAR(25) NOT NULL,
            email VARCHAR(50) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP)";

try {
    $stmt = $dbh->query($sql);
}
catch(PDOException $e) {
    echo 'Probleme beim Erzeugen der Tabellen';
    echo $e->getMessage();
    exit();
}

echo 'Tabellen wurden erzeugt.';