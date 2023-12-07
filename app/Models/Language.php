<?php

namespace App\Models;

use App\Models\Review;
use App\Models\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function collection() {
      return $this->hasMany(Collection::class);
  }

  public function review() {
    return $this->hasMany(Review::class);
  }
}
