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
/*
Route::get('/', function () {
    return view('welcome');
})->name('welcome'); */

 // pages controller 
 Route::get('/', [PagesController::class, 'index'])->name('pages.index');

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
 Route::resource('posts', PostsController::class);
 Route::get('/posts/category/{category}', [PostsController::class, 'filterByCategory'])->name('posts.filterByCategory');

 // Projects page
 Route::get('/projects', [PagesController::class, 'project'])->name('pages.project');

 // Books page
 Route::resource('books', BooksController::class);

Route::middleware(['auth:sanctum', 'verified'])->group(function() {
    Route::get('/create-post', [PostsController::class, 'create'])->name('posts.create-post');
    Route::post('/upload-image', [PostsController::class, 'uploadImage'])->name('posts.upload-image');

    Route::get('/book-review', [BooksController::class, 'create'])->name('books.book-review');
    Route::post('/upload-bookImage', [BooksController::class, 'uploadBookImage'])->name('books.upload-bookImage');
});



