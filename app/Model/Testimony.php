<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Testimony extends Model
{
    // nama table di SQL
    protected $table = 'testimony';

    protected $fillable = [
        'id',
        'idEventMember',
        'idEvent',
        'testimony',
        'feedback',
        'status'
    ];

    protected $hidden = [];
}
