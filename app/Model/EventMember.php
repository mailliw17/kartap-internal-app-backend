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

    public function registeredevent()
    {
        return $this->hasMany('App\Model\RegisteredEvent');
    }
}
