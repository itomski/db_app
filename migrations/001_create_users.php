<?php

try {
    echo "Start migration ".__FILE__.'<br>';
    $sql = 'CREATE TABLE IF NOT EXISTS `users` (
        `id` binary(16) PRIMARY KEY,
        `firstname` varchar(30) NOT NULL,
        `lastname` varchar(30) NOT NULL
        );';

    $dbh->query($sql);
    echo "End migration ".__FILE__.'<br>';
}
catch(PDOException $e) {
    echo "<p>Problems with migration ".__FILE__.'<br>';
    die();
}