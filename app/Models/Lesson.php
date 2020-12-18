<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'lesson_name', 'lesson_code', 'lesson_description'
    ];

    public function students()
    {
        return $this->belongsToMany('App\Models\Student');
    }

    public function teachers()
    {
        return $this->belongsToMany('App\Models\Teacher');
    }

    public function modules()
    {
        return $this->hasMany('App\Models\Module');
    }
}
