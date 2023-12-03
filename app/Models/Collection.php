<?php

namespace App\Models;

use App\Models\Category;
use App\Models\User;
use App\Models\ItemType;
use App\Models\Language;
use App\Models\DataType;
use App\Models\Status;
use App\Models\PageRange;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Collection extends Model
{
    use HasFactory, Sluggable;

    protected $with = ['category', 'author'];
    protected $fillable = ['views_count', 'title'];
    
    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function item_type() {
      return $this->belongsTo(User::class, 'user_id');
    }

    public function language() {
      return $this->belongsTo(User::class, 'user_id');
    }
    
    public function data_type() {
      return $this->belongsTo(User::class, 'user_id');
    }

    public function status() {
      return $this->belongsTo(User::class, 'user_id');
    }

    public function page_range() {
      return $this->belongsTo(User::class, 'user_id');
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
            return $query->whereHas('author', function ($query) use ($searchAuthor) {
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

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

}
