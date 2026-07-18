<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // یه دسته بندی چند تا کتاب داره (One to Many)
    public function books(){
        return $this->hasMany(Book::class);
    }
}
