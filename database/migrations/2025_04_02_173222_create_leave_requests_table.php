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
        Schema::create('leave_requests', function (Blueprint $table) {
            $table->id();
            // Pole dla identyfikatora użytkownika składającego wniosek
            $table->unsignedBigInteger('user_id');

            // Pole dla daty rozpoczęcia urlopu
            $table->date('start_date');

            // Pole dla daty zakończenia urlopu
            $table->date('end_date');

            // Pole dla typu urlopu (np. wypoczynkowy, chorobowy)
            $table->string('leave_type');

            // Pole dla statusu wniosku (np. 0 - oczekujący, 1 - zatwierdzony, -1 - odrzucony)
            $table->integer('status')->default('0');

            // Pole dla dodatkowych uwag do wniosku
            $table->text('remarks')->nullable();

            // Dodanie klucza obcego dla user_id
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_requests');
    }
};
