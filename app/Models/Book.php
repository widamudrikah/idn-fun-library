<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
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

    // koneksi/relasi ke model Category
    public function category() {
        return $this->BelongsTo(Category::class);
    }
}
