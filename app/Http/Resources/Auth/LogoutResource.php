<?php

namespace App\Http\Resources\Auth;

use Illuminate\Http\Resources\Json\JsonResource;

class LogoutResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'response_code'    => '00',
            'response_message' => 'Logout Successfully',
            'data'  => null
        ];
    }
}
