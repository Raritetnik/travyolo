<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Facility;
use App\Models\FacilityTheme;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FacilitiesHasFacilityTheme>
 */
class FacilitiesHasFacilityThemeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $facility = Facility::factory()->create();
        $facilityTheme = FacilityTheme::factory()->create();
        return [
            'facilities_code' => $facility->code,
            'facility_themes_code' => $facilityTheme->code,
        ];
    }
}
