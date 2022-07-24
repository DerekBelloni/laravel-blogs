<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Log\Logger;
use App\Services\Newsletter;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostsController;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\NewsletterController;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\RegistrationController;



Route::get('/', [PostsController::class, 'index'])->name('home');

Route::get('/posts/{post:slug}', [PostsController::class, 'show']);
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::post('/newsletter', NewsletterController::class);

Route::get('/admin/posts/dashboard', [AdminController::class, 'index'])->middleware('admin');

Route::get('register', [RegistrationController::class, 'create'])->middleware('guest');
Route::post('register', [RegistrationController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('sessions', [SessionsController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::get('admin/posts/create', [PostsController::class, 'create'])->middleware('admin');
Route::post('admin/posts', [PostsController::class, 'store'])->middleware('admin');
