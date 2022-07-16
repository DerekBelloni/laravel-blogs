<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\RegistrationController;


Route::get('/', [PostsController::class, 'index'])->name('home');

Route::get('/posts/{post:slug}', [PostsController::class, 'show']);

Route::get('register', [RegistrationController::class, 'create'])->middleware('guest');

Route::post('register', [RegistrationController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');

Route::post('sessions', [SessionsController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');
