<?php

namespace Playground\Utils;

use \PDO;
use PDOException;

class DbUtils {

    private static $instance = null;

    private PDO $dbh;

    private function __construct()
    {
        $dsn = 'mysql:host=mysql;dbname=test;port=3306;charset=utf8mb4';

        try {
            $this->dbh = new PDO($dsn, 'root', '');
        }
        catch(PDOException $e) {
            echo '<p>Probleme mit der Datenbank!</p>';
            die();
        }
    }

    public static function getInstance(): DbUtils {
        if(self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection(): PDO {
        return $this->dbh;
    }
}