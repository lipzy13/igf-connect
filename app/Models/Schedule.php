<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'id',
        'name_table',
        'date',
        'time_start',
        'time_end',
    ];
}
