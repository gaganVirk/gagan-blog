<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class SearchController extends Controller
{
    public function search(Request $request) 
    {

        if($request->has('search')) {
            $posts = Post::search($request->get('search'))->get();
        }
        else {
            $posts = Post::get();
        }
       
        return view('pages.search')->with([
            'posts' => $posts
        ]);
    }
}
