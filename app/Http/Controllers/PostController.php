<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Author;
use App\Models\ItemType;
use App\Models\Language;
use App\Models\DataType;
use App\Models\Refereed;
use App\Models\Status;
use App\Models\PageRange;
use Illuminate\Http\Request;

class PostController extends Controller
{
  public function index() {
    $collections = Collection::with('authors')->get();
    return view('items.index.manage-deposits', compact('collections'));      
  }

  public function createItemSubmissionCenter() {
    $itemTypes = ItemType::all();
    $languages = Language::all();
    $dataTypes = DataType::all();
    $refereeds = Refereed::all();
    $statuses = Status::all();    

    return view('items.create.item-submission-center', [
      'itemTypes' => $itemTypes,
      'languages' => $languages,      
      'dataTypes' => $dataTypes,
      'refereeds' => $refereeds,
      'statuses' => $statuses,      
    ]);
  }

  public function storeItemSubmissionCenter(Request $request) {
    $validatedData = $request->validate([
      'itemTypes' => 'required',
      'languages' => 'required',
      'title' => 'required|max:255',
      'slug' => 'required|max:255',
      'abstract' => 'required|max:255',
      'firstName' => 'required|array',
      'lastName' => 'required|array',
      'email' => 'required|array',
      'authorCompany' => 'required|array',
      'refereeds' => 'required',
      'statuses' => 'required',
      'journalOrPublicationTitle' => 'required|max:255',
      'issn' => 'required|max:255',
      'publisher' => 'required|max:255',
      'officialUrl' => 'required|max:255',
      'volume' => 'required|max:255',
      'number' => 'required|max:255',
      'fromPage' => 'required|max:255',
      'toPage' => 'required|max:255',
      'year' => 'required|max:255',
      'month' => 'required|max:255',
      'day' => 'required|max:255',
      'dataTypes' => 'required',
      'emailDepositor' => 'required|max:255',
      'reference' => 'required|max:255',
    ]);    

    $request->session()->put('post_data', $validatedData);
    // dd(session('post_data'));
    return redirect()->route('create-item-keywords');
  }

  public function createItemKeywords() {
    return view('items.create.item-keywords');
  }

  public function storeItemKeywords(Request $request) {
    return redirect()->route('create-item-deposits');    
  }

  public function createItemDeposits() {
    return view('items.create.item-deposits');
  }
  
  public function storeItemDeposits(Request $request) {
    $postData = session('post_data');

    $collection = Collection::create([
      'title' => $postData['title'],
      'slug' => $postData['slug'],
      'abstract' => $postData['abstract'],
      'journal_or_publication_title' => $postData['journalOrPublicationTitle'],
      'issn' => $postData['issn'],
      'publisher' => $postData['publisher'],
      'official_url' => $postData['officialUrl'],
      'volume' => $postData['volume'],
      'number' => $postData['number'],
      'from_page' => $postData['fromPage'],
      'to_page' => $postData['toPage'],
      'year' => $postData['year'],
      'month' => $postData['month'],
      'day' => $postData['day'],
      'email_depositor' => $postData['emailDepositor'],
      'reference' => $postData['reference'],
    ]);

    // // Inisialisasi array untuk menyimpan ID penulis
    $authorIds = [];    

    // Loop through each author in the form data
    foreach ($postData['firstName'] as $index => $firstName) {
      // Create or find the author based on first name and last name
      $author = Author::firstOrCreate([
          'firstName' => $firstName,
          'lastName' => $postData['lastName'][$index],
          'email' => $postData['email'][$index],
          'authorCompany' => $postData['authorCompany'][$index],
      ]);

      // Add the author's ID to the array
      $authorIds[] = $author->id;
    }

    // Lampirkan penulis-penulis ke buku yang baru dibuat
    $collection->authors()->attach($authorIds);

    $itemType = ItemType::firstOrCreate(['name' => $postData['itemTypes']]);
    $collection->item_types()->associate($itemType)->save();

    $language = Language::firstOrCreate(['name' => $postData['languages']]);
    $collection->languages()->associate($language)->save();

    $dataType = DataType::firstOrCreate(['name' => $postData['dataTypes']]);
    $collection->data_types()->associate($dataType)->save();

    $refereed = Refereed::firstOrCreate(['name' => $postData['refereeds']]);
    $collection->refereeds()->associate($refereed)->save();

    $status = Status::firstOrCreate(['name' => $postData['statuses']]);
    $collection->statuses()->associate($status)->save();

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
