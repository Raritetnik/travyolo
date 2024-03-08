<?php

namespace Tests\Feature;

use App\Http\Controllers\RoomController;
use App\Models\RoomCategoriesTranslation;
use App\Models\RoomCategory;
use App\Models\RoomType;
use App\Models\RoomTypesTranslation;
use App\Models\MealType;
use App\Models\MealTypesTranslation;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;


class UpdateRoomTest extends TestCase{

    use DatabaseTransactions;

    /**
    * Function that test the updateRoomType method in the RoomController
    * @return bool
    */
    public function testUpdateRoomType()
    {
        $roomType = RoomType::factory()->create();
        $data = [
            'code'       => $roomType->code,
            'name'       => "Update ".rand(1,10),
            'quantity'   => rand(10,50),
            'updated_at' => now()
        ];

        $controller = new RoomController();
        $status = $controller->updateRoomType($data);
        $this->assertTrue($status);
    }

    /**
    * Function that test the updateRoomTypesTranslation method in the RoomController
    * @return bool
    */
    public function testUpdateRoomTypeTranslation()
    {
        $roomTypeTranslation = RoomTypesTranslation::factory()->create();
        $data = [
            'language_country' => $roomTypeTranslation->language_country,
            'name'             => "Update ".rand(1,10),
            'code'             => $roomTypeTranslation->room_types_code,
            'updated_at'       => now()
        ];

        $controller = new RoomController();
        $status = $controller->updateRoomTypesTranslation($data);
        $this->assertTrue($status);

    }

    /**
    * Function that test the updateRoomCategories method in the RoomController
    * @return bool
    */
    public function testUpdateRoomCategories()
    {
        $roomCategory = RoomCategory::factory()->create();
        $data = [
            'code'       => $roomCategory->code,
            'name'       => "Update ".rand(1,10),
            'quantity'   => rand(10,50),
            'updated_at' => now()
        ];

        $controller = new RoomController();
        $status = $controller->updateRoomCategory($data);
        $this->assertTrue($status);
    }

    /**
    * Function that test the updateRoomCategoriesTranslation method in the RoomController
    * @return bool
    */
    public function testUpdateRoomCategoriesTranslation()
    {
        $roomCategoriesTranslation = RoomCategoriesTranslation::factory()->create();
        $data = [
            'language_country' => $roomCategoriesTranslation->language_country,
            'name'             => "Update ".rand(1,10),
            'code'             => $roomCategoriesTranslation->room_categories_code,
            'updated_at'       => now()
        ];

        $controller = new RoomController();
        $status = $controller->updateRoomCategoriesTranslation($data);
        $this->assertTrue($status);

    }

    /**
    * Function that test the updateMealType method in the RoomController
    * @return bool
    */
    public function testUpdateMealType()
    {
        $mealType = MealType::factory()->create();
        $data = [
            'code'       => $mealType->code,
            'name'       => "Update ".rand(1,10),
            'score'      => rand(1,6),
            'updated_at' => now()
        ];

        $controller = new RoomController();
        $status = $controller->updateMealType($data);
        $this->assertTrue($status);
    }

    /**
    * Function that test the updateMealTypesTranslation method in the RoomController
    * @return bool
    */
    public function testUpdateMealTypeTranslation()
    {
        $mealType = MealType::factory()->create();
        $mealTypesTranslation = MealTypesTranslation::factory()->create();
        $data = [
            'language_country' => $mealTypesTranslation->language_country,
            'name'             => "Update ".rand(1,10),
            'code'             => $mealTypesTranslation->meal_types_code,
            'updated_at'       => now()
        ];

        $controller = new RoomController();
        $status = $controller->updateMealTypesTranslation($data);
        $this->assertTrue($status);
    }
}
