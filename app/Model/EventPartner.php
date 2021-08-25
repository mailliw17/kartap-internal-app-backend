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
        'event_id',
        'partner_id'
    ];

    protected $hidden = [];

    public function partner()
    {
        return $this->belongsTo('App\Model\Partner');
    }

    public function event()
    {
        return $this->belongsTo('App\Model\Event');
    }
}
