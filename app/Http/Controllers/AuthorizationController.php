<?php

// Namespace pada direktori Controllers
namespace App\Http\Controllers;

// Import Models
use App\Models\User;
use App\Models\Publish;

// Import method Request
use Illuminate\Http\Request;

// Class AuthorizationController
class AuthorizationController extends Controller {
  
  // Method Status pada Admin
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

  // Method Edit pada Admin
  function editAdmin() {
    $items = User::all();
    return view('authorization.admin.edit-admin', ['items' => $items]);
  }

  // Method Update pada Admin
  function updateAdmin(Request $request) {
    foreach ($request->items as $itemId => $isChecked) {
      $item = User::find($itemId);
      $item->is_admin = (bool)$isChecked; // Convert to boolean
      $item->save();
    }      
    
    return redirect()->route('dashboard');
  }
}
