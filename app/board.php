<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use App\todo;

class board extends Model
{
    protected $fillable = [
    	'user_id','board_title'
    ];

    public function todos() {
    	return $this->hasMany('App\todo')->orderBy('id','DESC');
    }

    public function doos() {
    	return $this->hasMany('App\doo')->orderBy('id','DESC');
    }

    public function dones() {
    	return $this->hasMany('App\done')->orderBy('id','DESC');
    }

    public function user()
    {
        return $this->belongsTo('App\user');
    }
}
