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
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'username' => $faker->unique()->userName,
//        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'age' => $faker->numberBetween($min = 18, $max = 65),
        'experience' => $faker->numberBetween($min = 0, $max = 20),
        'remember_token' => str_random(10),
        'jobs_id' => $faker->numberBetween($min = 1, $max = 70),
    ];
});

$factory->define(App\Project::class, function (Faker\Generator $faker) {


    return [
        'title' => $faker->catchPhrase,
        'description' => $faker->text,
        'completed' => $faker->date($format = 'Y-m-d', $max = 'now'),
    ];
});

$factory->define(App\Admin::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'job_title' => $faker->jobTitle,
    ];
});

$factory->define(App\Company::class, function (Faker\Generator $faker) {


    return [
        'title' => $faker->company,
        'location' => $faker->address,
    ];
});

//$factory->define(App\Comment::class, function (Faker\Generator $faker) {
//
//
//    return [
//        'user_id' => $faker->unique()->numberBetween($min = 1, $max = 50),
//        'title' => $faker->bs,
//        'text' => $faker->text,
//    ];
//});

$factory->define(App\Contact::class, function (Faker\Generator $faker) {


    return [
        'user_id' => $faker->unique()->numberBetween($min = 1, $max = 50),
        'email' => $faker->unique()->safeEmail,
        'github' => $faker->unique()->url,
        'facebook' => $faker->unique()->url,
        'skype' => $faker->unique()->userName,
        'google_plus' => $faker->unique()->url,
        'phone' => $faker->phoneNumber,
    ];
});

//$factory->define(App\Photo::class, function (Faker\Generator $faker) {
//
//    return [
//        'user_id' => $faker->unique()->numberBetween($min = 1, $max = 50),
//        'link' => $faker->url,
//    ];
//});