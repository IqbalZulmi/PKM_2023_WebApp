<?php

namespace Database\Factories;

use App\Models\Titik;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Titik>
 */
class TitikFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Titik::class;

    public function definition()
    {
        return [
            'nama' => $this->faker->word,
        ];
    }
}
