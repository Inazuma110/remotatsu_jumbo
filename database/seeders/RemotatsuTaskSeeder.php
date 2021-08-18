<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use DateTime;

class RemotatsuTaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 10; $i++){
            DB::table('remotatsu_tasks')->insert([
                'user_id' => $i,
                'remotatsu_id' => rand(1, 10),
                'updated_at' => new DateTime(),
                'created_at' => new DateTime(),
            ]);
        }
    }
}
