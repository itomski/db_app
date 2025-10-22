<?php

const DB_HOST = 'mysql';
const DB_NAME = 'todo_app';
const DB_USER = 'root';
const DB_PASSWORD = '';
const DB_CHARSET = 'utf8mb4';

$dsn = 'mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset='.DB_CHARSET;

$options = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

try {
    $dbh = new PDO($dsn, DB_USER, DB_PASSWORD, $options);
}
catch(PDOException $e) {
    echo 'Probleme beim Verbinden mit der Datenbank';
    echo $e->getMessage();
    exit();
}