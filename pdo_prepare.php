<?php

$dsn = 'mysql:host=mysql;dbname=test;port=3306;charset=utf8mb4';

try {
    $fname = 'Bruce';
    $lname = 'Banner';

    $dbh = new PDO($dsn, 'root', '');
    /*
    $sql = "INSERT INTO users (firstname, lastname) VALUES(?, ?)"; // SQL wird auf der DB vorkompiliert
    $stmt = $dbh->prepare($sql);

    // Werte werden NICHT als SQL Befehle interpretiert
    $stmt->execute(['Carol', 'Danvers']); // Daten werden in das vorkompilierte Template eingetragen
    $stmt->execute(['Steve', 'Rogers']);
    $stmt->execute(['Toni', 'Stark']);
    $stmt->execute(['Natasha', 'Romanov']);
    $stmt->execute(['Scott', 'Lang']);
    echo '<p>Fertig</p>';

    $stmt->bindValue(1, $fname); // Nummer des Fragezeichens
    $stmt->bindValue(2, $lname);
    */

    // mit benannten Platzhaltern
    $sql = "INSERT INTO users (firstname, lastname) VALUES(:firstname, :lastname)"; // SQL wird auf der DB vorkompiliert
    $stmt = $dbh->prepare($sql);

    /*
    // Werte werden NICHT als SQL Befehle interpretiert
    $stmt->execute(['lastname' => 'Danvers', 'firstname' => 'Carol']);
    $stmt->execute(['firstname' => 'Carol', 'lastname' => 'Danvers']);
    */

    $stmt->bindValue('firstname', $fname, PDO::PARAM_STR);
    $stmt->bindValue('lastname', $flname, PDO::PARAM_STR);
    $stmt->execute();
    echo '<p>Fertig</p>';
    $dbh = null; // Verbindung wird geschlossen
}
catch(PDOException $e) {
    print_r($e->errorInfo);
    die();
}

// Weitere Befehle