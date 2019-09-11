<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class done extends Model
{
    protected $fillable = [
    	'board_id',
    	'done_title'
    ];

    public function board() {
    	return $this->belongsTo('App\board');
    }
 }
