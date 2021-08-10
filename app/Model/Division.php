<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    // nama table di SQL
    protected $table = 'division';

    protected $fillable = [
        'id',
        'idDepartment'
    ];

    protected $hidden = [];
}
