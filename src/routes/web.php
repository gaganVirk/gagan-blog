<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CertificationsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\SearchController;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
})->name('welcome');


Route::middleware(['auth:sanctum', 'verified'])->group(function() {

    // pages controller 
    Route::get('/home', [PagesController::class, 'index'])->name('pages.index');

    // Login dashboard provided by jetstream
    //Route::get('/home', function() { return view('dashboard'); })->name('dashboard');

    //Route for searching posts
    Route::post('/search', [SearchController::class, 'search'])->name('pages.search');

    // Route for post categories
    Route::resource('categories', CategoriesController::class);

    // Contact page
    Route::get('/contact', [PagesController::class, 'showContactForm'])->name('pages.contact');
    Route::post('/contact/send', [PagesController::class, 'sendingEmail'])->name('pages.sendingEmail');


    // Certifications routes
    Route::resource('certifications', CertificationsController::class);
    Route::post('/upload-certificate', [CertificationsController::class, 'certUpload'])->name('certifications.upload-certs');

    // Posts page
    Route::get('/posts/category/{category}', [PostsController::class, 'filterByCategory'])->name('posts.filterByCategory');
    Route::get('/create-post', [PostsController::class, 'create'])->name('posts.create-post');
    Route::resource('posts', PostsController::class);

    // To upload images for the post
    Route::post('/upload-image', [PostsController::class, 'uploadImage'])->name('posts.upload-image');
});



