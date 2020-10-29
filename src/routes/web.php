<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function() {
    return view('pages.about');
});

Route::resource('posts', 'App\Http\Controllers\PostsController');


Route::get('/send-email', [OrderController::class, 'sendEmail']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function() {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/about', function () {
    return view('pages.about');
})->name('pages.about');

Route::middleware(['auth:sanctum', 'verified'])->get('/posts', function () {
    return view('posts.index');
})->name('posts.index');

Route::middleware(['auth:sanctum', 'verified'])->get('/certifications', function () {
    return view('pages.certifications');
})->name('pages.certifications');

Route::middleware(['auth:sanctum', 'verified'])->get('/contact', function () {
    return view('pages.contact');
})->name('pages.contact');

Route::middleware(['auth:sanctum', 'verified'])->get('/create-post', function () {
    return view('posts.create-post');
})->name('posts.create-post');
