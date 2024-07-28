<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MusclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $muscles = [
            ['name' => 'chest'],
            ['name' => 'back'],
            ['name' => 'shoulders'],
            ['name' => 'biceps'],
            ['name' => 'triceps'],
            ['name' => 'quadriceps'],
            ['name' => 'hamstrings'],
            ['name' => 'calves'],
            ['name' => 'abdominals'],
            ['name' => 'glutes'],
            ['name' => 'forearms'],
            ['name' => 'traps'],
            ['name' => 'neck']
        ];

        DB::table('muscles')->insert($muscles);
    }
}
