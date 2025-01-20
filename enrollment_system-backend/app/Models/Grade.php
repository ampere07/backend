<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $table = 'grades';
    protected $primaryKey = 'grades_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'checklist_id',
        'final_grade',
        'professor_id',
    ];

    public function checklist()
    {
        return $this->belongsTo(ChecklistTable::class, 'checklist_id', 'checklist_id');
    }

    public function professor()
    {
        return $this->belongsTo(Professor::class, 'professor_id', 'prof_id');
    }
}



