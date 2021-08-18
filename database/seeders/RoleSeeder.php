<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['role_name' => 'Admin',
            'updated_at' => new DateTime(),
            'created_at' => new DateTime()],
        [
            'role_name' => 'General',
            'updated_at' => new DateTime(),
            'created_at' => new DateTime()],
        ]);
    }
}
