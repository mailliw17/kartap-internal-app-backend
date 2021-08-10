<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EventMember extends Model
{
    // nama table di SQL
    protected $table = 'event_member';

    protected $fillable = [
        'id',
        'name',
        'phone',
        'email',
        'address',
        'description'
    ];

    protected $hidden = [];
}
