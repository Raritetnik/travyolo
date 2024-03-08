<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\FacilityCategory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FacilityCategoriesTranslation>
 */
class FacilityCategoriesTranslationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $facilityCategory = FacilityCategory::factory()->create();
        return [
            'language_country' => $this->faker->locale,
            'name' =>  $this->faker->name,
            'facility_categories_code' => $facilityCategory->code,
            'updated_at' =>  $this->faker->dateTime,
        ];
    }
}
