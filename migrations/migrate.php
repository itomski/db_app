<?php

use Playground\Utils\DbUtils;

require_once '../vendor/autoload.php';

$dbh = DbUtils::getInstance()->getConnection();

$files = scandir(__DIR__);
$files = array_diff($files, array('.', '..', 'migrate.php'));

foreach($files as $file) {
    require_once $file;
}