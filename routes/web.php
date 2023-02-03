<?php

use App\Http\Controllers\postController;
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

Route::get('/', [postController::class,'home'])->name('post.home');
Route::get('/all-post', [postController::class,'allPost'])->name('post.allPost');
Route::post('/post', [postController::class,'post'])->name('post.postsubmit');
Route::get('/edit-post/{id}', [postController::class,'editPost'])->name('post.edit');
Route::put('/update-post/{id}', [postController::class,'updatePost'])->name('post.update');//this route for update 
Route::delete('/delete-post/{id}', [postController::class,'deletePost'])->name('post.delete');//this rout for delete
