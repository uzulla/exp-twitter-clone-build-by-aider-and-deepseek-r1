<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TweetController;

// 認証ルート
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/logout', function () {
    auth()->logout();
    return redirect('/');
})->name('logout');

// 認証済みルート
Route::middleware(['auth'])->group(function () {
    Route::get('/', [TweetController::class, 'index'])->name('tweets.index');
    Route::post('/tweets', [TweetController::class, 'store'])->name('tweets.store');
});
