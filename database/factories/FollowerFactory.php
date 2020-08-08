<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Follower;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Follower::class, function (Faker $faker) {
    $userIds = User::orderBy('id', 'ASC')->limit(15)->pluck('id');
    return [
        'user_id' => $faker->randomElement($userIds),
        'follower_id' => $faker->randomElement($userIds),
        'created_at' => $faker->dateTime(),
        'updated_at' => $faker->dateTime()
    ];
});
