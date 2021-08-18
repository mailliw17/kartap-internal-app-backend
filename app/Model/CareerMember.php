<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CareerMember extends Model
{
    use SoftDeletes;
    // nama table di SQL
    protected $table = 'career_member';

    protected $fillable = [
        'id',
        'idCareer',
        'name',
        'email',
        'cv_or_resume',
        'linkedin',
        'socialMedia',
        'status'
    ];

    protected $hidden = [];
}