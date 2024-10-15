<?php

// Namespace pada direktori Controllers
namespace App\Http\Controllers;

// Import Models
use App\Models\Author;
use App\Models\Deposit;
use App\Models\Keyword;
use App\Models\Category;
use App\Models\ItemType;
use App\Models\Language;
use App\Models\DataType;
use App\Models\Refereed;
use App\Models\Status;
use App\Models\PageRange;

// Import Method Storage, Str, dan Request
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

// Class DepositController
class DepositController extends Controller {

  // Method Index pada Manage Deposit
  public function indexManageDeposit() {
    $collections = Deposit::latest()->paginate(10);
    $collections_count = Deposit::where('user_upload', '=', auth()->user()->email)->latest()->paginate(10);

    return view('items.index.manage-deposits', [
      'collections' => $collections,
      'posts_count' => $collections_count,
    ]);      
  }

  // Method Create pada Manage Deposit
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

  // Method Store pada Manage Deposit
  public function storeItemSubmissionCenter(Request $request) {

    // Validasi input yang akan dikirim
    $validatedData = $request->validate([
      'itemTypes' => 'required',            
      'languages' => 'required',
      'title' => 'required|max:255',      
      'abstract' => 'required',
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
      'emailDepositor' => 'sometimes|max:255',
      'reference' => 'sometimes|max:255',
    ]);

    // Remove empty values from the 'firstName' array
    $filteredFirstName = array_filter($validatedData['firstName'], 'strlen');
    $filteredLastName = array_filter($validatedData['lastName'], 'strlen');
    $filteredEmail = array_filter($validatedData['email'], 'strlen');
    $filteredAuthorCompany = array_filter($validatedData['authorCompany'], 'strlen');

    // Update the validated data with the filtered 'firstName'
    $validatedData['firstName'] = $filteredFirstName;
    $validatedData['lastName'] = $filteredLastName;
    $validatedData['email'] = $filteredEmail;
    $validatedData['authorCompany'] = $filteredAuthorCompany;

    // Put input ke Session
    $request->session()->put('post_data', $validatedData);
    
    return redirect()->route('create-item-keywords');
  }

  public function createItemKeywords() {
    $categories = Category::all();

    return view('items.create.item-keywords', [
      'categories' => $categories,
    ]);
  }

  public function storeItemKeywords(Request $request) {
    // Validasi data termasuk category
    $validatedData = $request->validate([
      'categories' => 'required',
      'keyword' => 'required|array',
      // ... (aturan validasi lainnya)
    ]);

    // Mendapatkan data dari sesi sebelumnya
    $postData = session('post_data', []);

    // Menggabungkan data sesi sebelumnya dengan data baru
    $postData = array_merge($postData, $validatedData);

    // Memasukkan kembali data ke dalam sesi
    $request->session()->put('post_data', $postData);

    // dd(session('post_data'));
    return redirect()->route('create-item-deposits');
  }

  public function createItemDeposits() {
    return view('items.create.item-deposits');
  }
  
