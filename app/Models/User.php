<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'permission',
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
        'password' => 'hashed',
    ];

    /**
     * Get the working hours for the user.
     */
    public function workingHours()
    {
        return $this->hasMany(WorkingHours::class);
    }
    
    /**
     * Check if user is admin.
     */
    public function isAdmin()
    {
        return $this->permission  & (1<< 1) == (1<< 1);
    }
    
    /**
     * Check if user is super admin.
     */
    public function isSuperAdmin()
    {
        return $this->permission & (1<< 2) == (1<< 2);
    }
}
