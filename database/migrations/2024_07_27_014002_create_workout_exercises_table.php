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
        Schema::create('workout_exercises', function (Blueprint $table) {
            $table->unsignedBigInteger("workout_id");
            $table->unsignedBigInteger("exercise_id");
            $table->timestamps();

            $table->foreign('workout_id')->references('id')->on("workout");
            $table->foreign('exercise_id')->references('id')->on("exercises");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workout_exercises');
    }
};
