<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    // nama table di SQL
    protected $table = 'career';

    protected $fillable = [
        'id_career', 'position', 'department', 'job_desc', 'req'
    ];

    protected $hidden = [];
}
