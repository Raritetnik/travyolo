<?php

namespace Database\Factories;
use App\Models\HotelType;
use App\Models\Destination;
use Faker\Generator;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hotel>
 */
class HotelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $hotelType = HotelType::factory()->create();
        $destination = Destination::factory()->create();

        return [
            'code' => $this->faker->unique()->regexify('[A-Z0-9]{25}'),
            'master' => $this->faker->word,
            'name' => $this->faker->word,
            'zipcode' => $this->faker->word,
            'address' => $this->faker->word,
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'stars' => $this->faker->numberBetween(0, 5),
            'nr_rooms' => $this->faker->numberBetween(0, 100),
            'nr_restaurants' => $this->faker->numberBetween(0, 10),
            'nr_bars' => $this->faker->numberBetween(0, 10),
            'nr_halls' => $this->faker->numberBetween(0, 10),
            'yearbuilt' => $this->faker->numberBetween(1800, 2022),
            'checkin_from' => $this->faker->numberBetween(0, 10),
            'checkout_to' => $this->faker->numberBetween(0, 10),
            'checkout_from' => $this->faker->numberBetween(0, 10),
            'checkin_to' => $this->faker->numberBetween(0, 10),
            'gmt_offset' => $this->faker->word,
            'email' => $this->faker->word,
            'phone' => $this->faker->numberBetween(1000000, 9000000),
            'currencycode' => $this->faker->word,
            'availability_score' => $this->faker->randomFloat(2, 0, 100),
            'hotel_score' => $this->faker->randomFloat(2, 0, 100),
            'book_score' => $this->faker->randomFloat(2, 0, 100),
            'room_amenity' => $this->faker->text(1000),
            'hotel_information' => $this->faker->text(1000),
            'hotel_introduction' => $this->faker->text(1000),
            'location_information' => $this->faker->text(1000),
            'attraction_information' => $this->faker->text(1000),
            'hotel_amenity' => $this->faker->text(1000),
            'updated_at' => $this->faker->dateTime,
            'destinations_code' => $destination->code,
            'hotel_types_code' => $hotelType->code,
        ];
    }

}
