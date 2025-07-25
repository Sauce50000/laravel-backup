<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model
{
    use SoftDeletes;

    protected $fillable =   [
        'title',
        'title_en',
        'slug',
    ];

    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }
}
