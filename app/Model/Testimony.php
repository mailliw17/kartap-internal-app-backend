<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimony extends Model
{
    use SoftDeletes;
    // nama table di SQL
    protected $table = 'testimony';

    protected $fillable = [
        'id',
        'idEventMember',
        'event_id',
        'testimony',
        'feedback',
        'status'
    ];

    protected $hidden = [];

    public function event()
    {
        return $this->belongsTo('App\Model\Event');
    }
}
