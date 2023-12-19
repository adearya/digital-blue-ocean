<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    function indexProfile() {
      return view('profiles.index');
    }

    function editProfile($username) {

      $items = User::where('username', $username)->firstOrFail();

      return view('profiles.edit', [ 'items' => $items ]);
    }

    function updateProfile(Request $request, $username) {
      $user = User::where('username', $username)->firstOrFail();

    $validateData = $request->validate([
        'name' => 'sometimes',
        'username' => 'sometimes|unique:users,username,'.$user->id,
        'email' => 'sometimes|email|unique:users,email,'.$user->id,
        'password' => 'nullable|min:8',
    ]);

    // Hanya mengupdate password jika diberikan
    if (isset($validateData['password'])) {
        $validateData['password'] = Hash::make($validateData['password']);
    } else {
        // Hapus password dari $validateData jika tidak diberikan untuk menghindari update menjadi null
        unset($validateData['password']);
    }

    $user->update($validateData);

      return redirect()->route('dashboard');
    }
}
