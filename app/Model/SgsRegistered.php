<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SgsRegistered extends Model
{  
    use SoftDeletes;
    // nama table di SQL
    protected $table = 'sgs_registered';

    protected $fillable = [
        'id',
        'id_peserta_1',
        'id_peserta_2',
        'total_payment',
        'status',
        'date_paid' 
    ];

    protected $hidden = [];
}
