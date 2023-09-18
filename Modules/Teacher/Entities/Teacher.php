<?php

namespace Modules\Teacher\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Modules\Otp\Entities\Otp;
use Modules\Profile\Entities\Profile;

class Teacher extends Model
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'mobile',
        'username',
    ];

    public function Otps()
    {
        return $this->morphMany(Otp::class,'otptable');
    }


    public function profiles()
    {
        return $this->morphMany(Profile::class , 'profileable');
    }

}
