<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    public function index()
    {
        $tweets = Tweet::with('user')->latest()->get();
        return view('tweets.index', compact('tweets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:280'
        ]);

        auth()->user()->tweets()->create([
            'content' => $request->content
        ]);

        return redirect()->route('tweets.index');
    }
}
