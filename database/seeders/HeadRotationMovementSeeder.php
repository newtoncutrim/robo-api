<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HeadRotationMovementSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('head_rotation_moviments')->insert([
            ['description' => 'Rotação -90º'],
            ['description' => 'Rotação -45º'],
            ['description' => 'Em Repouso'],
            ['description' => 'Rotação 45º'],
            ['description' => 'Rotação 90º'],
        ]);
    }
}
