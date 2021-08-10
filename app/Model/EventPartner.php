<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EventPartner extends Model
{
    // nama table di SQL
    protected $table = 'event_partner';

    protected $fillable = [
        'idEvent',
        'idPartner'
    ];

    protected $hidden = [];
}
