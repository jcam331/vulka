<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    /** @use HasFactory<\Database\Factories\SubscriptionFactory> */
    use HasFactory;

    protected $fillable = [
        'business_id',
        'stripe_customer_id',
        'stripe_subscription_id',
        'status',
        'price',
        'start_date',
        'end_date',
    ];

    /**
     * Get the user who is subscribed to the service.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<\App\Models\User>
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the business associated with the subscription.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<\App\Models\Business>
     */
    public function business(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Business::class);
    }
}
