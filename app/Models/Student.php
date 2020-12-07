<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'user_id',
        'nama_lengkap'
    ];

    public function user() {
        return $this->hasOne('App\User');
    }
}
