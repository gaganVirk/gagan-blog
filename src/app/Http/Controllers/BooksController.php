<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreBookPost;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Str;
use App\Models\User;

class BooksController extends Controller
{
    public function upload(Request $request) {
        $this->authorize('upload', Book::class);

        $file = $request->file('file');

        //get filename with extension
        $filenamewithextension = $request->file('file')->getClientOriginalName();
    
        //get filename without extension
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
    
        //get file extension
        $extension = $request->file('file')->getClientOriginalExtension();
    
        //filename to store
        $filenametostore = $filename.'_'.time().'.'.$extension;
    
        //Upload File
        $request->file('file')->storeAs('public/uploads', $filenametostore);
    
        // you can save image path below in database
        $path = asset('storage/uploads/'.$filenametostore);
    
        $image = new Image();
        $image->image = $filename;
        $image->generated_name = $file->hashName();
        $image->path = $path;
        $image->save();

        // Store this image in a session.
        $images = session()->has('images') ? session()->get('images') : [];
        $images[] = $image->id;
        session()->put('images', $images);
    
        echo $path; 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();

        $users = Book::latest()->paginate(25);

        return view('books.index')->with([
            'books' => $books,
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
        $this->authorize('create', Book::class);
        $books = Book::all();
        $users = Book::latest()->paginate(15);

        return view('books.create')->with([
            'books' => $books,
            'users' => $users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookPost $request, User $user)
    {
        $this->authorize('store', Book::class);
        $user->with('CRUD books');
        $book = new Book();
        $book->title = $request->input('title');
        $book->content = strip_tags($request->input('content'));
        $book->slug = Str::slug($book->title);
        $book->save();

        foreach (session()->get('images') as $imageId) {
            $image = Image::find($imageId);

            $book->images()->attach($image);
            // Clear the session.
            session()->put('images', []);
        }
        return redirect()->route('books.index')->with('success', 'Book Review Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book, User $user)
    {
        $image = Image::find($book->id);

        return view('books.show')->with([
            'book' => $book,
            'image' => $image
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $this->authorize('edit', $book);

        return view('books.edit')->with([
            'book' => $book,
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
        $book = Book::find($id);

        $this->authorize('update', $book);

        $book->update($request->all());

        return redirect()->route('books.show')->with([
            'book' => $book,
            'success' => 'Book Post Updated',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $this->authorize('delete', $book);
        $book->delete();
        return redirect()->route('books.index');
    }

    /**
     * Restore book posts from database
     */
    public function restore($slug) {
        $this->authorize('restore', Book::class);

        $book = Book::withTrashed()->where('slug', $slug)->first();
        $book->restore();

        return redirect()->route('books.index', $book);
    }
}
