<?php

$dsn = 'mysql:host=mysql;dbname=test;port=3306;charset=utf8mb4';

try {
    $dbh = new PDO($dsn, 'root', '');

    // ACID
    $dbh->beginTransaction(); // Befehle werden Zusammen als eine Anweisung ausgeführt
    $dbh->query("INSERT INTO users (firstname, lastname) VALUES('Max', 'Mustermann')");
    $dbh->query("INSERT INTO users (firstname, last_name) VALUES('Max', 'Mustermann')");
    $dbh->commit();
    
}
catch(PDOException $e) {
    print_r($e->errorInfo);

    if($dbh->inTransaction()) {
        $dbh->rollBack(); // Die Befehls-Queue wird wieder geleert
    }
    die();
}