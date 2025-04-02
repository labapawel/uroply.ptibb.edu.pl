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
        Schema::create('days_offs', function (Blueprint $table) {
            $table->id();
            
            
            // Data dnia wolnego
            $table->date('date')->unique();
            
            // Opcjonalny powód dnia wolnego
            $table->string('fact')->nullable();
            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('days_offs');
    }
};
