<?php

namespace App\Models;

// use App\Models\Collection;
// use App\Models\Review;
use App\Models\Deposit;
use App\Models\Publish;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    use HasFactory;

    protected $guarded = [];
    
  // public function collections() {
  //   return $this->belongsToMany(Collection::class);
  // }

  // public function reviews() {
  //   return $this->belongsToMany(Review::class);    
  // }

  public function deposits() {
    return $this->belongsToMany(Deposit::class);    
  }

  public function publishes() {
    return $this->belongsToMany(Publish::class);    
  }
}
