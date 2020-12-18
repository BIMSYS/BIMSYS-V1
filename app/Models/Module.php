<?php

namespace App\Models;

use App\Models\Lesson;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'module_number', 'module_title', 'module_material', 'module_file', 'module_video'
    ];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
