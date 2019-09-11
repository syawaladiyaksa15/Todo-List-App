<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class todo extends Model
{
    protected $fillable = [
    	'board_id',
    	'todo_title'
    ];

    public function board() {
    	return $this->belongsTo('App\board');
    }
}
