<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Facility;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FacilitiesTranslation>
 */
class FacilitiesTranslationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $facility = Facility::factory()->create();
        return [
            'language_country' => $this->faker->locale,
            'name' => $this->faker->name,
            'facilities_code' =>  $facility->code,
            'updated_at' => $this->faker->dateTime,
        ];
    }
}
