<?php

use Faker\Factory;

require_once 'vendor/autoload.php';

$faker = Factory::create();

echo $faker->name().'<br>';
echo $faker->unique()->email().'<br>';
echo $faker->text().'<br>';
echo $faker->word().'<br>';
echo $faker->randomDigit().'<br>';
echo $faker->firstName().'<br>';
echo $faker->lastName().'<br>';
echo $faker->randomElement(['%', '$', '#', '§', '?']).'<br>';

