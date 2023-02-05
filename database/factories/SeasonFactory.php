<?php

namespace Database\Factories;

use App\Models\AttributeValue;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Season>
 */
class SeasonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $category = Category::inRandomOrder()->first();

        $age = AttributeValue::where('attribute_id', 1)->inRandomOrder()->first();

        $country = AttributeValue::where('attribute_id', 2)->inRandomOrder()->first();

        $genre = AttributeValue::where('attribute_id', 3)->inRandomOrder()->first();

        $language = AttributeValue::where('attribute_id', 4)->inRandomOrder()->first();

        return [
            'category_id' => $category->id,
            'age_id' =>  $age->id,
            'country_id' => $country->id,
            'genre_id' => $genre->id,
            'language_id' => $language->id,
            'code' => $category->id . $age->id . $country->id . rand(1000,9999),
            'name' => fake()->streetName(),
            'year' => rand(1950, 2023),
            'description' => fake()->text(rand(300, 500)),
            'rating' => fake()->randomFloat($nbMaxDecimals = 1, $min = 0, $max = 5),
        ];
    }
}
