<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArmMovementSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('arm_moviments')->insert([
            ['description' => 'Em Repouso'],
            ['description' => 'Levemente Contraído'],
            ['description' => 'Contraído'],
            ['description' => 'Fortemente Contraído']
        ]);
    }
}
