<?php

namespace Modules\Parents\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Modules\Otp\Entities\Otp;
use Modules\Profile\Entities\Profile;
use Modules\Student\Entities\Student;

class Parents extends Model
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'mobile',
        'username',
    ];

    public function otps()
    {
        return $this->morphMany(Otp::class , 'otptable');
    }

    public function profiles()
    {
        return $this->morphMany(Profile::class , 'profileable');
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
