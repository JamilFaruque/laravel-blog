<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  use HasFactory;

  protected $guarded = [];

  protected $with = ['category', 'author'];

  public function scopeFilter($query, array $filters)
  {
    if ($filters['search'] ?? false) {
      $query->where('title', 'like', '%' . request('search') . '%')
        ->orWhere('body', 'like', '%' . request('search') . '%');
    }

    if ($filters['category'] ?? false) {
      $query->whereHas('category', function ($query) use ($filters) {
        $query->where('categories.name', $filters['category']);
      });
    }

    if ($filters['author'] ?? false) {
      $query->whereHas('author', function ($query) use ($filters) {
        $query->where('users.slug', $filters['author']);
      });
    }
  }

  public function category()
  {
    return $this->belongsTo(Category::class);
  }

  public function author()
  {
    return $this->belongsTo(User::class, 'user_id');
  }

  public function comments()
  {
    return $this->hasMany(Comment::class);
  }
}
