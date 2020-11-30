<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CertificationsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\BooksController;
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

 // pages controller 
 Route::get('/', [PagesController::class, 'index'])->name('pages.index');

 //Route for searching posts
 Route::post('/search', [SearchController::class, 'search'])->name('pages.search');

 // Route for post categories
 Route::resource('categories', CategoriesController::class);

 // Contact page
 Route::get('/contact', [PagesController::class, 'showContactForm'])->name('pages.contact');
 Route::post('/contact/upload', [PagesController::class, 'upload'])->name('pages.upload');
 Route::post('/contact/send', [PagesController::class, 'sendingEmail'])->name('pages.sendingEmail');

 // Certifications routes
 Route::resource('certifications', CertificationsController::class);

 // Posts page
 Route::get('/posts/category/{category}', [PostsController::class, 'filterByCategory'])->name('posts.filterByCategory');
 Route::resource('posts', PostsController::class);

 // Projects page
 Route::get('/projects', [PagesController::class, 'project'])->name('pages.project');

 // Books page
 Route::resource('books', BooksController::class);

Route::middleware(['auth:sanctum', 'verified',])->group(function() {
    // create posts and image upload
    Route::post('/upload-image', [PostsController::class, 'uploadImage'])->name('posts.upload-image');
    Route::get('/posts/{slug}/restore', [PostsController::class, 'restore'])->name('posts.restore');

    // create book review and image upload
    Route::post('upload', [BooksController::class, 'upload'])->name('books.upload-bookImage');

    // Certifications routes
    Route::post('/upload-certificate', [CertificationsController::class, 'certUpload'])->name('certifications.upload-certs');
    
});



