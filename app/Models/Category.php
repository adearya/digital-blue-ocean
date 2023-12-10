<?php

namespace App\Models;

use App\Models\Collection;
use App\Models\Review;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function collections() {
        return $this->hasMany(Collection::class);
    }

    public function reviews() {
      return $this->hasMany(Review::class);
    }
}
