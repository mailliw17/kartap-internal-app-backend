<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Division extends Model
{
    use SoftDeletes;
    // nama table di SQL
    protected $table = 'division';

    protected $fillable = [
        'id',
        'name'
    ];

    protected $hidden = [];

    public function department()
    {
        return $this->hasMany('App\Model\Department');
    }
}
