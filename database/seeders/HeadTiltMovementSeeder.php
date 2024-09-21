<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HeadTiltMovementSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('head_tilt_moviments')->insert([
            ['description' => 'Para Cima'],
            ['description' => 'Em Repouso'],
            ['description' => 'Para Baixo'],
        ]);
    }
}
