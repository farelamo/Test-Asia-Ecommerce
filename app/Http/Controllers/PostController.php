<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Post\PostCollection;
use App\Http\Resources\Post\PostResource;
use App\Http\Requests\Post\PostRequest;
use App\Http\Requests\Post\PostPublishedRequest;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::paginate(2);
        return new PostCollection($post);
    }

    public function store(PostRequest $request)
    {
        $post = auth()->user()->posts()->create([
            'title'       => $request->title,
            'description' => $request->description,
            'is_published'=> '0'
        ]);

        return [
            'response_code' => '00',
            'response_message' => 'Successfully insert data',
            'data' => new PostResource($post)
        ];
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return [
            'response_code' => '00',
            'response_message' => 'Successfully get data',
            'data' => new PostResource($post)
        ];
    }

    public function update(PostRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        if($post->user_id != auth()->user()->id){
            return [
                'response_code' => '01',
                'response_message' => 'Sorry, This is not your post',
                'data' => null
            ];
        }

        $post->update([
           'title'       => $request->title,
           'description' => $request->description
        ]);

        return [
            'response_code' => '00',
            'response_message' => 'Successfully update data',
            'data' => new PostResource($post)
        ];
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if($post->user_id != auth()->user()->id){
            return [
                'response_code' => '01',
                'response_message' => 'Sorry, This is not your post',
                'data' => null
            ];
        }
        
        $post->delete();
        return [
            'response_code' => '00',
            'response_message' => 'Successfully delete data',
            'data' => null
        ];
    }

    public function is_published(Request $request, $id){
        $post = Post::findOrFail($id);
        if($post->user_id != auth()->user()->id){
            return [
                'response_code' => '01',
                'response_message' => 'Sorry, This is not your post',
                'data' => null
            ];
        }
        
        $post->update([
           'is_published'=> $request->is_published
        ]);

        return [
            'response_code' => '00',
            'response_message' => 'Successfully update data',
            'data' => new PostResource($post)
        ];
    }
}
