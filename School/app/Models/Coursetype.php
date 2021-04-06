<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

class Coursetype extends Model
{
    use HasFactory;

    public function courses()
    {
        return $this->belongsToMany(Course::class,
        'course_coursetype',
        'coursetype_id',
        'course_id');
    }
}
