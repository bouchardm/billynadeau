<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Customer::class, function (Faker\Generator $faker) {
    return [
        'firstName' => $faker->firstName,
        'lastName' => $faker->lastName,
    ];
});

$factory->define(App\Car::class, function (Faker\Generator $faker) {
    return [
        'marque' => $faker->word,
        'modele' => $faker->word,
        'annee' => $faker->numberBetween(2000, 2100),
        'no_plaque' => $faker->word,
        'no_serie' => $faker->word,
        'customer_id' => function() {
            return factory(App\Customer::class)->create()->id;
        }
    ];
});

$factory->define(App\Ticket::class, function (Faker\Generator $faker) {
    return [
        'no' => $faker->word,
        'name' => $faker->word,
        'description' => $faker->paragraph,
        'customer_id' => function() {
            return factory(App\Customer::class)->create()->id;
        }
    ];
});
