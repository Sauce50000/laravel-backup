<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Photo extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'photo_gallery_id',
        'title',
        'image_path',
    ];

    public function photoGallery()
    {
        return $this->belongsTo(PhotoGallery::class, 'photo_gallery_id');
    }
}
