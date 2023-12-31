<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
  public function index()
  {
    return view('welcome', [
      'posts' => Post::latest()->filter(request(['search','category','author']))->get()
    ]);
  }

  public function show(Post $post)
  {
    return view('post', [
      'post' => $post
    ]);
  }

  public function errorPage()
  {
    return view('error');
  }
}
