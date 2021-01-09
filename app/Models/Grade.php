<?php

namespace App\Models;

use App\Models\Task;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Grade extends Model
{
    use HasFactory;

    public $fillable = [
        'teacher_id', 'student_id', 'lesson_id', 'grade'
    ];

    public function student()
    {
        return $this->hasOne(Student::class);
    }

    public function teacher()
    {
        return $this->hasOne(Teacher::class);
    }

    public function task()
    {
        return $this->hasOne(Task::class);
    }
}
