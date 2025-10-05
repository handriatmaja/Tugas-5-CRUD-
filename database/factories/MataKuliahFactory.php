<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MataKuliahFactory extends Factory
{
    public function definition(): array
    {
        return [
            // Example: "Pengembangan Web"
            'nama' => ucfirst($this->faker->unique()->words(2, true)),
            'sks' => $this->faker->numberBetween(2, 4),
            // IMPORTANT: Don't set 'dosen_id' here
        ];
    }
}