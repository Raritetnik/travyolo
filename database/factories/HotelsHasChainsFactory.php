<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\HotelsHasChains;
use App\Models\Hotel;
use App\Models\Chain;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HotelsHasChains>
 */
class HotelsHasChainsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $hotel = Hotel::factory()->create();
        $hotelChains = Chain::factory()->create();

        return [
            'hotels_code' => $hotel->code,
            'chains_code' => $hotelChains->code,
            
        ];
    }
}
