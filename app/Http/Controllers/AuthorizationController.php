<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthorizationController extends Controller
{
    function editAdmin() {
      $items = User::all();
      return view('authorization.admin.edit-admin', ['items' => $items]);
    }

    function updateAdmin(Request $request) {
      foreach ($request->items as $itemId => $isChecked) {
        $item = User::find($itemId);
        $item->is_admin = (bool)$isChecked; // Convert to boolean
        $item->save();
    }

      return redirect()->route('dashboard');
    }
}
