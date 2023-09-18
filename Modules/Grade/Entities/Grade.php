<?php

namespace Modules\Grade\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Course\Entities\Course;
use Modules\Exam\Entities\Exam;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = [
        'title'
    ];

    public function exams()
    {
        return$this->hasMany(Exam::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
