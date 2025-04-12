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
        Schema::create('holiday_types', function (Blueprint $table) {
            $table->id();
            // Typ urlopu (np. wypoczynkowy, na żądanie, okolicznościowy)
            $table->string('name')->comment('Typ urlopu');
            // Opcjonalny komentarz do typu urlopu
            $table->text('comments')->nullable()->comment('Komentarz do typu urlopu');
            $table->timestamps();
        });
        
        Schema::create('holidays', function (Blueprint $table) {
            $table->id();
            // Klucz obcy łączący z tabelą użytkowników
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->comment('ID użytkownika');
            // Data rozpoczęcia urlopu
            $table->date('start_date')->comment('Data rozpoczęcia urlopu');
            // Data zakończenia urlopu
            $table->date('end_date')->comment('Data zakończenia urlopu');
            // Liczba godzin urlopu (może być np. 4 dla pół dnia)
            $table->unsignedInteger('hours')->comment('Liczba godzin urlopu');
            // Rodzaj urlopu (np. wypoczynkowy, na żądanie, okolicznościowy)
            $table->foreignId('holiday_type_id')->constrained()->onDelete('restrict')->comment('Rodzaj urlopu (ID typu urlopu)');
            // Opcjonalny komentarz do wniosku urlopowego
            $table->text('comments')->nullable()->comment('Komentarz do urlopu');
            // ID przełożonego akceptującego wniosek
            $table->foreignId('approved_by')->nullable()->constrained('users')->onDelete('set null')->comment('ID przełożonego akceptującego');
            // Data i czas akceptacji wniosku
            $table->timestamp('approved_at')->nullable()->comment('Data akceptacji');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('holiday_types');
        Schema::dropIfExists('holidays');
    }
};
