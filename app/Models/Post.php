<?php

namespace App\Models;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $with = ['category', 'author'];
    protected $fillable = ['views_count'];
    
    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function author() {
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
}
