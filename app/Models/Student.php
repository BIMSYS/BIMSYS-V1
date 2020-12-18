<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_fullname', 'student_class', 'student_image'
    ];

    public function lessons()
    {
        return $this->belongsToMany('App\Models\Lesson');
    }

    public function user()
    {
        return $this->hasOne('App\Models\User');
    }

    public function grade()
    {
        return $this->hasOne('App\Models\Grade');
    }
}