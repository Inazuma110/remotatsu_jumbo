<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class VoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 10; $i++){
            DB::table('votes')->insert([
                'user_id' => $i,
                'vote_number' => rand(1, 100),
                'updated_at' => new DateTime(),
                'created_at' => new DateTime(),
            ]);
        }
    }
}