  public function storeItemDeposits(Request $request) {
    $postData = session('post_data');

    $request->validate([
      'fileUpload' => 'required_without_all:linkFileUpload|file',
      'linkFileUpload' => 'required_without_all:fileUpload',
      'image' => 'sometimes|required_without_all:linkImage|image',
      'linkImage' => 'sometimes|required_without_all:image',
    ]);

    $file_path = null;
    $image_path = null;
    // Simpan file di dalam folder storage/app/public/uploads
    if ($request->hasFile('fileUpload')) {      
      $file_path = $request->file('fileUpload')->store('public/fileUploads');
    }
    
    // Simpan gambar di dalam folder storage/app/public/images
    if ($request->hasFile('image')) {      
      $image_path = $request->file('image')->store('public/images');
    }

    $deposit = Deposit::create([
      'title' => $postData['title'],
      'slug' => Str::slug(Str::lower($postData['title']), '-'),
      'file_upload' => $file_path,
      'link_file_upload' => $request->input('linkFileUpload'),
      'image' => $image_path,
      'link_image' => $request->input('linkImage'),
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
      'user_upload' => auth()->user()->email,
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
    $deposit->authors()->attach($authorIds);

    // // Inisialisasi array untuk menyimpan ID penulis
    $keywordIds = [];    

    // Loop through each author in the form data
    foreach ($postData['keyword'] as $index => $keyword) {
      // Create or find the author based on first name and last name
      $keyword = Keyword::firstOrCreate([
          'name' => $keyword,          
      ]);

      // Add the author's ID to the array
      $keywordIds[] = $keyword->id;
    }

    // Lampirkan penulis-penulis ke buku yang baru dibuat
    $deposit->keywords()->attach($keywordIds);

    $category = Category::firstOrCreate(['slug' => $postData['categories']]);
    $deposit->categories()->associate($category)->save();

    $itemType = ItemType::firstOrCreate(['name' => $postData['itemTypes']]);
    $deposit->item_types()->associate($itemType)->save();

    $language = Language::firstOrCreate(['name' => $postData['languages']]);
    $deposit->languages()->associate($language)->save();

    $dataType = DataType::firstOrCreate(['name' => $postData['dataTypes']]);
    $deposit->data_types()->associate($dataType)->save();

    $refereed = Refereed::firstOrCreate(['name' => $postData['refereeds']]);
    $deposit->refereeds()->associate($refereed)->save();

    $status = Status::firstOrCreate(['name' => $postData['statuses']]);
    $deposit->statuses()->associate($status)->save();

    return redirect('/dashboard/manage-deposit');
  }

    /**
     * Display the specified resource.
     */
    // public function show($deposit)
    // {
    //   $deposit = Deposit::where('slug', $deposit)->firstOrFail();
      
    //   return view('dashboard.detail', ['post' => $deposit]);
    // }

    /**
     * Show the form for editing the specified resource.
     */
    

    /**
     * Update the specified resource in storage.
     */
    public function editItemSubmissionCenter($deposit) {
      $itemTypes = ItemType::all();
      $languages = Language::all();
      $dataTypes = DataType::all();
      $refereeds = Refereed::all();
      $statuses = Status::all();    
  
      $deposit = Deposit::where('slug', $deposit)->firstOrFail();
      
      return view('items.update.item-submission-center', [
        'itemTypes' => $itemTypes,
        'languages' => $languages,      
        'dataTypes' => $dataTypes,
        'refereeds' => $refereeds,
        'statuses' => $statuses,  
        'post' => $deposit,
      ]);
    }
  
    public function updateItemSubmissionCenter(Request $request, $deposit) {    
    
      $validatedData = $request->validate([
        'itemTypes' => 'required',            
        'languages' => 'required',
        'title' => 'required|max:255',        
        'abstract' => 'required',
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
        'emailDepositor' => 'sometimes|max:255',
        'reference' => 'sometimes|max:255',
      ]);        
  
      $request->session()->put('post_data', $validatedData);
      // dd(session('post_data'));
      return redirect()->route('edit-item-keywords', ['deposit' => $deposit]);
    }
  
    public function editItemKeywords($deposit) {
      $categories = Category::all();

      $deposit = Deposit::where('slug', $deposit)->firstOrFail();
  
      return view('items.update.item-keywords', [
        'categories' => $categories,
        'post' => $deposit,
      ]);
    }
  
    public function updateItemKeywords(Request $request, $deposit) {
      // Validasi data termasuk category
      $validatedData = $request->validate([
        'categories' => 'required',
        'keyword' => 'required|array',
        // ... (aturan validasi lainnya)
      ]);
  
      // Mendapatkan data dari sesi sebelumnya
      $postData = session('post_data', []);
  
      // Menggabungkan data sesi sebelumnya dengan data baru
      $postData = array_merge($postData, $validatedData);
  
      // Memasukkan kembali data ke dalam sesi
      $request->session()->put('post_data', $postData);
  
      // dd(session('post_data'));
      return redirect()->route('edit-item-deposits', ['deposit' => $deposit]);    
    }
  
    public function editItemDeposits($deposit) {
      
      $deposit = Deposit::where('slug', $deposit)->firstOrFail();

      return view('items.update.item-deposits',['post' => $deposit]);
    }
    
    public function updateItemDeposits(Request $request, $deposit) {
      $postData = session('post_data');
      
      
      $request->validate([
        'fileUpload' => 'sometimes|required_without_all:linkFileUpload|file',
        'linkFileUpload' => 'sometimes|required_without_all:fileUpload',
        'image' => 'sometimes|required_without_all:linkImage|image',
        'linkImage' => 'sometimes|required_without_all:image',
      ]);

      $deposit = Deposit::where('slug', $deposit)->firstOrFail();
  
      // Hapus file lama jika ada file baru yang diunggah
      if ($request->hasFile('fileUpload')) {
        // Pastikan file_upload memiliki nilai sebelum menghapus file lama
        if ($deposit->file_upload) {
            Storage::delete($deposit->file_upload);
        }
        $file_path = $request->file('fileUpload')->store('public/fileUploads');
        $deposit->file_upload = $file_path;
      }

      // Hapus gambar lama jika ada gambar baru yang diunggah
      if ($request->hasFile('image')) {
        if ($deposit->image) {
            Storage::delete($deposit->image);
        }
        $image_path = $request->file('image')->store('public/images');
        $deposit->image = $image_path;
     }


      $deposit->update([
        'title' => $postData['title'],
        'slug' => Str::slug(Str::lower($postData['title']), '-'),        
        'abstract' => $postData['abstract'],
        'link_file_upload' => $request->input('linkFileUpload'),      
        'link_image' => $request->input('linkImage'),
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
  
      // Inisialisasi array untuk menyimpan ID penulis
$authorIds = [];

// Loop through each author in the form data
foreach ($postData['firstName'] as $index => $firstName) {
    // Temukan penulis berdasarkan first name dan last name
    $author = Author::where('firstName', $firstName)
                    ->where('lastName', $postData['lastName'][$index])
                    ->where('email', $postData['email'][$index])
                    ->where('authorCompany', $postData['authorCompany'][$index])
                    ->first();

    // Jika penulis tidak ditemukan, buat penulis baru
    if (!$author) {
        $author = Author::create([
            'firstName' => $firstName,
            'lastName' => $postData['lastName'][$index],
            'email' => $postData['email'][$index],
            'authorCompany' => $postData['authorCompany'][$index],
        ]);
    }

    // Add the author's ID to the array
    $authorIds[] = $author->id;
    }

      // Update penulis-penulis pada buku yang sudah ada
      $deposit->authors()->sync($authorIds);

      // Inisialisasi array untuk menyimpan ID kata kunci
$keywordIds = [];

// Loop through each keyword in the form data
foreach ($postData['keyword'] as $index => $keyword) {
    // Temukan kata kunci berdasarkan nama kata kunci
    $existingKeyword = Keyword::where('name', $keyword)->first();

    // Jika kata kunci tidak ditemukan, buat kata kunci baru
    if (!$existingKeyword) {
        // Mungkin Anda perlu memikirkan cara untuk menangani kategori, berikut adalah contoh sederhana
        $category = $postData['categories'][$index];
        
        $newKeyword = Keyword::create([
            'name' => $keyword,
            // 'category' => $category,
        ]);

        $keywordIds[] = $newKeyword->id;
    } else {
        // Jika kata kunci sudah ada, tambahkan ID kata kunci yang sudah ada
        $keywordIds[] = $existingKeyword->id;
    }
}

      // Update keterkaitan kata kunci pada buku yang sudah ada
      $deposit->keywords()->sync($keywordIds);

      // all table
  
      // Kategori
      $category = Category::firstOrCreate(['slug' => $postData['categories']]);
      $deposit->categories()->associate($category);
      
      // Jenis Item
      $itemType = ItemType::firstOrCreate(['name' => $postData['itemTypes']]);
      $deposit->item_types()->associate($itemType);
      
      // Bahasa
      $language = Language::firstOrCreate(['name' => $postData['languages']]);
      $deposit->languages()->associate($language);

      // Jenis Data
      $dataType = DataType::firstOrCreate(['name' => $postData['dataTypes']]);
      $deposit->data_types()->associate($dataType);

      // Refereed
      $refereed = Refereed::firstOrCreate(['name' => $postData['refereeds']]);
      $deposit->refereeds()->associate($refereed);

      // Status
      $status = Status::firstOrCreate(['name' => $postData['statuses']]);
      $deposit->statuses()->associate($status);

      $deposit->save();

  
      return redirect()->route('manage-deposit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {               
      $deposit = Deposit::where('slug', $slug)->firstOrFail();      
      
      $delete = Deposit::find($deposit->id);
      
      $delete->authors()->detach();      
      $delete->keywords()->detach();
      $delete->authors()->delete();
      $delete->keywords()->delete();
      $delete->delete();

      return redirect('/dashboard/manage-deposit');
    }

    public function show($slug) {
      $post = Deposit::where('slug', $slug)->first();
  
      return view('items.detail.detail', [
        'title' => "Single Post",
        'post' => $post,
      ]);
    }
}
