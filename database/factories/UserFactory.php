<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $general_role = Role::all()->where('role_name', 'General');
        $general_role_id = $general_role->pluck('id')->first();
        return [
            'employee_code' => $this->faker->unique()->asciify(),
            'user_name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => Hash::make('password'),
            'role_id' => $general_role_id
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function to_be_admin()
    {
        return $this->state(function (array $attributes) {
            $admin_role = Role::all()->where(
                'role_name', 'Admin'
            );
            $admin_role_id = $admin_role->pluck('id')->first();
            return [
                'role_id' => $admin_role_id
            ];
        });
    }
}
