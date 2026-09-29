<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;



    class Category extends Model {
    protected $fillable = ['name']; // لا نحتاج id و created_at و updated_at هنا

    public function books() {
        return $this->hasMany(Book::class);
    }
}


