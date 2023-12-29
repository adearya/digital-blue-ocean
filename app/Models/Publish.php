<?php

namespace App\Models;

use App\Models\Author;
use App\Models\Category;
use App\Models\DataType;
use App\Models\ItemType;
use App\Models\Keyword;
use App\Models\Language;
use App\Models\PageRange;
use App\Models\Refered;
use App\Models\Status;
use App\Models\User;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publish extends Model
{
    use HasFactory;

    protected $guarded = [];
    
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
                $query->where('firstName', 'like', '%' . $searchAuthor . '%')
                ->orWhere('lastName', 'like', '%' . $searchAuthor . '%');
            });
        });
    }

    public function scopeSearchByYear($query, $searchYear)
    {
        return $query->when($searchYear, function ($query, $searchYear) {
            return $query->where('year', 'like', '%' . $searchYear . '%');
        });
    }

    public function scopeSearchByKeyword($query, $searchKeyword)
    {
        return $query->when($searchKeyword, function ($query, $searchKeyword) {
            return $query->whereHas('keywords', function ($query) use ($searchKeyword) {
                $query->where('name', 'like', '%' . $searchKeyword . '%');
            });
        });
    }

    public function scopeSearchByStatus($query, $searchStatus)
    {
        return $query->when($searchStatus, function ($query, $searchStatus) {
            return $query->whereHas('statuses', function ($query) use ($searchStatus) {
                $query->where('name', 'like', '%' . $searchStatus . '%');
            });
        });
    }

    public function scopeSearchByPublication($query, $searchPublication)
    {
        return $query->when($searchPublication, function ($query, $searchPublication) {
            return $query->where('journal_or_publication_title', 'like', '%' . $searchPublication . '%');
        });
    }
}
