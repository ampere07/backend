<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSocFee extends Model
{
    use HasFactory;

    protected $table = 'students_soc_fees'; // Ensure the table name is correct

    protected $fillable = [
        'student_name', 'student_number', 'year_level', 'section', 'course',
        'soc_fee_first_year', 'soc_fee_second_year', 'soc_fee_third_year', 'soc_fee_fourth_year'
    ];
}

