<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSubjects extends Model
{
    use HasFactory;

    protected $table = 'student_subjects';

    protected $fillable = [
        'user_id',
        'subject_1',
        'subject_2',
        'subject_3',
        'subject_4',
        'subject_5',
        'subject_6',
        'subject_7',
        'subject_8',
        'subject_9',
        'subject_10',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subject1()
    {
        return $this->belongsTo(Curriculum::class, 'subject_1', 'course_code');
    }

    public function subject2()
    {
        return $this->belongsTo(Curriculum::class, 'subject_2', 'course_code');
    }

    public function subject3()
    {
        return $this->belongsTo(Curriculum::class, 'subject_3', 'course_code');
    }

    public function subject4()
    {
        return $this->belongsTo(Curriculum::class, 'subject_4', 'course_code');
    }

    public function subject5()
    {
        return $this->belongsTo(Curriculum::class, 'subject_5', 'course_code');
    }

    public function subject6()
    {
        return $this->belongsTo(Curriculum::class, 'subject_6', 'course_code');
    }

    public function subject7()
    {
        return $this->belongsTo(Curriculum::class, 'subject_7', 'course_code');
    }

    public function subject8()
    {
        return $this->belongsTo(Curriculum::class, 'subject_8', 'course_code');
    }

    public function subject9()
    {
        return $this->belongsTo(Curriculum::class, 'subject_9', 'course_code');
    }

    public function subject10()
    {
        return $this->belongsTo(Curriculum::class, 'subject_10', 'course_code');
    }
}
