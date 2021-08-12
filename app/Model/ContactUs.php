<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactUs extends Model
{
    use SoftDeletes;

    // nama table di SQL
    protected $table = 'contact_us';

    protected $fillable = [
        'id', 'name', 'phone', 'email', 'description'
    ];

    protected $hidden = [];
}
