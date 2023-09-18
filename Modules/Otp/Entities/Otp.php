<?php

namespace Modules\Otp\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Student\Entities\Student;
use Modules\Teacher\Entities\Teacher;

class Otp extends Model
{
    use HasFactory;

    protected $fillable = [
        'otptable_id',
        'otptable_type',
        'code',
    ];

    public function otptable()
    {
        $this->morphTo();
    }
}
