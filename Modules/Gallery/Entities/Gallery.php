<?php

namespace Modules\Gallery\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Question\Entities\question;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_path',
//        'image_type',
//        'image_id'
    ];

    public function galleryable()
    {
        $this->morphTo();
    }


}
