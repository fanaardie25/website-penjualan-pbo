<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public $guarded = [];

    
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_books')
                    ->withPivot('quantity', 'status', 'created_at')
                    ->withTimestamps();
    }

    public function types(){
        return $this->belongsToMany(Type::class, 'type_books');
    }
}
