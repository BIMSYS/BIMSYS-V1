<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    public $fillable = [
        'grade'
    ];

    public function student()
    {
        return $this->hasOne('App\Models\Student');
    }

    public function teacher()
    {
        return $this->hasOne('App\Models\Teacher');
    }

    public function lesson()
    {
        return $this->hasOne('App\Models\Lesson');
    }
}
