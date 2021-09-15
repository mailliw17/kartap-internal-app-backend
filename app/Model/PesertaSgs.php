<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PesertaSgs extends Model
{
    use SoftDeletes;
    // nama table di SQL
    protected $table = 'peserta_sgs';

    protected $fillable = [
        'id',
        'nama',
        'phone',
        'email',
        'alamat',
        'universitas', 
        'jurusan',
        'DOB'
    ];

    protected $hidden = [];
}
