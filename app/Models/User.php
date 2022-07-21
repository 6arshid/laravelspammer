<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'verify',
        'username',
        'family',
        'about',
        'mobile',
        'avatar',
        'instagram',
        'facebook',
        'telegram',
        'whatsapp',
        'twitter',
        'linkedin',
        'github',
        'address',
        'public_emai',
        'tronwallet',
        'paypal',
        'others',
        'url',
        'job',
        'color',
        'suspend',
        'is_admin',
        'social_id',
        'social_type',
        'verify',
        'bio',
        'uniqid',
        'pv',
        'first_register_ip',
        'metamask_login_wallet'
        
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
