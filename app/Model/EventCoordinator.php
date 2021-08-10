<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EventCoordinator extends Model
{
    // nama table di SQL
    protected $table = 'event_coordinator';

    protected $fillable = [
        'idEvent',
        'idUser',
    ];

    protected $hidden = [];
}
