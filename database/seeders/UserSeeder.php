<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use DateTime;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(
            ['role_name' => 'Admin'],
        );
        User::create([
                'employee_code' => 'C0117035',
                'user_name' => 'ShutaIto',
                'email' =>  'c011703534@edu.teu.ac.jp',
                'password' => Hash::make('password'),
                'role_id' => $admin->id,
        ]);
        $general = Role::create(
            ['role_name' => 'General'],
        );
        for($i = 0; $i < 10; $i++){
            $user = User::create([
                'employee_code' => Str::random(10),
                'user_name' => Str::random(10),
                'email' => Str::random(10) . '@gmail.com',
                'password' => Hash::make('password'),
                'role_id' => $general->id,
            ]);
        }
    }
}
