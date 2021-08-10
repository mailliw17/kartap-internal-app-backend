<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RegistedEvent extends Model
{
    // nama table di SQL
    protected $table = 'registered_event';

    protected $fillable = [
        'idEvent',
        'idEventMember',
        'dateRegistered'
    ];

    protected $hidden = [];
}
