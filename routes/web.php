<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::get('/', [PostController::class, 'getPostsView']);
Route::get('/posts/{id}', [PostController::class, 'getSinglePostView']);
Route::get('/add-post', [PostController::class, 'addPostView']);
Route::post('/add-post', [PostController::class, 'addPost'])->name('posts.add');
Route::get('/posts/update/{id}', [PostController::class, 'updatePostView']);
Route::put('/posts/update/{id}', [PostController::class, 'updatePost'])->name('posts.update');
Route::delete('/delete-post/{id}', [PostController::class, 'deletePost'])->name('posts.delete');
