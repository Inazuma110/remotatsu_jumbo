<?php

namespace Database\Factories;

use App\Models\Remotatsu;
use Illuminate\Database\Eloquent\Factories\Factory;

class RemotatsuFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Remotatsu::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'remotatsu_name' => $this->faker->realText(10, 5),
            'description' => $this->faker->realText(100, 5),
            'display_order' => $this->faker->unique()->randomNumber(),
        ];
    }
}
