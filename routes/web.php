<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/user-profile', [ProfileController::class, 'showProfile'])
        ->name('user.profile');
});

Route::middleware('auth')->group(function () {
    Route::get('/posts', [PostController::class, 'index'])
        ->name('posts.index');

    Route::get('/post/{post}/edit', function (App\Models\Post $post) {
        return view('posts.edit', compact('post'));
    })->middleware('can:update,post')->name('post.edit');

    Route::put('/post/{post}', [PostController::class, 'update'])
        ->name('post.update');
});

require __DIR__.'/auth.php';