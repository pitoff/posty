<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserPostController extends Controller
{
    public function index(User $user)
    {
        // grab authenticated user and show posts
        $posts = $user->posts()->with(['user', 'likes'])->paginate(7);
        return view('users.posts.index', [
            'user' => $user,
            'posts' => $posts
        ]);
    }
}
