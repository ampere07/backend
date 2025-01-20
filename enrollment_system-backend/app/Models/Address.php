<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = ['student_id','house_number', 'street', 'subdivision', 'barangay', 'municipality', 'zip_code'];
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

}
