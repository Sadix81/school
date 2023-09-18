<?php

namespace Modules\Student\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Modules\Exam\Entities\Exam;
use Modules\Otp\Entities\Otp;
use Modules\Panel\Entities\Purchase;
use Modules\Parents\Entities\Parents;
use Modules\Profile\Entities\Profile;

class Student  extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'mobile',
        'username',
    ];

    public function otps()
    {
        return $this->morphMany(Otp::class,'otptable');
    }

    public function profiles()
    {
        return $this->morphMany(Profile::class , 'profileable');
    }

    public function parents()
    {
        return $this->belongsTo(Parents::class);
    }


    public function Purchases()
    {
        return $this->hasMany(Purchase::class);
    }

    public function exams()
    {
        return $this->hasMany(Exam::class);
    }

}
