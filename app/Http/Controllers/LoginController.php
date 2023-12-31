<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
  public function create()
  {
    return view('login');
  }

  public function store()
  {
    $credentials = request()->validate([
      'email' => ['required'],
      'password' => ['required']
    ]);

    if (auth()->attempt($credentials)) {
      session()->regenerate();
      return redirect('/');
    }

    //if authectication failed
    return back()->withInput()->withErrors(['login_failed' => 'Your provided credentials did not match']);
  }

  public function destroy()
  {
    auth()->logout();
    session()->flash('success','You are logged out!');
    return redirect('/');
  }
}
