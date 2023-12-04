<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      return view('items.index.manage-deposits', [
        // 'posts' => Collection::where('user_id', auth()->user()->id)->get()
        'posts' => Collection::all()
      ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createItemSubmissionCenter()
    {
        return view('items.create.item-submission-center');
    }

    public function createItemKeywords()
    {
      return view('items.create.item-keywords');
    }

    public function createItemDeposits()
    {
      return view('items.create.item-deposits');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeItemSubmissionCenter(Request $request)
    {
      // Validasi data jika diperlukan
      $validatedData = $request->validate([
          'title' => 'required|max:255',
          'slug' => 'required|max:255',
          // tambahkan aturan validasi lainnya sesuai kebutuhan
      ]);
      
      $request->session()->put('post_data', $validatedData);

      return redirect()->route('create-item-keywords');
    }

    public function storeItemKeywords(Request $request)
    {
      
      
      return redirect()->route('create-item-deposits');    
    }

    public function storeItemDeposits(Request $request)
    {
      

      
      Collection::create(session('post_data'));

      // // Hapus data dari sesi setelah submit berhasil
      // $request->session()->forget('post_data');

      return redirect('/dashboard/manage-deposits');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
      $collection = Collection::where('slug', $slug)->firstOrFail();
      return view('dashboard.detail', ['post' => $collection]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Collection $collection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Collection $collection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Collection $collection)
    {
        //
    }
}
