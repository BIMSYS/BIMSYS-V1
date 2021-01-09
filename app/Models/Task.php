<?php

namespace App\Models;

use App\Models\Grade;
use App\Models\Module;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'module_id', 'task_title', 'task_file', 'task_link', ' task_due', 'task_date'
    ];

    public function module()
    {
        return $this->hasOne(Module::class);
    }

    public function grade()
    {
        return $this->hasOne(Grade::class);
    }
}
