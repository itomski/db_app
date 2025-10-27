<?php

$dsn = 'mysql:host=mysql;dbname=test;port=3306;charset=utf8mb4';

try {
    $dbh = new PDO($dsn, 'root', '');
    // query() = Anfällig gegen SQLInjection
    // Sollte nur für Queries ohne Variablen genutzt werden
    // $dbh->query("INSERT INTO users (firstname, lastname) VALUES('".$firstname."', '".$lastname."')");

    // SELECT liefert Daten zurück
    /*
    $stmt = $dbh->query("SELECT * FROM users");
    $data = $stmt->fetchAll();
    foreach($data as $row) {
        echo '<p>'.$row['id'].', '.$row['firstname'].', '.$row['lastname'].'</p>'; 
    }
    */

    $stmt = $dbh->query("DELETE FROM users WHERE id = 1");
    if($stmt->rowCount() > 0) { // Liefert die Anzahl der betroffenen Datensätze
        echo '<p>Datensatz wurde gelöscht!</p>';
    }
    else {
        echo '<p>Datensatz konnte nicht gelöscht werden!</p>';
    }
}
catch(PDOException $e) {
    print_r($e->errorInfo);
    die();
}