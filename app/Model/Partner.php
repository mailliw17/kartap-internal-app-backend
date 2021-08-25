<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partner extends Model
{
    use SoftDeletes;
    // nama table di SQL
    protected $table = 'partner';

    protected $fillable = [
        'id',
        'name',
        'description',
        'startDate',
        'endDate',
        'status'
    ];

    protected $hidden = [];

    public function eventpartner()
    {
        return $this->hasMany('App\Model\EventPartner');
    }
}
