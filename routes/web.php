<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TweetController;

// 認証ルート
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function () {
    $credentials = request()->only('email', 'password');
    
    if (auth()->attempt($credentials)) {
        return redirect()->route('tweets.index');
    }
    
    return back()->withErrors(['email' => 'Invalid credentials']);
});

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', function () {
    $attributes = request()->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|confirmed|min:8'
    ]);
    
    \App\Models\User::create([
        'name' => $attributes['name'],
        'email' => $attributes['email'],
        'password' => bcrypt($attributes['password'])
    ]);
    
    return redirect()->route('login');
});

Route::post('/logout', function () {
    auth()->logout();
    return redirect('/');
})->name('logout');

// 認証済みルート
Route::middleware(['auth'])->group(function () {
    Route::get('/', [TweetController::class, 'index'])->name('tweets.index');
    Route::post('/tweets', [TweetController::class, 'store'])->name('tweets.store');
});
