<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    // nama table di SQL 
    protected $table = 'career';

    protected $fillable = [
        'idDepartment',
        'requestNumber',
        'position',
        'jobDescription',
        'requirement',
        'description',
        'applyUrl',
        'vacancies',
        'period',
        'status'
    ];



    protected $hidden = [];
}
