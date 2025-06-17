<?php

namespace App\Helpers;

use App\Models\NoticeCategory;
use App\Models\RecordCategory;

class NoticeHelper
{
    public static function getNoticeCategories()
    {
        return NoticeCategory::orderBy('title')->get(); // or use `orderBy('title')`
    }

    public static function getRecordCategoriesForLegalDocuments()
    {
        return RecordCategory::whereHas('records', function ($query) {
            $query->where('record_type_id', 1); // 1 = legal documents (or whatever ID it is)
        })->get();
    }
}
