<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'company_name',
        'representative_name',
        'address',
        'company_logo',
        'about_us',
        'company_type',
        'key_product_line',
        'country',
        'status',
    ];


}
