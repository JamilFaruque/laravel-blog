<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

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
// Route::controller(PostController::class)->group(function(){
  // this is laravel 9 feature || route controller groups
// });

Route::get('/', [PostController::class, 'index']);
Route::get('/end',function(){
  return to_route('/');
});
Route::get('/not-found',[PostController::class, 'errorPage']);

Route::get('/posts/{post:slug}', [PostController::class, 'show']);
Route::post('/posts/{post:slug}/comment',[PostCommentController::class,'store']);

Route::get('/login', [LoginController::class, 'create'])->middleware('guest');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout',[LoginController::class, 'destroy']);

Route::get('/register',[RegistrationController::class,'create'])->middleware('guest');
Route::post('/register',[RegistrationController::class,'store']);

// ADMIN ROUTES
Route::get('/admin/posts',[AdminPostController::class,'index'])->middleware('admin');
Route::get('/admin/post/create',[AdminPostController::class,'create'])->middleware('admin');
Route::post('/admin/publish-post',[AdminPostController::class,'store']);
Route::get('/admin/posts/{post}/edit',[AdminPostController::class,'edit'])->middleware('admin');
Route::patch('/admin/posts/update/{post}',[AdminPostController::class,'update']);
Route::delete('/admin/posts/{post}/delete',[AdminPostController::class,'destroy']);
