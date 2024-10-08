<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

        // Nonaktifkan autoincrementing
        public $incrementing = false;

        // Set primary key type ke string
        protected $keyType = 'string';

        // Override boot function untuk men-generate UUID secara otomatis
        protected static function boot()
        {
            parent::boot();

            static::creating(function ($model) {
                if (!$model->getKey()) {
                    $model->{$model->getKeyName()} = (string) Str::uuid(); // generate UUID
                }
            });
        }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'id_sso',
        'password',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
