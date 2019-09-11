<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\board as Board;
use App\Http\Requests\TodoRequest;
use App\Http\Resources\TodoResource;
use Symfony\Component\HttpFoundation\Response;
use App\todo as Todo;


class TodoController extends Controller
{
    
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function createTodo(TodoRequest $request,Board $board) 
    {
    	$todo = new Todo($request->all());
        $board->todos()->save($todo);

        return response([
            'data' => new TodoResource($board)
        ],Response::HTTP_CREATED);
    }

    public function destroyTodo(Todo $todo)
    {
        $todo->delete();
        return response(null,Response::HTTP_NO_CONTENT);
    }

    public function updateTodo(TodoRequest $request,Todo $todo)
    {
        $todo->update($request->all());
        return response([
            'data' => new TodoResource($todo)
        ],Response::HTTP_CREATED);
    }
}
