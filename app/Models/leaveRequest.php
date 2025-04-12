<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class leaveRequest extends Model
{
    use HasFactory;
    protected $table = 'leave_requests';

    protected $fillable = [
        'user_id',
        'start_date',
        'end_date',
        'leave_type',
        'status',
        'remarks',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
