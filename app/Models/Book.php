<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /** @use HasFactory<\Database\Factories\BooksFactory> */
    use HasFactory;
    protected  $fillable = ['name','path','rate','cover_Img','category_book_id','writer','description','status'];

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
    return $this->belongsTo(Category_book::class);
    }
    public function my_books(){
    return $this->hasMany(My_book::class);
    }

    public function my_favorite_books()
    {
        return $this->hasMany(My_favorite_book::class);
    }

//    public function favoritedByUser()
//    {
//        return $this->belongsToMany(User::class, 'my_favorite_books');
//    }
//    public function finishedByUser()
//    {
//        return $this->belongsToMany(User::class, 'my_finished_books');
//    }public function myBooks()
//    {
//        return $this->belongsToMany(User::class, 'my_books');
//    }
}
