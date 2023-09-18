<?php

namespace Modules\Question\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Gallery\Entities\Gallery;

class Questionitem extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'correct_answer',
        'gallery_id',
        'question_id',
    ];


    public function galleries()
    {
        return $this->morphMany(Gallery::class , 'galleryable');
    }


    public function questions()
    {
        return $this->belongsTo(question::class);
    }




}
