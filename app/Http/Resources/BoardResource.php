<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BoardResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'board_title' => $this->board_title,
            'href' => [
                'todo' => route('board.todos',['user' => $this->user_id,'board' => $this->id]),
                'do'   => route('board.dos',['user' => $this->user_id, 'board' => $this->id]),
                'done'   => route('board.dones',['user' => $this->user_id,'board' => $this->id]),

            ],
        ];
    }
}
