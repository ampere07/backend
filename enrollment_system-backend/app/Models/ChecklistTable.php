<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChecklistTable extends Model
{
    use HasFactory;

    protected $table = 'checklist_table';
    protected $primaryKey = 'checklist_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'usersId',
        'course_code',
        'semester',
        'year',
    ];

    public function grades()
    {
        return $this->hasMany(Grade::class, 'checklist_id', 'checklist_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'usersId', 'id');
    }

    public function curriculum()
    {
        return $this->belongsTo(Curriculum::class, 'course_code', 'course_code');
    }
}


