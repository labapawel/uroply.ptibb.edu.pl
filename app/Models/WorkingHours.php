<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkingHours extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'day',
        'hour',
      
    ];

  

    /**
     * Get the user that owns the working hours.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
