<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;

    protected $table = 'professor';
    protected $primaryKey = 'prof_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'prof_name',
    ];

    public function grades()
    {
        return $this->hasMany(Grade::class, 'professor_id', 'prof_id');
    }

    public function checklists()
    {
        return $this->hasMany(ChecklistTable::class, 'professor_id', 'prof_id');
    }
}

