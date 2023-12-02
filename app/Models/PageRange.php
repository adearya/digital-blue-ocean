<?php

namespace App\Models;

use App\Models\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageRange extends Model
{
    use HasFactory;
    public function collection() {
      return $this->hasMany(Collection::class);
    }
}
