<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Book extends Model {
    protected $fillable = ['title', 'category_id', 'author_id', 'published_at']; // لا نحتاج id و created_at و updated_at هنا

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function author() {
        return $this->belongsTo(Author::class);
    }

    public function borrowings() {
        return $this->hasMany(Borrowing::class);
    }
}
