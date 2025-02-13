<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FishFactory extends Factory
{
    public function definition(): array
    {
        return [
            'scientific_name' => $this->faker->unique()->word(),
            'english_name' => $this->faker->word(),
            'local_name' => $this->faker->word(),
            'fishing_ground' => $this->faker->randomElement(['Aparri', 'Cagayan River', 'Babuyan Channel']),
        ];
    }
}
