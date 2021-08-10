<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    // nama table di SQL
    protected $table = 'department';

    protected $fillable = [
        'id',
        'name'
    ];

    protected $hidden = [];
}
