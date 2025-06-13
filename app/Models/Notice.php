<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notice extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title',
        'title_en',
        'slug',
        'file_path',
        'notice_category_id',
    ];

    public function noticeCategory()
    {
        return $this->belongsTo(NoticeCategory::class);
    }
}
