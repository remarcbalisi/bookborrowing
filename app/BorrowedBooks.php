<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BorrowedBooks extends Model
{
    protected $table = 'borrowed_books';

    protected $fillable = [
        'user_id', 'books_id', 'fine', 'is_returned'
    ];

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function book(){
        return $this->belongsTo('App\Books', 'books_id');
    }
}
