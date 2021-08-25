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
        'event_id',
        'event_member_id',
        'dateRegistered'
    ];

    protected $hidden = [];

    public function event()
    {
        return $this->belongsTo('App\Model\Event');
    }

    public function eventmember()
    {
        return $this->belongsTo('App\Model\EventMember');
    }
}
