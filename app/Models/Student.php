<?php

namespace App\Models;

use App\Models\User;
use App\Models\Grade;
use App\Models\Lesson;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'student_fullname', 'student_class', 'student_image'
    ];

    public function lessons()
    {
        return $this->belongsToMany(Lesson::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function grade()
    {
        return $this->hasOne(Grade::class);
    }
}
