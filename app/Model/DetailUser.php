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
        'user_id',
        'department_id',
        'name',
        'address',
        'dateOfBirth',
        'photo',
        'linkedin',
        'position',
        'status'
    ];

    protected $hidden = [];

    public function user()
    {
        return $this->belongsTo('App\Auth');
    }

    public function department()
    {
        return $this->belongsTo('App\Department');
    }
}
