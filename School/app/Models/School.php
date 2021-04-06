<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Campus;

class School extends Model
{
    use HasFactory;

    protected $fillable = array('name', 'email', 'logo','website');
    protected $guarded = array('id');

    public function campuses()
    {
        return $this->hasMany(Campus::class);
    }

}
