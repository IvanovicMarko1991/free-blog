<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ContactUsFormController;
use App\Http\Controllers\DashboardController;



Route::get('/', [PagesController::class, 'index']);
Route::get('/about', [PagesController::class, 'about']);

Route::get('/contact', [ContactUsFormController::class,'createForm']);
Route::post('/contact',[ContactUsFormController::class,'contactUsForm']);

Route::get('/search', [PagesController::class, 'search']);
Route::get('/category/{category}', [PagesController::class, 'category']);
Route::get('/tag/{tag}', [PagesController::class, 'tags']);

Route::resource('posts', PostsController::class);

Auth::routes();

Route::get('/dashboard', [DashboardController::class, 'index']);
Route::post('/publish/{id}', [PostsController::class,'publish']);
Route::post('/upload-image', [PostsController::class, 'uploadImage']);

Route::get('/posts/{sort}', [PostController::class, 'sort']);
