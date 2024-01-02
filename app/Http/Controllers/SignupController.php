<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SignupController extends Controller {
  public function index() {
    return view('auth.signup',[
      "title" => "Signup",
    ]);            
  }

  public function store(Request $request) {
    $validatedData = $request->validate([
      'name' => "required|max:255",
      'email' => "required|email:dns|unique:users",
      'username' => "required|max:255|min:8|unique:users",
      'password' => "required|max:255|min:8",
    ]);

    $validatedData['password'] = Hash::make($validatedData['password']);

    User::create($validatedData);

    return redirect('/login');
  }
}