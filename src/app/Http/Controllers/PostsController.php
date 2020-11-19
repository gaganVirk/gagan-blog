<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogPost;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Image;

class PostsController extends Controller
{

    public function filterByCategory(Category $category)
    {
        $posts = $category->posts;
        $users = DB::table('posts', '>', 100)->paginate('2');

        return view('posts.index')->with([
            'posts' => $posts,
            'users' => $users
        ]);
    }

    public function uploadImage(Request $request) {
        $file = $request->file('upload');

        $path = $file->store('yolo', 'public');
        $filename = $request->file('upload')->getClientOriginalName();

        $image = new Image();
        $image->image = $filename;
        $image->generated_name = $file->hashName();
        $image->path = url('storage/'.$path);
        $image->save();

        return ['url' => url('storage/'.$path)];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $post = Post::all();
        
        $users = Post::latest()->paginate(5);

        return view('posts.index')->with([
            'posts' => $post,
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('categoryName')->get();

        return view('posts.create-post')->with(compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogPost $request)
    {
        $post = new Post();
        $post->title = $request->input('title');
        $post->body = strip_tags($request->input('body'));
        
        $post->category_id = $request->input('category_id');
        $post->save();
        
        return redirect()->route('posts.index')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $image = Image::find($id);

        return view('posts.show')->with([
            'post' => $post,
            'image' => $image
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $image = Image::find($id);
        
        return view('posts.edit-post')->with([
            'post' => $post,
            'image' => $image
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        $post->update($request->all());

        return redirect()->route('posts.show',$post)->with([
            'success' => 'Post Updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete($id);

        return redirect()->route('posts.show',$post);
    }

    /**
     * Restore posts from database
     * 
     * @param int $id
     * 
     */
    public function restore() {
        dd('test');
        return view('posts.index');
    }
}
