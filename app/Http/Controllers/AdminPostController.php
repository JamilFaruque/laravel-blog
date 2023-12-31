<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
  public function index()
  {
    return view('admin.posts',[
      'posts' => Post::latest()->paginate(5)
    ]);
  }

  public function create()
  {
    return view('create-post');
  }

  public function store()
  { 
    $attributes = request()->validate([
      'title'=>['required'],
      'slug' => ['required',Rule::unique('posts','slug')],
      'thumbnail' => ['required'],
      'body' => ['required'],
      'category_id' => ['required',Rule::exists('categories','id')]
    ]);

    $attributes['user_id'] = request()->user()->id;
    $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

    Post::create($attributes);

    return redirect('/');
  }

  public function edit(Post $post)
  {
    return view('admin.edit',[
      'post' => $post
    ]);
  }

  public function update(Post $post)
  {
    $attributes = request()->validate([
      'title'=>['required'],
      'slug' => ['required',Rule::unique('posts','slug')->ignore($post->id)],
      'thumbnail' => [''],
      'body' => ['required'],
      'category_id' => ['required',Rule::exists('categories','id')]
    ]);

    $post->update($attributes);

    return back();
  }

  public function destroy(Post $post)
  {
    $post->delete();
    return back();
  }
}
