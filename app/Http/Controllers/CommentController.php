<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Comment\CommentCollection;
use App\Http\Resources\Comment\CommentResource;
use App\Http\Requests\Comment\CommentRequest;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index()
    {
        $comment = Comment::paginate(2);
        return new CommentCollection($comment);
    }

    public function store(Request $request)
    {
        $comment = auth()->user()->comments()->create([
            'comment'       => $request->comment,
            'post_id'       => $request->post_id
        ]);

        return [
            'response_code' => '00',
            'response_message' => 'Successfully insert data',
            'data' => new CommentResource($comment)
        ];
    }

    public function show($id)
    {
        $comment = Comment::findOrFail($id);
        return [
            'response_code' => '00',
            'response_message' => 'Successfully get data',
            'data' => new CommentResource($comment)
        ];
    }
 
    public function update(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);
        if($comment->user_id != auth()->user()->id){
            return [
                'response_code' => '01',
                'response_message' => 'Sorry, This is not your comment',
                'data' => null
            ];
        }

        $comment->update([
            'comment' => $request->comment,
        ]);

        return [
            'response_code' => '00',
            'response_message' => 'Successfully update data',
            'data' => new CommentResource($comment)
        ];
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        if($comment->user_id != auth()->user()->id){
            return [
                'response_code' => '01',
                'response_message' => 'Sorry, This is not your comment',
                'data' => null
            ];
        }

        $comment->delete();
        return [
            'response_code' => '00',
            'response_message' => 'Successfully delete data',
            'data' => null
        ];
    }
}
