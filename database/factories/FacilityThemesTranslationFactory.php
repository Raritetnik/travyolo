<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\FacilityTheme;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FacilityThemesTranslation>
 */
class FacilityThemesTranslationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $facilityTheme = FacilityTheme::factory()->create();
        return [
            'language_country' => $this->faker->locale,
            'name' => $this->faker->name,
            'facility_themes_code' => $facilityTheme->code,
            'updated_at' => $this->faker->dateTime,
        ];
    }
}
