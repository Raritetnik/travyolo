<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\FacilityScope;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FacilityScopesTranslation>
 */
class FacilityScopesTranslationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $facilityScope = FacilityScope::factory()->create();
        return [
            'language_country' => $this->faker->locale,
            'name' => $this->faker->name,
            'facility_scopes_code' => $facilityScope->code,
            'updated_at' => $this->faker->dateTime,
        ];
    }
}
