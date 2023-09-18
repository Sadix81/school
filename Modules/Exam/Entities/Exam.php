<?php

namespace Modules\Exam\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Course\Entities\Course;
use Modules\Grade\Entities\Grade;
use Modules\Student\Entities\Student;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'garde_id',
        'course_id',
        'courses',
        'level',
        'count',
        'time',
    ];

    public function students()
    {
        return $this->belongsTo(Student::class);
    }


    public function grades()
    {
        return $this->belongsTo(Grade::class);
    }

    public function courses()
    {
        return $this->belongsTo(Course::class);
    }

}
