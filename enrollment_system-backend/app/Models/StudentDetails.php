<?php

// app/Models/StudentDetails.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'student_number', 'first_name', 'last_name', 'middle_name', 'age', 'phone', 'address', 'email', 'course', 'year_level','semester', 'sex', 'birthdate', 'guardian_name', 'guardian_phone', 'student_status', 'enrollment_status','section',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}


