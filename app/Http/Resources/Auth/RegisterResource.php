<?php

namespace App\Http\Resources\Auth;

use Illuminate\Http\Resources\Json\JsonResource;

class RegisterResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'response_code'    => '00',
            'response_message' => 'Register Successfully',
            'data' => $this->resource
        ];
    }
}
