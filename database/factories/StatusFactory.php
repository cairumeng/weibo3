<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use App\Models\Status;
use Faker\Generator as Faker;

$factory->define(Status::class, function (Faker $faker) {
    $userIds = User::orderBy('id', 'ASC')->limit(10)->pluck('id');
    return [
        'user_id' => $faker->randomElement($userIds),
        'content' => $faker->text(),
        'created_at' => $faker->dateTime(),
        'updated_at' => $faker->dateTime(),
    ];
});
