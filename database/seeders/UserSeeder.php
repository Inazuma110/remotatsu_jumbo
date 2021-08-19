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
                'employee_code' => Str::random(10),
                'user_name' => Str::random(10),
                'email' => Str::random(10) . '@gmail.com',
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
            // $user->vote()->create([
            //     'vote_number' => rand(1, 100),
            //     'updated_at' => new DateTime(),
            //     'created_at' => new DateTime(),
            // ]);
            // $user->remotatsus()->createMany([[
            //     'remotatsu_name' => Str::random(10),
            //     'description' => Str::random(20),
            //     'display_order' => $i,
            //     'updated_at' => new DateTime(),
            //     'created_at' => new DateTime(),
            // ]]);
        }
    }
}
