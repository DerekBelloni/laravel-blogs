<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;

class AdminController extends Controller
{

    public function index()
    {
        // $posts = Post::where('user_id', Auth::id())->paginate(10);

        return view('posts.index', [
            'posts' => Post::where('user_id', Auth::id())->paginate(10)
        ]);
    }
}
