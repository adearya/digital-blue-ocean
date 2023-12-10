<?php

namespace App\Models;

use App\Models\Review;
use App\Models\Author;
use App\Models\Keyword;
use App\Models\Category;
use App\Models\User;
use App\Models\ItemType;
use App\Models\Language;
use App\Models\DataType;
use App\Models\Refered;
use App\Models\Status;
use App\Models\PageRange;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Cviebrock\EloquentSluggable\Sluggable;


class Collection extends Model
{
    use HasFactory;

    // protected $with = ['category', 'author'];
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
      return $this->belongsTo(ItemType::class);
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
                $query->where('name', 'like', '%' . $searchAuthor . '%');
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
            return $query->whereHas('category', function ($query) use ($searchSubjects) {
                $query->where('name', 'like', '%' . $searchSubjects . '%');
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
