<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimony extends Model
{
    use SoftDeletes;
    // nama table di SQL
    protected $table = 'testimony';

    protected $fillable = [
        'id',
        'idEventMember',
        'idEvent',
        'testimony',
        'feedback',
        'status'
    ];

    protected $hidden = [];
}
