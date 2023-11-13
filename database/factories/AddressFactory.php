<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'street' => $this->faker->streetName(),
            'number' => $this->faker->randomNumber(3),
            'neighborhood' => $this->faker->text(),
            'city' => $this->faker->city(),
            'state' => $this->faker->randomLetter(2),
            'postal_code' => $this->faker->postcode()
        ];
    }
}
