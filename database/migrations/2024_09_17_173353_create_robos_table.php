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
        Schema::create('robos', function (Blueprint $table) {
            $table->id();
            $table->integer('left_elbow');
            $table->integer('right_elbow');
            $table->integer('left_wrist');
            $table->integer('right_wrist');
            $table->integer('rotation_head');
            $table->integer('slope_head');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('robos');
    }
};
