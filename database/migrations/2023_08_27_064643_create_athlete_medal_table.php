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
        Schema::create('athlete_medal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('athlete_id')->references('id')->on('athletes')->cascadeOnDelete();
            $table->foreignId('medal_id')->references('id')->on('medals')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('athlete_medal');
    }
};
