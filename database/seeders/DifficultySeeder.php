<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Difficulty;

class DifficultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Difficulty::create([
            'difficulty_name' => 'low'
        ]);
        Difficulty::create([
            'difficulty_name' => 'mid'
        ]);
        Difficulty::create([
            'difficulty_name' => 'high'
        ]);
    }
}
