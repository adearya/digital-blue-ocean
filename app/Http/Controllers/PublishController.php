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

use Illuminate\Http\Request;

class PublishController extends Controller
{
  public function indexReview() {
    $collections = Deposit::with('authors')->get();
    return view('admin.review', compact('collections'));      
  }

  // Dashboard
  public function index(Request $request) {

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

  public function store(Request $request) {
    $postData = session('post_data');

    $fileUpload = Deposit::get('file_upload');
    $image = Deposit::get('image');

    $deposit = Publish::create([
      'title' => $postData['title'],
      'slug' => $postData['slug'],
      'file_upload' => $fileUpload->first()->file_upload,
      'image' => $image->first()->image,
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
    $deposit->authors()->attach($authorIds);

    $keywordIds = [];    

    // Loop through each author in the form data
    foreach ($postData['keyword'] as $index => $keyword) {
      // Create or find the author based on first name and last name
      $keyword = Keyword::firstOrCreate([
          'keyword' => $keyword,          
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

    // Hapus data dari session setelah digunakan
    $request->session()->forget('post_data');

    return redirect()->route('dashboard');
  }
}
