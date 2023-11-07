<?php

namespace App\Models;

USE App\Models\Collections;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    public function collections() {
        return $this->hasMany(Collections::class);
    }
}
