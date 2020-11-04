<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShipped;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function sendingEmail() {
        $data = [
            'name' => 'Gagan',
            'verification' => 'sdfsdf'
        ];

        $to_email = "gagan@ocular.co.nz";

        Mail::to($to_email)->send(new OrderShipped($data)); 
       
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

        return redirect('pages.contact')->with([
            'posts' => $posts
        ]);
    }
}
