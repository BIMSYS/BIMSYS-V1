<?php

namespace App\Models;

use App\Models\Task;
use App\Models\Lesson;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'lesson_id', 'module_title', 'module_description', 'module_file', 'module_link'
    ];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function task()
    {
        return $this->hasOne(Task::class);
    }
}
