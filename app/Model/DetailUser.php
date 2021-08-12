<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailUser extends Model
{
    use SoftDeletes;
    // nama table di SQL
    protected $table = 'detail_user';

    protected $fillable = [
        'id',
        'idUser',
        'idDepartment',
        'name',
        'address',
        'dateOfBirth',
        'photo',
        'linkedin',
        'position',
        'status'
    ];

    protected $hidden = [];
}
