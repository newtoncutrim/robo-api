<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WristMovementSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('wrist_moviments')->insert([
            ['description' => 'Rotação para -90º'],
            ['description' => 'Rotação para -45º'],
            ['description' => 'Em Repouso'],
            ['description' => 'Rotação para 45º'],
            ['description' => 'Rotação para 90º'],
            ['description' => 'Rotação para 135º'],
            ['description' => 'Rotação para 180º'],
        ]);
    }
}
