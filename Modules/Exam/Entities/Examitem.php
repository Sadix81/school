<?php

namespace Modules\Exam\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Question\Entities\question;

class Examitem extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_id',
        'item_id'
    ];


    public function questions()
    {
        return $this->belongsTo(question::class);
    }
}
