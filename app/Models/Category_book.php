<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category_book extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryBooksFactory> */
    use HasFactory;
    protected $fillable = ['category_Name'];
    public function books(){
        return $this->hasMany(Book::class);
    }
}
