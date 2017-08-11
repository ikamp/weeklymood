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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Model\Department::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
    ];
});

$factory->define(App\Model\Company::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->company,
        'logo' => $faker->imageUrl(640, 480, null, true, null),
    ];
});

$factory->define(App\Model\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->firstName,
        'surname' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('12345'),
        'position' => $faker->name,
        'avatar' => $faker->imageUrl(640, 480, null, true, null),
        'department_id' => $faker->numberBetween(1, 20),
        'company_id' => $faker->numberBetween(1, 20),
        'is_manager' => $faker->boolean(false),
        'is_active' => $faker->boolean(true),
        'remember_token' => str_random(10)
    ];
});
