<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    // nama table di SQL
    protected $table = 'about_us';

    protected $fillable = [
        'our_history', 'our_mission', 'our_vision', 'lang'
    ];

    protected $hidden = [];
}
