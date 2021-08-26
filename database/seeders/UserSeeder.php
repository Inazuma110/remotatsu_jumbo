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

        Role::create(
            ['role_name' => 'Admin'],
        );
        Role::create(
            ['role_name' => 'General'],
        );
        User::factory()->count(10)->create();
        User::factory()->to_be_admin()->create([
            'email' => 'c0117035@edu.teu.ac.jp',
            'user_name' => 'Shuta Ito',
            'password' => Hash::make('password'),
        ]);
        User::factory()->create([
            'email' => 'general@edu.teu.ac.jp',
            'user_name' => 'general: Shuta Ito',
            'password' => Hash::make('password'),
        ]);
    }
}
