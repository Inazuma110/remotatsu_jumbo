<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use DateTime;
use App\Models\Remotatsu;


class RemotatsuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 100; $i++){
            Remotatsu::create([
                'remotatsu_name' => Str::random(10),
                'description' => Str::random(10),
                'display_order' => $i,
            ]);
        }
    }
}
