<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RecordType extends Model
{
    use SoftDeletes;
// (e.g., "Legal Document", "Other")
    protected $fillable = [
        'title',
        'title_en',
        'slug'
    ];

    public function categories()
    {
        return $this->hasMany(RecordCategory::class);
    }

    public function records()
    {
        return $this->hasMany(Record::class);
    }
}
