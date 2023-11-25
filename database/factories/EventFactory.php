<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->title(),
            'start' => fake()->dateTimeBetween('-10 days'),
            'end'  => fake()->dateTimeBetween('now', '+10 days'),
            'company_id' => 1,
        ];
    }
}
