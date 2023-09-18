<?php

namespace Modules\Question\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Course\Entities\Course;
use Modules\Exam\Entities\Examitem;
use Modules\Gallery\Entities\Gallery;

class question extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'status',
        'level',
        'course_id',
        'gallery_id',
    ];

    public function galleries()
    {
        return $this->morphMany(Gallery::class , 'galleryable');
    }

    public function courses(){
        return $this->belongsTo(Course::class);
    }

    public function questionitems()
    {
        return $this->hasMany(Questionitem::class);
    }

    public function examitems()
    {
        return $this->hasMany(Examitem::class);
    }
}
