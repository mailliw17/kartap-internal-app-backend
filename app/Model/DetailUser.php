<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DetailUser extends Model
{
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
