<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DoRequest;
use App\board as Board;
use App\doo;
use App\Http\Resources\DoResource;
use Symfony\Component\HttpFoundation\Response;


class DoController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
	}

    public function createDo(DoRequest $request,Board $board)
    {
    	$do = new doo($request->all());
        $board->doos()->save($do);

        return response([
            'data' => new DoResource($board)
        ],Response::HTTP_CREATED);
    }

    public function destroyDo(doo $do)
    {
        $do->delete();
        return response(null,Response::HTTP_NO_CONTENT);
    }

    public function updateDo(DoRequest $request,doo $do)
    {
        $do->update($request->all());
        return response([
            'data' => new DoResource($do)
        ],Response::HTTP_CREATED);
    }
}
