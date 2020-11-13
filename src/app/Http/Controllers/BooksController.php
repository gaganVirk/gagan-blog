<?php
namespace App\Http\Controllers;
use App\Models\BookImage;
use Illuminate\Http\Request;
use App\Models\Book;

class BooksController extends Controller
{
    public function uploadBookImage(Request $request) {
        $file = $request->file('upload');

        $path = $file->store('avatars', 'public');
        $filename = $request->file('upload')->getClientOriginalName();

        $image = new BookImage();
        $image->upload_image = $filename;
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
    public function index()
    {
        $books = Book::all();

        $users = Book::latest()->paginate(5);

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
        $books = Book::all();
        return view('books.book-review')->with([
            'books' => $books
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = new Book();
        $book->title = $request->input('title');
        $book->body = strip_tags($request->input('body'));
        
        $book->save();
        
        return redirect()->route('books.index')->with('success', 'Book Review Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
