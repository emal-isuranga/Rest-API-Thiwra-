<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Student::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'nic' => $faker->text('1234561234'),
        'email' => $faker->email,
        'profession' => $faker->text,
        'type' => $faker->randomElement($array = array ('student','expert')),
        'affiliation' => $faker->text,
        'status' => $faker->randomElement($array = array ('APPROVED','REGISTER')),
    ];
});
