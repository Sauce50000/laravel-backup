<?php

namespace App\Helpers;

use App\Models\NoticeCategory;

class NoticeHelper
{
    public static function getNoticeCategories()
    {
        return NoticeCategory::orderBy('title')->get(); // or use `orderBy('title')`
    }
}
 