<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['store', 'destroy']);
    }

    public function index(Post $post)
    {
        //to reduce selection duplication and selecting at once (for each selection gor through each table you use eager loading: with(table1, table2))

        // $posts = Post::latest()->paginate(10);
        $posts = $post->orderBy('created_at', 'DESC')->with('user', 'likes')->paginate(7);
        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function store(Request $request)
    {
        request()->validate([
            'body' => 'required'
        ]);

        $request->user()->posts()->create([
            'body' => $request->body
        ]);

        return redirect(route('posts'))->with('success', 'You just made a tweet');
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post); 
        // used policy delete to make sure the owner of the post is the person making the delete 
        $post->delete();
        return back();
    }
}
