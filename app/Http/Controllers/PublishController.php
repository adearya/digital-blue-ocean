<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Deposit;
use App\Models\Publish;
use App\Models\Keyword;
use App\Models\Category;
use App\Models\ItemType;
use App\Models\Language;
use App\Models\DataType;
use App\Models\Refereed;
use App\Models\Status;
use App\Models\PageRange;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PublishController extends Controller
{
  public function indexReview() {
    $collections = Deposit::latest()->paginate(10);
    return view('authorization.editor.review', compact('collections'));      
  }

  // Dashboard
  public function index(Request $request) {
    $itemTypes = ItemType::whereIn('name', ['Article', 'Book', 'Thesis'])->get();

    $articleCount = Publish::where('item_types_id', $itemTypes->where('name', 'Article')->first()->id)->count();
    $bookCount = Publish::where('item_types_id', $itemTypes->where('name', 'Book')->first()->id)->count();
    $thesisCount = Publish::where('item_types_id', $itemTypes->where('name', 'Thesis')->first()->id)->count();

    $searchTitle = $request->input('title');
    $searchAuthor = $request->input('author');
    $searchYear = $request->input('year');
    $searchKeyword = $request->input('keyword');

    $searchStatus = $request->input('status');
    $searchPublication = $request->input('publication');
    
    

    $sortOption = $request->input('sort', 'recent');

    if ($sortOption == 'oldest') {
        $posts = Publish::oldest('created_at')->paginate(10);
    } else {
      $posts = Publish::latest()
      ->searchByTitle($searchTitle)
      ->searchByAuthor($searchAuthor)
      ->searchByYear($searchYear)
      ->searchByKeyword($searchKeyword)
      ->searchByStatus($searchStatus)
      ->searchByPublication($searchPublication)
      ->paginate(10);
    }
      
    return view('dashboard.index', [
      'title' => "All Post",
      'posts' => $posts,
      'articleCount' => $articleCount,
      'bookCount' => $bookCount,
      'thesisCount' => $thesisCount,
    ]);
  }

  // Detail Page
  public function show($slug) {
    $post = Publish::where('slug', $slug)->first();

    if ($post) {
      $post->increment('views_count');
    }

    return view('dashboard.detail', [
      'title' => "Single Post",
      'post' => $post,
    ]);
  }

  public function store(Request $request, $slug) {
    // $postData = session('post_data');
    $item = Deposit::where('slug', $slug)->firstOrFail();

    $fileUpload = Deposit::get('file_upload');
    $image = Deposit::get('image');

    $deposit = Publish::create([
      'title' => $item->title,
      'slug' => $item->slug,
      'file_upload' => $fileUpload->first()->file_upload,
      'link_file_upload' => $request->input('linkFileUpload'),
      'image' => $image->first()->image,
      'link_image' => $request->input('linkImage'),
      'abstract' => $item->abstract,
      'journal_or_publication_title' => $item->journal_or_publication_title,
      'issn' => $item->issn,
      'publisher' => $item->publisher,
      'official_url' => $item->official_url,
      'volume' => $item->volume,
      'number' => $item->number,
      'from_page' => $item->from_page,
      'to_page' => $item->to_page,
      'year' => $item->year,
      'month' => $item->month,
      'day' => $item->day,
      'email_depositor' => $item->email_depositor,
      'reference' => $item->reference,
    ]);

    // // Inisialisasi array untuk menyimpan ID penulis
    $authorIds = [];    

    // Loop through each author in the form data
    foreach ($item->authors->pluck('firstName')->toArray() as $index => $firstName) {
      // Create or find the author based on first name and last name
      $author = Author::firstOrCreate([
          'firstName' => $firstName,
          'lastName' => $item->authors->pluck('lastName')->toArray() [$index],
          'email' => $item->authors->pluck('email')->toArray() [$index],
          'authorCompany' => $item->authors->pluck('authorCompany')->toArray() [$index],
      ]);

      // Add the author's ID to the array
      $authorIds[] = $author->id;
    }

    // Lampirkan penulis-penulis ke buku yang baru dibuat
    $deposit->authors()->attach($authorIds);

    $keywordIds = [];    

    // Loop through each author in the form data
    foreach ($item->keywords->pluck('name')->toArray() as $index => $keyword) {
      // Create or find the author based on first name and last name
      $keyword = Keyword::firstOrCreate([
          'name' => $keyword,          
      ]);

      // Add the author's ID to the array
      $keywordIds[] = $keyword->id;
    }

    // Lampirkan penulis-penulis ke buku yang baru dibuat
    $deposit->keywords()->attach($keywordIds);

    $category = Category::firstOrCreate(['name' => $item->categories->name , 'slug' => $item->categories->slug]);
    $deposit->categories()->associate($category)->save();

    $itemType = ItemType::firstOrCreate(['name' => $item->item_types->name]);
    $deposit->item_types()->associate($itemType)->save();

    $language = Language::firstOrCreate(['name' => $item->languages->name]);
    $deposit->languages()->associate($language)->save();

    $dataType = DataType::firstOrCreate(['name' => $item->data_types->name]);
    $deposit->data_types()->associate($dataType)->save();

    $refereed = Refereed::firstOrCreate(['name' => $item->refereeds->name]);
    $deposit->refereeds()->associate($refereed)->save();

    $status = Status::firstOrCreate(['name' => $item->statuses->name]);
    $deposit->statuses()->associate($status)->save();
    
    // hapus
    $deposit = Deposit::where('slug', $item->slug)->firstOrFail();      
      
    $delete = Deposit::find($deposit->id);
      
    $delete->authors()->detach();      
    $delete->keywords()->detach();
    $delete->authors()->delete();
    $delete->keywords()->delete();
    $delete->delete();

    // Hapus data dari session setelah digunakan
    $request->session()->forget('post_data');

    return redirect()->route('dashboard');
  }

  public function downloadFile($filename) {
    $item = Publish::where('slug', $filename)->first();
  
    $file_name = basename($item->file_upload);
    $file_path = storage_path("app/public/fileUploads/{$file_name}");    
    $file_extension = pathinfo($file_path, PATHINFO_EXTENSION);

    if (auth()->check()) {
      $item->increment('download_count');
      auth()->user()->increment('download_count');
    }
    
    // Lakukan logika untuk mengirimkan file ke pengguna
    $response = response()->download($file_path, "{$filename}.{$file_extension}");
      
    

    // Kembalikan response
    return $response;
}
public function destroy($slug) {               
  $publish = Publish::where('slug', $slug)->firstOrFail();      
  
  $delete = Publish::find($publish->id);
  
  $delete->authors()->detach();      
  $delete->keywords()->detach();
  $delete->authors()->delete();
  $delete->keywords()->delete();
  $delete->delete();

  return redirect()->route('dashboard');
}

public function editItemSubmissionCenter($deposit) {
  $itemTypes = ItemType::all();
  $languages = Language::all();
  $dataTypes = DataType::all();
  $refereeds = Refereed::all();
  $statuses = Status::all();    

  $deposit = Publish::where('slug', $deposit)->firstOrFail();
  
  return view('authorization.admin.update.item-submission-center', [
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
  return redirect()->route('edit-item-keywords-dashboard', ['deposit' => $deposit]);
}

public function editItemKeywords($deposit) {
  $categories = Category::all();

  $deposit = Publish::where('slug', $deposit)->firstOrFail();

  return view('authorization.admin.update.item-keywords', [
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
  return redirect()->route('edit-item-deposits-dashboard', ['deposit' => $deposit]);    
}

public function editItemDeposits($deposit) {
  
  $deposit = Publish::where('slug', $deposit)->firstOrFail();

  return view('authorization.admin.update.item-deposits',['post' => $deposit]);
}

public function updateItemDeposits(Request $request, $deposit) {
  $postData = session('post_data');
  
  
  $request->validate([
    'fileUpload' => 'sometimes|required_without_all:linkFileUpload|file',
    'linkFileUpload' => 'sometimes|required_without_all:fileUpload',
    'image' => 'sometimes|required_without_all:linkImage|image',
    'linkImage' => 'sometimes|required_without_all:image',
  ]);

  $deposit = Publish::where('slug', $deposit)->firstOrFail();

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


  return redirect()->route('dashboard');
}


}
