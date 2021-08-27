<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use SoftDeletes;
    // nama table di SQL
    protected $table = 'department';

    protected $fillable = [
        'id',
        'name',
        'division_id'
    ];

    protected $hidden = [];

    public function division()
    {
        return $this->belongsTo('App\Model\Division');
    }

    public function detailuser()
    {
        return $this->hasOne('App\DetailUser');
    }
}
