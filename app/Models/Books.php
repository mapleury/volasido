<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    
    protected $fillable = [
        'title',
        'author',
        'publisher',
        'year',
        'stock',
        'cover',
        'category_id'
    ];

    //koneksi ke model kategory
    public function category() {
        return $this->belongsTo(Category::class);
    }
}
