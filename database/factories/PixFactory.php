<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pix>
 */
class PixFactory extends Factory
{
    public function definition(): array
    {
        return [
            'type' => $this->faker->name(),
            'value' => $this->faker->text()
        ];
    }
}
