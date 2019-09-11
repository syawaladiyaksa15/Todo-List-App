<?php

use Faker\Generator as Faker;
use App\User;

$factory->define(App\board::class, function (Faker $faker) {
    return [
    	'user_id' => function(){
    		return User::all()->random();
    	},
        'board_title' => $faker->word,
    ];
});
