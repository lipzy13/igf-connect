<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    //
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;
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
        'country',
        'status',
        'user_id',
    ];

    public function keyproductline()
    {
        return $this->hasMany(KeyProductLine::class);
    }

    public function bizmatch()
    {
        return $this->hasMany(BizMatch::class);
    }

    public function preferred_platform()
    {
        return $this->hasMany(PreferredPlatform::class);
    }
}
