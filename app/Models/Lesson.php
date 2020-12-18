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
        'lesson_name', 'lesson_code', 'lesson_description'
    ];

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
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
