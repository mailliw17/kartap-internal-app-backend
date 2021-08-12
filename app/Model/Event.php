<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;
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
