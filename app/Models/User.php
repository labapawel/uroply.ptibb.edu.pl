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
        return $this->hasMany(WorkingHours::class,'user_id', 'id');
    }
    
    /**
     * Check if user has a specific permission
     * 
     * @param int $permission
     * @return bool
     */
    public function hasPermission($permission)
    {
        return ($this->permission & $permission) === $permission;
    }

    /**
     * Check if user is a regular user
     * 
     * @return bool
     */
    public function isUser()
    {
        return $this->hasPermission(1) || $this->isAdmin();
    }

    /**
     * Check if user is an admin
     * 
     * @return bool
     */
    public function isAdmin()
    {
        return $this->hasPermission(2) || $this->hasPermission(4);
    }


    public function getCalendarAttribute()
    {
        // dd($this);
        $calendar = $this->workingHours()->get()->map(function ($item) {
            return [
                'day' => $item->day,
                'hour' => $item->hour,
            ];
        })->toArray();
        return json_encode($calendar, true);
    }

    /**
     * Set the working hours for the user.
     * 
     * @param array $workingHours
     * @return void
     */
    public function setCalendarAttribute(array $workingHours)
    {  
        // dd($workingHours);
        $this->workingHours()->delete();
        if( count($workingHours) != 0) {
          
            $this->workingHours()->createMany($workingHours);
        }
}

    /**
     * Check if user is a superadmin
     * 
     * @return bool
     */
    public function isSuperAdmin()
    {
        // dd($this);
        return $this->hasPermission(4);
    }
}
