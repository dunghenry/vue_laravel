<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

class PostController extends Controller
{
    public function index()
    {
        $data = DB::table('posts')
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->select('users.id', 'users.name', 'posts.title', 'posts.description', 'posts.image_url')
            ->get();
        return response($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            // 'user_id' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);
        $user = Auth::user();
        $generatedImageName = 'image' . '_' . time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $generatedImageName);
        $post = Post::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'user_id' =>  $user->id,
            'image_url' => $generatedImageName
        ]);
        return response($post);
    }
    public function show($id)
    {
        $post = DB::table('posts')
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->where('users.id', '=', $id)
            ->select('users.id', 'users.name', 'posts.title', 'posts.description', 'posts.image_url')
            ->limit(1)
            ->get();
        return response((array)($post[0]));
    }
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $user = Auth::user();
        if ($post->user_id == $user->id) {
            $request->validate([
                'title' => 'required',
                'description' => 'required',
            ]);
            $post->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'created_at' => now(),
                'updated_at' => now()
            ]);
            return response($post);
        } else {
            return response([
                "message" => "You're not allowed to do that!"
            ], Response::HTTP_BAD_REQUEST);
        }
    }


    public function destroy($id)
    {
        $post = Post::find($id);
        $user = Auth::user();
        if ($post->user_id == $user->id) {
            $post->delete();
            return response(['message' => 'Post deleted successfully'], 200);
        } else {
            return response([
                "message" => "You're not allowed to do that!"
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
