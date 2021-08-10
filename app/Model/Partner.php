<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
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
}
