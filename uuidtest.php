<?php

use Ramsey\Uuid\Uuid;

require_once 'vendor/autoload.php';

$id = Uuid::uuid4();
echo $id;