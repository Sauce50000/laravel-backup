<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhotoGallery extends Model
{

    // boot();
    use SoftDeletes;

    protected $fillable = [
        'album_title',
        'album_title_en',

    ];

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
    
    public function latestPhoto()
    {
        return $this->hasOne(Photo::class)->latestOfMany();
    }


}
