<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class My_favorite_book extends Model
{
    /** @use HasFactory<\Database\Factories\MyFavoriteBooksFactory> */
    use HasFactory;
    protected $fillable = ['book_id','user_id'];
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function book(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}
