<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegisteredEvent extends Model
{
    use SoftDeletes;
    // nama table di SQL
    protected $table = 'registered_event';

    protected $fillable = [
        'idEvent',
        'idEventMember',
        'dateRegistered'
    ];

    protected $hidden = [];
}
