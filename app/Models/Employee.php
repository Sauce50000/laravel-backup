<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'name_en',
        'email',
        'phone',
        'post_id',
        'department_id',
        'branch_id',
        'image_path',
        'is_active',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class,'branch_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function getImageUrlAttribute()
    {
        return $this->image_path ? asset('storage/' . $this->image_path) : null;
    }

    // public function scopeActive($query)
    // {
    //     return $query->where('is_active', true);
    // }
}
