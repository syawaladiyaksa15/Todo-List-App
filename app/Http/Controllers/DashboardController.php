<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\board as Board;
use Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index($id)
    {
    	$dataBoard = Board::findOrFail($id);
    	if (Auth::user()->id != $dataBoard->user_id) {
    		return redirect('/home');
    	}

    	return view('dashboard',['id' => $id,'title' => $dataBoard]);
    }
}
