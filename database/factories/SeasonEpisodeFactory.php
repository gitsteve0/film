<?php

namespace Database\Factories;

use App\Models\Season;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SeasonEpisode>
 */
class SeasonEpisodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $season = Season::inRandomOrder()->first();

        return [
            'season_id' => $season->id,
            'name' => fake()->streetName(),
            'code' => 'eps'. $season->id . rand(1000, 9999),
            'number' => rand(1, 20),
            'duration' => fake()->time('H:m:s','3:59:59'),
            'viewed' => rand(10, 999),
        ];
    }
}
