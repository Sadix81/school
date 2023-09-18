<?php

namespace Modules\Panel\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Student\Entities\Student;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'panel_id',
        'student_id',
        'start',
        'end',
    ];

    public function students()
    {
        return $this->belongsTo(Student::class);
    }

    public function panels()
    {
        return $this->belongsTo(Panel::class);
    }

}
