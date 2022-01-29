<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    $user = factory(User::class)->create();
    return [
        'user_id' => $user->id,
        'first_name' => $faker->firstName(),
        'last_name' => $faker->lastName(),
        'gender' => $faker->randomElement(['Male', 'Female']),
        'email' => $faker->unique()->safeEmail,
        'points' => $faker->numberBetween(30, 500)
    ];
});

$factory->state(Customer::class, 'male', [
    'gender' => 'Male'
]);

$factory->state(Customer::class, 'female', [
    'gender' => 'Female'
]);


