<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public $guarded = [];

    public function books(){
        return $this->belongsToMany(Book::class, 'type_books');
    }
}
