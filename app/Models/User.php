<?php

    namespace App\Models;

    // use Illuminate\Contracts\Auth\MustVerifyEmail;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Illuminate\Notifications\Notifiable;

    class User extends Authenticatable
    {
        /** @use HasFactory<\Database\Factories\UserFactory> */
        use HasFactory, Notifiable;

        /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
        protected $fillable = [
            'name',
            'email',
            'password',
            'role',
            'profile_details',
            'phone',
            'preferred_language',
            'avatar',
            'phone',
            'avatar'
        ];

        /**
         * The attributes that should be hidden for serialization.
         *
         * @var array<int, string>
         */
        protected $hidden = [
            'password',
            'remember_token',
        ];

        /**
         * Los detalles del usuario se almacenan como un array en la base de datos
         * y se obtiene como un JSON
         */
        protected $casts = [
            'profile_details' => 'array'
        ];


        /**
         * Get the attributes that should be cast.
         *
         * @return array<string, string>
         */
        protected function casts(): array
        {
            return [
                'email_verified_at' => 'datetime',
                'password' => 'hashed',
            ];
        }

        // Relations with Business model
        public function businesses(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
        {
            return $this->belongsToMany(Business::class, 'business_user')
                ->withPivot('role')
                ->withTimestamps();
        }

        /**
         * The requests that belong to the User
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasMany<\App\Models\Request>
         */
        public function requests(): \Illuminate\Database\Eloquent\Relations\HasMany
        {
            return $this->hasMany(Request::class);
        }

        /**
         * The responses that belong to the User
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasMany<\App\Models\Response>
         */
        public function responses(): \Illuminate\Database\Eloquent\Relations\HasMany
        {
            return $this->hasMany(Response::class);
        }

        /**
         * The reviews that belong to the User
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasMany<\App\Models\Review>
         */
        public function reviews(): \Illuminate\Database\Eloquent\Relations\HasMany
        {
            return $this->hasMany(Review::class);
        }

        /**
         * The subscriptions that belong to the User
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasMany<\App\Models\Subscription>
         */
        public function subscriptions(): \Illuminate\Database\Eloquent\Relations\HasMany
        {
            return $this->hasMany(Subscription::class);
        }

    }
