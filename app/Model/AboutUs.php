<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AboutUs extends Model
{
    use SoftDeletes;

    // nama table di SQL
    protected $table = 'about_us';

    protected $fillable = [
        'id', 'our_history', 'our_mission', 'our_vision', 'lang'
    ];

    protected $hidden = [];
}
