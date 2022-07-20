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
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\RegistrationController;
use App\Services\Newsletter;

Route::post('/newsletter', function () {
  request()->validate(['email' => 'required|email']);


  try {
    $newsletter = new Newsletter();
    $newsletter->subscribe(request('email'));
  } catch (\Exception $e) {
    throw \Illuminate\Validation\ValidationException::withMessages([
      'email' => 'This email could not be added to our newsletter list.'
    ]);
  }
  return redirect('/')->with('success', 'You are now signed up for our newsletter');
});



Route::get('/', [PostsController::class, 'index'])->name('home');

Route::get('/posts/{post:slug}', [PostsController::class, 'show']);

Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::get('register', [RegistrationController::class, 'create'])->middleware('guest');
Route::post('register', [RegistrationController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('sessions', [SessionsController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');
