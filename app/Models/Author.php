<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = ['name', 'bio']; // لا نحتاج id و created_at و updated_at هنا

    public function books() {
        return $this->hasMany(Book::class);
    }
}


