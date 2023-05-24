<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts/trashed', [PostController::class, 'trashed'])->name('posts.trashed');
Route::get('/posts/restore/{post}', [PostController::class, 'restore'])->name('posts.restore');
Route::delete('/posts/delete/{post}', [PostController::class, 'delete'])->name('posts.delete');

Route::resource('/posts', PostController::class);

