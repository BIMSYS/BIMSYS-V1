<?php

namespace App\Models;

use App\Models\Grade;
use App\Models\Module;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id', 'lesson_name', 'lesson_code','lesson_enroll', 'lesson_description'
    ];

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function modules()
    {
        return $this->hasMany(Module::class);
    }

    public function grade()
    {
        return $this->hasOne(Grade::class);
    }
}
