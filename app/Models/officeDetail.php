<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class officeDetail extends Model
{
    protected $fillable = [
        'title',
        'title_en',
        'description',
        'description_en',
    ];

    protected $table = 'office_details';

    public function getDescriptionAttribute($value)
    {
        return $value ?: '';
    }

    public function getDescriptionEnAttribute($value)
    {
        return $value ?: '';
    }


}
