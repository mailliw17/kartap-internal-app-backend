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
        'name'
    ];

    protected $hidden = [];
}
