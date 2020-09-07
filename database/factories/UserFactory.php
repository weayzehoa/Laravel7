<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(App\Student::class, function(Faker $faker) {
	return [
		'user_id' => function(){ 
			return factory(App\User::class)->create()->id;
		},
		'no' => $faker->regexify('s[0-9]{10}'),
		'tel' => $faker->phoneNumber()
	];
});

$factory->define(App\Score::class, function(Faker $faker) {
	return [
		'student_id' => function(){
			return factory(App\Student::class)->create()->id;
		},
		'chinese' => $faker->numberBetween(0, 100),
		'english' => $faker->numberBetween(0, 100),
		'math' => $faker->numberBetween(0, 100),
	    'total' => 0
	];
});