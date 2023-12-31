<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegistrationController extends Controller
{
  public function create()
  {
    return view('register');
  }

  public function store()
  {
    $attributes = request()->validate([
      'username' => ['required','min:2','max:255',Rule::unique('users','username')],
      'name' => ['required','min:2','max:100'],
      'email' => ['required','min:1','max:255',Rule::unique('users','email')],
      'password' => ['required','min:8','max:255']
    ]);

    $attributes['slug'] = str_replace(' ','-',request('username'));

    $user = User::create($attributes);

    auth()->login($user);
    
    session()->flash('success','You have registered successfully');

    return redirect('/');
  }
}
