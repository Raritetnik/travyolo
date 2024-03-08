<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\FacilityType;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FacilityTypesTranslation>
 */
class FacilityTypesTranslationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $facilityType = FacilityType::factory()->create();
        return [
            'language_country' => $this->faker->locale,
            'name' => $this->faker->name,
            'facility_types_code' => $facilityType->code,
            'updated_at' => $this->faker->dateTime,
        ];
    }
}
