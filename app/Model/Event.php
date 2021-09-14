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
        'subtitle_first',
        'subtitle_second'
    ];

    protected $hidden = [];

    public function testimony()
    {
        return $this->hasMany('App\Model\Testimony');
    }

    public function eventmember()
    {
        return $this->belongsToMany('App\Model\EventMember');
    }

    public function partner()
    {
        return $this->belongsToMany('App\Model\Partner');
    }

    public function users()
    {
        return $this->belongsToMany('App\Model\Auth');
    }
}
