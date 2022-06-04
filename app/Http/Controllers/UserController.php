<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\User\UserResource;
use App\Http\Resources\User\UserCollection;
use App\Http\Requests\User\UserApproveRequest;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $user = User::paginate(2);
        return new UserCollection($user);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return [
            'response_code' => '00',
            'response_message' => 'Successfully get data',
            'data' => new UserResource($user)
        ];
    }

    public function is_approve(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'is_approve' => $request->is_approve
        ]);
        return [
            'response_code' => '00',
            'response_message' => 'Successfully update data',
            'data' => new UserResource($user)
        ];
    }
}
