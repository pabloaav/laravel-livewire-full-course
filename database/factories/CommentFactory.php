<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use App\SupportTicket;
use App\User;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'body' =>  $faker->paragraph(),
        'image' => Str::random(10),
        'user_id'   => User::all()->random()->id,
        'support_ticket_id'   => SupportTicket::all()->random()->id
    ];
});
