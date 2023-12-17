<?php

namespace App\Models;

use App\Models\Collection;
use App\Models\Review;
use App\Models\Deposit;
use App\Models\Publish;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    // public function collections() {
    //     return $this->hasMany(Collection::class);
    // }

    // public function reviews() {
    //   return $this->hasMany(Review::class);
    // }

    public function deposits() {
      return $this->hasMany(Deposit::class);    
    }
  
    public function publishes() {
      return $this->hasMany(Publish::class);    
    }
}
