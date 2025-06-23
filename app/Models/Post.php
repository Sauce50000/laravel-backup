<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'title_en',
        'is_unique',
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }   
    
}
