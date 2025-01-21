<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    use HasFactory;

    protected $table = 'curriculum';
    protected $primaryKey = 'course_code';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'course_code',
        'course_title',
        'credit_unit_lab',
        'credit_unit_lec',
        'contact_hours_lab',
        'contact_hours_lec',
        'prerequisite',
        'program',
        'year',
        'semester',
    ];

    public function studentSubjects()
{
    return $this->hasMany(StudentSubjects::class, 'course_code', 'subject_1')
                ->orWhere('course_code', 'subject_2')
                ->orWhere('course_code', 'subject_3')
                ->orWhere('course_code', 'subject_4')
                ->orWhere('course_code', 'subject_5')
                ->orWhere('course_code', 'subject_6')
                ->orWhere('course_code', 'subject_7')
                ->orWhere('course_code', 'subject_8')
                ->orWhere('course_code', 'subject_9')
                ->orWhere('course_code', 'subject_10');
}

}
