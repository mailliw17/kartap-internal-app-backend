<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;
    // nama table di SQL
    protected $table = 'role';

    protected $fillable = [
        'id',
        'name',
        'idDepartment',
    ];

    protected $hidden = [];

    public function users()
    {
        return $this->hasMany('App\Model\Auth');
    }
}
