<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventMember extends Model
{
    use SoftDeletes;
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

    public function event()
    {
        return $this->belongsToMany('App\Model\Event');
    }

    public function testimony()
    {
        return $this->hasOne('App\Testimony');
    }
}
