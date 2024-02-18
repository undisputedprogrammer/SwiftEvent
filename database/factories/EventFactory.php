<?php

namespace Database\Factories;

use App\Models\Venue;
use Carbon\Carbon;
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
            'name' => fake()->sentence(4, true),
            'description' => fake()->sentence(20, true),
            'venue_id' => Venue::where('is_available')->get()->random(),
            'date' => Carbon::now()->addDays(10),
            'image' => ''
        ];
    }
}
