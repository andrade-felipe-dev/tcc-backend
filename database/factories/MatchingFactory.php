<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Matching>
 */
class MatchingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $entiy = User::inRandomOrder()->first();
        $voluntary = User::where('id', '!=', $entiy->id)->inRandomOrder()->first();

        return [
            'entity_id' => $entiy->id,
            'voluntary_id' => $voluntary->id,
        ];
    }
}
