<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\Applications::class, function (Faker $faker) {
    return [
        'code' => str_random(8),
        'user_id' => App\Users::all()->random()->id,
        'job_id' => App\Jobs::all()->random()->id
    ];
});
