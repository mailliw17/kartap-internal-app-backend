<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CareerMember extends Model
{
    // nama table di SQL
    protected $table = 'career_member';

    protected $fillable = [
        'id',
        'idCareer',
        'name',
        'email',
        'cv/resume',
        'linkedin',
        'socialMedia'
    ];

    protected $hidden = [];
}
