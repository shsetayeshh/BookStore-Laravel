<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    // هر کتاب متعلق به یه دسته بندیه
public function category()
{
    return $this->belongsTo(Category::class);
}

protected $fillable = [
    'title', 'description', 'price', 'image', 'category_id', 'author'
];
}
