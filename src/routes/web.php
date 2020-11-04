<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CertificationsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\SearchController;
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

// To send an email using mail gun
//Route::get('/send-email', [OrderController::class, 'sendEmail']);

Route::middleware(['auth:sanctum', 'verified'])->group(function() {

    //Route for searching posts
    Route::post('/search', [SearchController::class, 'search'])->name('pages.search');
    // Route for post categories
    Route::resource('categories', 'App\Http\Controllers\CategoriesController');

    // Login dashboard provided by jetstream
    Route::get('/dashboard', function() { return view('dashboard'); })->name('dashboard');

    // Contact page
    Route::get('/contact', [PagesController::class, 'sendingEmail'])->name('pages.contact');

    // Certifications routes
    Route::resource('certifications', 'App\Http\Controllers\CertificationsController');
    Route::post('/upload-certificate', [CertificationsController::class, 'certUpload'])->name('certifications.upload-certs');

    // Posts page
    Route::get('/posts/category/{category}', [PostsController::class, 'filterByCategory'])->name('posts.filterByCategory');
    Route::get('/create-post', [PostsController::class, 'create'])->name('posts.create-post');
    Route::resource('posts', 'App\Http\Controllers\PostsController');

    // To upload images for the post
    Route::post('/upload-image', [PostsController::class, 'uploadImage'])->name('posts.upload-image');

    // pages controller 
    Route::get('/home', [PagesController::class, 'index'])->name('pages.index');
});



