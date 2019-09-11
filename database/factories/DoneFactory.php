<?php

use Faker\Generator as Faker;
use App\board as Board;


$factory->define(App\done::class, function (Faker $faker) {
    return [
        'board_id' => function(){
        	return Board::all()->random();
        },
        'done_title' => $faker->word,
    ];
});
