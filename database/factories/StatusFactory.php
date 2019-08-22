<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Statuse;
use Faker\Generator as Faker;

$factory->define(Statuse::class, function (Faker $faker) {
    $date_time = $faker->date . ' ' . $faker->time;
    return [
        //
        'content' => $faker->text,
        'created_at' => $date_time,
        'updated_at' => $date_time
    ];
});
