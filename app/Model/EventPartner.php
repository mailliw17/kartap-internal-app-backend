<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventPartner extends Model
{
    use SoftDeletes;
    // nama table di SQL
    protected $table = 'event_partner';

    protected $fillable = [
        'idEvent',
        'idPartner'
    ];

    protected $hidden = [];
}
