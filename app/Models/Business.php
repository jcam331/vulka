<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    /** @use HasFactory<\Database\Factories\BusinessFactory> */
    use HasFactory;

    protected $fillable = [
        name,
        phone,
        email,
        address,
        city,
        state,
        country,
        postal_code,
        lat,
        lng,
        is_active,
        description,
        business_details
    ];

    // related to User model
    public function user()
    {
        return $this->belongsToMany(User::class, 'business_user')
            ->withPivot('role')
            ->withTimestamps();
    }

};
//        'website',

