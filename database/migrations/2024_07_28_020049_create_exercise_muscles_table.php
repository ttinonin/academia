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
        Schema::create('exercise_muscles', function (Blueprint $table) {
            $table->unsignedBigInteger("exercise_id");
            $table->unsignedBigInteger("muscle_id");
            $table->timestamps();

            $table->foreign('muscle_id')->references('id')->on("muscles");
            $table->foreign('exercise_id')->references('id')->on("exercises");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exercise_muscles');
    }
};
