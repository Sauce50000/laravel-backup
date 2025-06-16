<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notice extends Model
{
    use SoftDeletes;

    protected $dates = [
        'published_date',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'title',
        'title_en',
        'slug',
        'published_date',
        'publisher',
        'file_path',
        'notice_category_id',
    ];

    public function noticeCategory(): BelongsTo
    {
        // return $this->belongsTo(NoticeCategory::class);
        return $this->belongsTo(NoticeCategory::class, 'notice_category_id');
    }

    public function getFileUrlAttribute()
    {
        return $this->file_path ? asset('storage/' . $this->file_path) : null;
    }
}
