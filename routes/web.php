<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TweetController;

Route::get('/', [TweetController::class, 'index'])->name('tweets.index');
Route::post('/tweets', [TweetController::class, 'store'])->name('tweets.store');
