<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Career extends Model
{
    use SoftDeletes;

    // nama table di SQL 
    protected $table = 'career';

    protected $fillable = [
        'id',
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
