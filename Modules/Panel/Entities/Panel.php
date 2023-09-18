<?php

namespace Modules\Panel\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Panel extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'price',
    ];

    public function Purchases()
    {
        return $this->hasMany(Purchase::class);
    }
}
