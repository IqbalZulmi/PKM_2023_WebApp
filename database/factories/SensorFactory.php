<?php

namespace Database\Factories;

use App\Models\Sensor;
use App\Models\Titik;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sensor>
 */
class SensorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Sensor::class;

    public function definition()
    {
        return [
            Titik::inRandomOrder()->first()->id,
            'turbidity' => $this->faker->randomFloat(2, 0, 100),
            'ph' => $this->faker->randomFloat(2, 0, 14),
            'temperature' => $this->faker->randomFloat(2, 0, 100),
        ];
    }
}
