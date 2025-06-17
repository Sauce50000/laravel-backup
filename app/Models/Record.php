<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Record extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title',
        'title_en',
        'slug',
        'file_path',
        'record_type_id',
        'record_category_id',
        'publisher',
        'published_date',
    ];

    public function type()
    {
        return $this->belongsTo(RecordType::class, 'record_type_id');
    }

    public function category()
    {
        return $this->belongsTo(RecordCategory::class, 'record_category_id');
    }

    public function getFileUrlAttribute()
    {
        return $this->file_path ? asset('storage/' . $this->file_path) : null;
    }
}
