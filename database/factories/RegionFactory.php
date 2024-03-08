<?php

namespace Database\Factories;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Region>
 */
class RegionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $country = Country::factory()->create();
        return [
            'code' => $this->faker->unique()->regexify('[A-Za-z0-9]{25}'),
            'name' => $this->faker->word,
            'kind' => $this->faker->word,
            'state_code' => $this->faker->countryCode(),
            'countries_code' => $country->code,
            'updated_at' => $this->faker->dateTime
        ];
    }
}
