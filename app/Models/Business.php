<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    /** @use HasFactory<\Database\Factories\BusinessFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'address',
        'city',
        'state',
        'country',
        'postal_code',
        'lat',
        'lng',
        'is_active',
        'description',
        'business_details' // website, etc
    ];

    // related to User model
    public function user()
    {
        return $this->belongsToMany(User::class, 'business_user')
            ->withPivot('role')
            ->withTimestamps();
    }

    /**
     * Get the services associated with the business.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<\App\Models\Service>
     */
    public function services(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Service::class);
    }

    /**
     * Get the requests associated with the business.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<\App\Models\Request>
     */
    public function requests(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Request::class);
    }

    /**
     * Get the reviews associated with the business.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<\App\Models\Review>
     */
    public function reviews(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Get the subscriptions associated with the business.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<\App\Models\Subscription>
     */
    public function subscriptions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Subscription::class);
    }

};

