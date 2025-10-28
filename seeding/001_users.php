<?php

use Ramsey\Uuid\Uuid;
use Faker\Factory;

$faker = Factory::create();
$anzahlUser = 1000;

try {
    echo "Start seeding ".__FILE__.'<br>';

    $dbh->query('TRUNCATE TABLE `users`'); // Altdaten werden geleert

    $sql = 'INSERT INTO users (id, firstname, lastname) VALUES(UUID_TO_BIN(:id), :firstname,:lastname)';
    $stmt = $dbh->prepare($sql);

    for($i = 0; $i < $anzahlUser; $i++) {
        $stmt->execute(['firstname' => $faker->firstName(), 'lastname' => $faker->lastName(), 'id' => Uuid::uuid4()->toString()]);
    }

    echo "End seeding ".__FILE__.'<br>';
}
catch(PDOException $e) {
    echo "<p>Problems with seeding ".__FILE__.'<br>';
    print_r($e->errorInfo);
    die();
}