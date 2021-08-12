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
        'idDepartment'
    ];

    protected $hidden = [];
}
