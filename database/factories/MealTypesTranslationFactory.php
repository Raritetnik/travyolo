<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\MealType;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MealTypeTranslation>
 */
class MealTypesTranslationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $mealType = MealType::factory()->create();
        return [
            'language_country' => $this->faker->locale,
            'name' => $this->faker->word,
            'meal_types_code' => $mealType->code,
            'updated_at' => $this->faker->dateTime,
        ];
    }
}
