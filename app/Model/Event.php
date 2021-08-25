<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;
    // nama table di SQL
    protected $table = 'event';

    protected $fillable = [
        'id',
        'title',
        'subTitle',
        'description',
        'registrationUrl',
        'status',
        'image',
    ];

    protected $hidden = [];

    public function testimony()
    {
        return $this->hasMany('App\Model\Testimony');
    }

    public function eventpartner()
    {
        return $this->hasMany('App\Model\EventPartner');
    }

    public function registeredevent()
    {
        return $this->hasMany('App\Model\RegisteredEvent');
    }

    public function eventcoordinator()
    {
        return $this->hasMany('App\Model\EventCoordinator');
    }
}
