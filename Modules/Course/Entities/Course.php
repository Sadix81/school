<?php

namespace Modules\Course\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Gallery\Entities\Gallery;
use Modules\Grade\Entities\Grade;
use Modules\Question\Entities\question;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'grade_id',
        'title',
    ];


    public function galleries(){

        return $this->morphMany(Gallery::class , 'galleryable');
    }

    public function questions()
    {
        return $this->hasMany(question::class);
    }


    public function grades()
    {
        return $this->belongsTo(Grade::class);
    }

    public function exams()
    {
        return $this->hasMany(Course::class);
    }
}
