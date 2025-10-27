<?php

$dsn = 'sqlite:/var/www/html/xyz.sqlite';

try {
    $pdo = new PDO($dsn, null, null);
    $pdo->query("INSERT INTO users2 (firstname, lastname) VALUES('Carol', 'Danvers')");
    //echo 'Fertig, '.$dbh->lastInsertId();

    $stmt = $pdo->query("SELECT last_insert_rowid()");
    print_r($stmt->fetch());
}
catch(PDOException $e) {
    print_r($e->errorInfo);
}