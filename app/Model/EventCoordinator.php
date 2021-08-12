<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventCoordinator extends Model
{
    use SoftDeletes;
    // nama table di SQL
    protected $table = 'event_coordinator';

    protected $fillable = [
        'idEvent',
        'idUser',
    ];

    protected $hidden = [];
}
