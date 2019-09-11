<?php

namespace App\Http\Controllers;

use App\done;
use Illuminate\Http\Request;
use App\Http\Requests\DoneRequest;
use App\board as Board;
use App\Http\Resources\DoneResource;
use Symfony\Component\HttpFoundation\Response;

class DoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function createDone(DoneRequest $request,Board $board)
    {
        $done = new done($request->all());
        $board->dones()->save($done);

        return response([
            'data' => new DoneResource($board)
        ],Response::HTTP_CREATED);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\done  $done
     * @return \Illuminate\Http\Response
     */
    public function show(done $done)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\done  $done
     * @return \Illuminate\Http\Response
     */
    public function edit(done $done)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\done  $done
     * @return \Illuminate\Http\Response
     */
    public function updateDone(DoneRequest $request, done $done)
    {
        $done->update($request->all());
        return response([
            'data' => new DoneResource($done)
        ],Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\done  $done
     * @return \Illuminate\Http\Response
     */
    public function destroyDone(done $done)
    {
        $done->delete();
        return response(null,Response::HTTP_NO_CONTENT);
    }
}
