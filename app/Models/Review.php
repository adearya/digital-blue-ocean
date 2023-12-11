<?php

namespace App\Models;

use App\Models\Collection;
use App\Models\Category;
use App\Models\Author;
use App\Models\Keyword;
use App\Models\ItemType;
use App\Models\Language;
use App\Models\DataType;
use App\Models\Refereed;
use App\Models\Status;
use App\Models\PageRange;
// use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
  use HasFactory;

  
  protected $guarded = ['id'];

  public function authors() {
    return $this->belongsToMany(Author::class);
  }

  public function keywords() {
    return $this->belongsToMany(Keyword::class);
}

  public function categories() {
    return $this->belongsTo(Category::class);
  }

  public function item_types() {
    return $this->belongsTo(User::class);
  }

  public function languages() {
    return $this->belongsTo(Language::class);
  }
  
  public function data_types() {
    return $this->belongsTo(DataType::class);
  }

  public function refereeds() {
    return $this->belongsTo(Refereed::class);
  }

  public function statuses() {
    return $this->belongsTo(Status::class);
  }

  public function page_ranges() {
    return $this->belongsTo(PageRange::class);
  }

  public function scopeSearchByTitle($query, $searchTitle)
  {
      return $query->when($searchTitle, function ($query, $searchTitle) {
          return $query->where('title', 'like', '%' . $searchTitle . '%');
      });
  }

  public function scopeSearchByAuthor($query, $searchAuthor)
  {
      return $query->when($searchAuthor, function ($query, $searchAuthor) {
          return $query->whereHas('authors', function ($query) use ($searchAuthor) {
              $query->where('firstName', 'like', '%' . $searchAuthor . '%');
          });
      });
  }

  public function scopeSearchByYear($query, $searchYear)
  {
      return $query->when($searchYear, function ($query, $searchYear) {
          return $query->where('year', 'like', '%' . $searchYear . '%');
      });
  }

  public function scopeSearchBySubjects($query, $searchSubjects)
  {
      return $query->when($searchSubjects, function ($query, $searchSubjects) {
          return $query->whereHas('keywords', function ($query) use ($searchSubjects) {
              $query->where('keyword', 'like', '%' . $searchSubjects . '%');
          });
      });
  }

  // public function sluggable(): array
  // {
  //     return [
  //         'slug' => [
  //             'source' => 'title'
  //         ]
  //     ];
  // }
}
