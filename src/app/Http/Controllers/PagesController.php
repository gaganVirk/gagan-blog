<?php

namespace App\Http\Controllers;
use App\Models\Post;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        $posts = Post::all();

        $posts = Post::orderBy('created_at', 'desc')->take(2)->get();

        return view('pages.index')->with([
            'posts' => $posts
        ]);
    }
}
