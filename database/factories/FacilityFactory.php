<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\FacilityType;
use App\Models\FacilityCategory;
use App\Models\FacilityScope;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Facility>
 */
class FacilityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $facilityCategory = FacilityCategory::factory()->create();
        $facilityScope = FacilityScope::factory()->create();
        $facilityType = FacilityType::factory()->create();

        return [
            'code' => $this->faker->unique()->regexify('[A-Za-z0-9]{25}'),
            'name' => $this->faker->word,
            'updated_at' => $this->faker->dateTime,
            'facility_types_code' => $facilityType->code,
            'facility_categories_code' => $facilityCategory->code,
            'facility_scopes_code' => $facilityScope->code,
        ];
    }
}
