<?php

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

require_once "vendor/autoload.php";

$config = ORMSetup::createAttributeMetadataConfig([__DIR__.'/src'], true);

$connection = DriverManager::getConnection([
    'driver' => 'pdo_sqlite',
    'path' => __DIR__.'/xyz.sqlite'
]);

$em = new EntityManager($connection, $config);