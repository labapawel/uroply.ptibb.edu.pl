<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('working_hours', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->tinyInteger('day_of_week'); // 1-7 (poniedziałek - niedziela)
            $table->time('start_time'); // Godzina rozpoczęcia pracy
            $table->time('end_time'); // Godzina zakończenia pracy
            $table->timestamps();
            
            // Dodajmy ograniczenie na godziny
            $table->check('start_time >= "06:00:00" AND end_time <= "22:00:00"');
            $table->check('start_time < end_time');
            
            // Unikalny dzień tygodnia dla danego użytkownika
            $table->unique(['user_id', 'day_of_week']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('working_hours');
    }
};
