<?php

namespace App\Models;

use App\Models\Collection;
use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
  public function collections() {
      return $this->belongsToMany(Collection::class);
  }

  public function review() {
    return $this->hasMany(Review::class);
  }
}
