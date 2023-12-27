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
    $searchSubjects = $request->input('category');

    $posts = Publish::latest()
      ->searchByTitle($searchTitle)
      ->searchByAuthor($searchAuthor)
      ->searchByYear($searchYear)
      ->searchBySubjects($searchSubjects)
      ->paginate(10);

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

    // Lakukan logika untuk mengirimkan file ke pengguna
    $response = response()->download($file_path, "{$filename}.{$file_extension}");

    // Jika unduhan berhasil, lakukan peningkatan download_count
    if ($response->getStatusCode() == 200) {        
        if (auth()->check()) {
          $item->increment('download_count');
          auth()->user()->increment('download_count');
        }
    }

    // Kembalikan response
    return $response;
}


}
