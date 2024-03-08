<?php

namespace Database\Factories;

use App\Models\Continent;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Country>
 */
class CountryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $continent = Continent::factory()->create();
        return [
            'code' => $this->faker->unique()->regexify('[A-Za-z0-9]{25}'),
            'name' => $this->faker->word,
            'continents_code' => $continent->code,
            'updated_at' => $this->faker->dateTime
        ];
    }
}
