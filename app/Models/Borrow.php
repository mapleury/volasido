<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    protected $fillable = [
        'book_id',
        'user_id',
        'borrowed_at',
        'returned_at',
        'status'
    ];

    //koneksi ke books & category
    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function book() {
        return $this->belongsTo(Books::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }

}
