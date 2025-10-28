<?php

class MySingleton {

    private static $instance = null;

    private function __construct()
    {
    }

    public static function getInstance(): MySingleton {
        if(self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function doSomething() {
        echo 'Something';
    }
}

//$singleton = new MySingleton();
//$singleton->doSomething();


$singleton = MySingleton::getInstance();
//$singleton = MySingleton Objekt
$singleton->doSomething();