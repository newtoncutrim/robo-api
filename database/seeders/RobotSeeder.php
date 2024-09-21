<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RobotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('robots')->insert([
            'left_elbow_id' => 1,
            'right_elbow_id' => 1,
            'left_wrist_id' => 3,
            'right_wrist_id' => 3,
            'head_rotation_id' => 3,
            'head_tilt_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
