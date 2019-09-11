<?php

namespace App\Http\Controllers;

use App\board as Board;
use Illuminate\Http\Request;
use App\Http\Requests\BoardRequest;
use App\Http\Resources\BoardResource;
use App\Http\Resources\TodoResource;
use App\Http\Resources\DoResource;
use App\Http\Resources\DoneResource;
use App\User;
use Symfony\Component\HttpFoundation\Response;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function showBoards($id)
    {
        return response([
            'data' => BoardResource::collection(User::findOrFail($id)->boards),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BoardRequest $request,User $user)
    {
        
        $board = new Board($request->all());
        $user->boards()->save($board);

        return response([
            'data' => new BoardResource($board)
        ],Response::HTTP_CREATED);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\board  $board
     * @return \Illuminate\Http\Response
     */
    public function showTodo($user_id,$board_id)
    {
        return response([
            'data' => TodoResource::collection(Board::findOrFail($board_id)->todos)
        ]);
    }

    public function showDo($user_id,$board_id)
    {
        return response([
            'data' => DoResource::collection(Board::findOrFail($board_id)->doos)
        ]);
    }

    public function showDone($user_id,$board_id)
    {
        return response([
            'data' => DoneResource::collection(Board::findOrFail($board_id)->dones)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\board  $board
     * @return \Illuminate\Http\Response
     */
    public function edit(board $board)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\board  $board
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, board $board)
    {
        $board->update($request->all());
        return response([
            'data' => new BoardResource($board)
        ],Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\board  $board
     * @return \Illuminate\Http\Response
     */
    public function destroy(board $board)
    {
        $board->delete();
        return response(null,Response::HTTP_NO_CONTENT);
    }
}
