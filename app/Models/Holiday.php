<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    use HasFactory;
    /**
     * Atrybuty, które można masowo przypisać.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'start_date',
        'end_date',
        'holiday_type_id',
        'status',
        'reason',
        // Dodaj tutaj inne potrzebne atrybuty
    ];

    /**
     * Atrybuty, które powinny być rzutowane.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];
    
    /**
     * Ustaw identyfikator użytkownika zatwierdzającego i zaktualizuj znacznik czasu zatwierdzenia.
     *
     * @param  int|null  $userId
     * @return void
     */
    public function setApprovedByAttribute($userId)
    {
        $this->attributes['approved_by'] = $userId;
        // Zakładając, że 'approved_at' to kolumna przechowująca znacznik czasu zatwierdzenia
        $this->attributes['approved_at'] = $userId ? now() : null;
    }
    

    /**
     * Pobierz użytkownika, który zatwierdził wniosek urlopowy.
     */
    public function approvedBy()
    {
        // Zakładając, że 'approved_by_user_id' to kolumna klucza obcego w tabeli holidays
        return $this->belongsTo(User::class, 'approved_by_user_id');
    }

    /**
     * Pobierz użytkownika, który jest właścicielem wniosku urlopowego.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Pobierz typ urlopu.
     */
    public function holidayType()
    {
        return $this->belongsTo(HolidayType::class);
    }
}
