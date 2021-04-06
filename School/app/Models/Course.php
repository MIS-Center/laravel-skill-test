<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Coursetype;
use App\Models\Campus;

class Course extends Model
{
    use HasFactory;
    protected $fillable = array('name', 'campus_id', 'coursetype_id','price');
    protected $guarded = array('id');

    public function campus()
    {
        return $this->belongsTo(Campus::class);
    }

    public function coursetypes()
    {
        return $this->belongsToMany(Coursetype::class,
        'course_coursetype',
        'course_id',
        'coursetype_id');
    }

}

