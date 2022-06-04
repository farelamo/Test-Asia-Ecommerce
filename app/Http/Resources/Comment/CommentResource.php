<?php

namespace App\Http\Resources\Comment;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'          => $this->id,
            'comment'     => $this->comment,
            'post'        => $this->post->id,
            'user'        => $this->user->id
        ];
    }
}
