<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    // nama table di SQL
    protected $table = 'event';

    protected $fillable = [
        'id',
        'title',
        'subTitle',
        'description',
        'registrationUrl',
        'status',
        'image',
    ];

    protected $hidden = [];
}
