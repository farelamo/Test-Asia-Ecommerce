<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'response_code'    => '00',
            'response_message' => 'Successfully get data',
            'data' => $this->collection
        ];
    }
}
