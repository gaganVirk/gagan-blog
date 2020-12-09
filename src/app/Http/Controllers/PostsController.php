<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogPost;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Image;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use App\Models\User;
use App\Policies\PostPolicy;
use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

        $this->authorize('uploadImage', Post::class);
        $file = $request->file('upload');

        $partialUrl = Storage::disk('s3')->put('posts', $file, 'public');

       // $fullUrl = config('filesystems.disks.s3.endpoint') . '/' . $partialUrl;
       $fullUrl = config('app.url') .'/'. $partialUrl;
       
        // $file = $request->file('upload');
        // $path = $file->store('yolo', 'public');
        // $filename = $request->file('upload')->getClientOriginalName();

        $image = new Image();
        $image->image = $fullUrl;
        $image->generated_name = $fullUrl;
        $image->path = $fullUrl;
        $image->save();

        // Store this image in a session.
        $images = session()->has('images') ? session()->get('images') : [];
        $images[] = $image->id;
        session()->put('images', $images);

        return [
            // 'url' => url('storage/'.$path)
            'url' => $fullUrl,
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts = Cache::rememberForever('posts.index', function () {
            return Post::withTrashed()->with('category', 'images')->get();
        });

        return view('posts.index')->with([
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Post::class);

        $categories = Category::orderBy('categoryName')->get();

        // Clear the session.
        session()->put('images', []);

        return view('posts.create')->with(compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogPost $request, User $user)
    {
        $this->authorize('store', Post::class);

        $user->with('CRUD posts');
        $post = new Post();
        $post->title = $request->input('title');
        $post->body = ($request->input('body'));
        
        $post->category_id = $request->input('category_id');
        $post->slug = Str::slug($post->title);
        $post->created_at = $request->input('date');
        $post->save();

        foreach (session()->get('images') as $imageId) {
            $image = Image::find($imageId);

            $post->images()->attach($image);
            // Clear the session.
            session()->put('images', []);
        }
        return redirect()->route('posts.index')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {  
         $image = Image::find($post->id);

        return view('posts.show')->with([
            'post' => $post,
            'image' => $image,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post, User $user)
    {
        $this->authorize('edit', $post);

        return view('posts.edit')->with([
            'post' => $post,
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
        $this->authorize('update', Post::class);

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
    public function destroy(Post $post)
    {
        $this->authorize('delete', Post::class);

        $post->delete();
        
        return redirect()->route('posts.index');
    }

    /**
     * Restore posts from database
     * 
     */
    public function restore($slug)
    {
        $this->authorize('restore', Post::class);

        $post = Post::withTrashed()->where('slug', $slug)->first();
        $post->restore();
        
        return redirect()->route('posts.show', $post);
    }
}
