<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RecordCategory extends Model
{
    use SoftDeletes;
    // (e.g., "Act", "Regulation", "Document")
    protected $fillable = [
        'title',
        'title_en',
        'slug',
        'record_type_id'
    ];

    public function type()
    {
        return $this->belongsTo(RecordType::class, 'record_type_id');
    }

    public function records()
    {
        return $this->hasMany(Record::class);
    }
}
