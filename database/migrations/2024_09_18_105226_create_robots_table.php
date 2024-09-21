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
        Schema::create('robots', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('left_wrist_id');
            $table->unsignedBigInteger('right_wrist_id');
            $table->unsignedBigInteger('right_elbow_id');
            $table->unsignedBigInteger('left_elbow_id');
            $table->unsignedBigInteger('head_rotation_id');
            $table->unsignedBigInteger('head_tilt_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('robots', function (Blueprint $table) {

            $table->dropColumn('left_wrist_id');
            $table->dropColumn('right_wrist_id');
            $table->dropColumn('right_elbow_id');
            $table->dropColumn('left_elbow_id');
            $table->dropColumn('head_rotation_id');
            $table->dropColumn('head_tilt_id');
        });
        Schema::dropIfExists('robots');
    }
};
