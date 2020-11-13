<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Post;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StoreContactPost;
use App\Mail\OrderShipped;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function showContactForm()
    {
        
        return view('pages.contact');
    }

    public function sendingEmail(Request $request) {
        
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required',
            'message' => 'required'
        ]);

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

        return view('pages.index')->with([
            'posts' => $posts
        ]);
    }

    public function project() {
        return view('pages.project');
    }
}
