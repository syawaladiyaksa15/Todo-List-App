<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class doo extends Model
{
   protected $fillable = [
    	'board_id',
    	'do_title'
    ];

    public function board() {
    	return $this->belongsTo('App\board');
    }
}
