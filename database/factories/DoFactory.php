<?php

use Faker\Generator as Faker;
use App\board as Board;

$factory->define(App\doo::class, function (Faker $faker) {
    return [
        'board_id' => function(){
        	return Board::all()->random();
        },
        'do_title' => $faker->word,
    ];
});
