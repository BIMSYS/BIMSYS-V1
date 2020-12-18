<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'module_number', 'module_title', 'module_material', 'module_file', 'module_video'
    ];

    public function lesson()
    {
        return $this->belongsTo('App\Models\Lesson');
    }
}
