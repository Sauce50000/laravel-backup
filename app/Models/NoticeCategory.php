<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class NoticeCategory extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'title',
        'title_en',
        'slug',
    ];
    public function notices(): HasMany
    {
        return $this->hasMany(Notice::class);
    }
}
