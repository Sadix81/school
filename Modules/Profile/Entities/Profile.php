<?php

namespace Modules\Profile\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'last_name',
//        'profile_id',
//        'profile_type'
    ];

    public function profileable()
    {
        return $this->morphTo();
    }
}
