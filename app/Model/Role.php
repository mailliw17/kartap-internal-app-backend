<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // nama table di SQL
    protected $table = 'role';

    protected $fillable = [
        'id',
        'idDepartment',
    ];

    protected $hidden = [];
}
