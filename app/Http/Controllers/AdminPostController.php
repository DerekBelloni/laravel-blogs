<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::paginate(50)
        ]);
    }


    public function show()
    {
        return view('admin.posts.show', [
            'posts' => Post::where('user_id', Auth::id())->paginate(10)
        ]);
    }
}
