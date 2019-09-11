<?php

use Faker\Generator as Faker;
use App\board as Board;

$factory->define(App\todo::class, function (Faker $faker) {
    return [
        'board_id' => function(){
        	return Board::all()->random();
        },
        'todo_title' => $faker->word,
    ];
});
