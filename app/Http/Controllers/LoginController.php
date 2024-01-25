<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {
  public function index() {
    return view('auth.login',[
      "title" => "Login",
    ]);
  }

  public function authenticate(Request $request) {
    $credentials = $request->validate([
      'email' => 'required|email:dns',
      'password' => 'required',
    ]);

    if(Auth::attempt($credentials)){
      $request->session()->regenerate();
      return redirect()->route('dashboard');
    }
      return back();
  }

  public function logout(Request $request) {
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    // Jika berada di middleware auth, redirect ke dashboard
    if ($request->route()->middleware('auth')) {
        return redirect()->route('dashboard');
    }

    // Jika tidak berada di middleware auth, redirect ke dashboard
    return redirect()->back();
  }
}