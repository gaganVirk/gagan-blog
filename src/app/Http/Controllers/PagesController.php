<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Post;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StoreContactPost;
use App\Mail\OrderShipped;
use App\Models\Book;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function showContactForm()
    {
        
        return view('pages.contact');
    }

    public function sendingEmail(StoreContactPost $request)
    {
        $to_email = config('mail.to.address');

        Mail::to($to_email)
            ->send(new ContactMail($request));
       
        if(Mail::failures() != 0) {
            return "<p> Success! Your E-mail has been sent.</p>";
        }
        else {
            return "<p> Failed! Your E-mail has not sent.</p>";
        } 
        return view('pages.contact');
    }

    public function index() {
        $posts = Post::all();

        $posts = Post::orderBy('created_at', 'desc')->take(2)->get();
        $books = Book::orderBy('created_at', 'desc')->take(2)->get();

        return view('pages.index')->with([
            'posts' => $posts,
            'books' => $books,
        ]);
    }

    public function project() {
        return view('pages.project');
    }

    public function upload(Request $request) {
        $file = $request->file('file');

        //get filename with extension
        $filenamewithextension = $file->getClientOriginalName();
    
        //get filename without extension
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
    
        //get file extension
        $extension = $file->getClientOriginalExtension();
    
        //filename to store
        $filenametostore = $filename.'_'.time().'.'.$extension;
    
        //Upload File
        $request->file('file')->storeAs('public/contact-uploads', $filenametostore);
    
        // you can save image path below in database
        $path = asset('storage/uploads/'.$filenametostore);
    
        echo $path; 
    }
}
