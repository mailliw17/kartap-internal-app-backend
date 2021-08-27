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
        'event_id',
        'user_id',
    ];

    protected $hidden = [];

    // public function auth()
    // {
    //     return $this->belongsTo('App\Model\Auth');
    // }

    // public function event()
    // {
    //     return $this->belongsTo('App\Model\Event');
    // }
}
