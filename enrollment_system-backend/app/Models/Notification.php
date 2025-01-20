<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'student_id',
        'message',
        'type',
        'created_at',
        'read',  
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}


