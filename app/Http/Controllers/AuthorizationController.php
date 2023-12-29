<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Publish;
use Illuminate\Http\Request;

class AuthorizationController extends Controller
{
    function statusAdmin() {
      $totalEditors = User::where('is_admin', true)->count();
      $totalUsers = User::where('is_admin', false)->count();
      $totalItems = Publish::count();
      $totalUsers = User::count();
      return view('authorization.admin.status-admin', [
        'totalEditors' => $totalEditors,
        'totalUsers' => $totalUsers,
        'totalItems' => $totalItems,
        'totalUsers' => $totalUsers,
      ]);
    }

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
