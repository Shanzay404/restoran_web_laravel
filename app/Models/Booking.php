<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'username',
        'email',
        'date_and_time',
        'no_of_people',
        'special_request',
        'status',
    ];
}
