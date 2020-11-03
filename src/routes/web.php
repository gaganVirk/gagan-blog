<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CertificationsController;
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
Route::get('/send-email', [OrderController::class, 'sendEmail']);

// Route for post categories
Route::resource('categories', 'App\Http\Controllers\CategoriesController')->middleware(['auth:sanctum', 'verified']);

// Login dashboard provided by jetstream
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function() {
    return view('dashboard');
})->name('dashboard');

// About page
Route::middleware(['auth:sanctum', 'verified'])->get('/about', function () {
    return view('pages.about');
})->name('pages.about');

// Certifications routes
Route::resource('certifications', 'App\Http\Controllers\CertificationsController')->middleware(['auth:sanctum', 'verified']);
Route::post('/upload-certificate', [CertificationsController::class, 'certUpload'])->name('certifications.upload-certs')->middleware(['auth:sanctum', 'verified']);

// Contact page
Route::middleware(['auth:sanctum', 'verified'])->get('/contact', function () {
    return view('pages.contact');
})->name('pages.contact');

// Posts page
Route::get('/posts/category/{category}', [PostsController::class, 'filterByCategory'])->middleware(['auth:sanctum', 'verified'])->name('posts.filterByCategory');
Route::get('/create-post', [PostsController::class, 'create'])->middleware(['auth:sanctum', 'verified'])->name('posts.create-post');
Route::resource('posts', 'App\Http\Controllers\PostsController')->middleware(['auth:sanctum', 'verified']);

// To upload images for the post
Route::post('/upload-image', [PostsController::class, 'uploadImage'])->name('posts.upload-image')->middleware(['auth:sanctum', 'verified']);


