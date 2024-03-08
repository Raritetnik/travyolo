<?php

namespace Tests\Feature;

use App\Http\Controllers\RoomController;
use App\Models\RoomType;
use App\Models\RoomCategory;
use App\Models\MealType;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;



class InsertRoomTest extends TestCase
{
    use DatabaseTransactions;

    /**
    * Function that test the insertRoomType method in the RoomController
    * @return bool
    */
    public function testInsertRoomType()
    {
        $data = [
            'code'       =>  rand(1,10),
            'quantity'   => rand(10,50),
            'name'       => "Insert ".rand(1,10),
            'updated_at' => now()
        ];

        $controller = new RoomController;
        $status = $controller->insertRoomType($data);
        $this->assertTrue($status);
    }

    /**
    * Function that test the insertRoomTypeTranslation method in the RoomController
    * @return bool
    */
    public function testInsertRoomTypesTranslation()
    {
        $roomType = RoomType::factory()->create();
        $data = [
            'language_country' => "fr",
            'name'             => "Insert ".rand(1,10),
            'code'             => $roomType->code,
            'updated_at'       => now()
        ];

        $controller = new RoomController;
        $status = $controller->insertRoomTypeTranslation($data);
        $this->assertTrue($status);

    }

    /**
    * Function that test the insertRoomCategories method in the RoomController
    * @return bool
    */
    public function testInsertRoomCategories()
    {
        $data = [
            'code'       => rand(500,600),
            'quantity'   => rand(10,50),
            'name'       => "Insert ".rand(1,10),
            'updated_at' => now()
        ];

        $controller = new RoomController;
        $status = $controller->insertRoomCategory($data);
        $this->assertTrue($status);
    }

    /**
    * Function that test the insertRoomCategoriesTranslation method in the RoomController
    * @return bool
    */
    public function testInsertRoomCategoriesTranslation()
    {
        $roomCategory = RoomCategory::factory()->create();
        $data = [
            'language_country' => "fr",
            'name'             => "Insert ".rand(1,10),
            'code'             => $roomCategory->code,
            'updated_at'       => now()
        ];

        $controller = new RoomController;
        $status = $controller->insertRoomCategoriesTranslation($data);
        $this->assertTrue($status);

    }

    /**
    * Function that test the insertMealType method in the RoomController
    * @return bool
    */
    public function testInsertMealType()
    {
        $data = [
            'code'       => rand(1,10),
            'score'      => rand(1,6),
            'name'       => "Insert ".rand(1,10),
            'updated_at' => now()
        ];

        $controller = new RoomController;
        $status = $controller->insertMealType($data);
        $this->assertTrue($status);
    }


    /**
    * Function that test the insertMealTypesTranslation method in the RoomController
    * @return bool
    */
    public function testInsertMealTypesTranslation()
    {
        $mealType = MealType::factory()->create();
        $data = [
            'language_country' => 'fr',
            'name'             => "Insert ".rand(1,10),
            'code'             => $mealType->code,
            'updated_at'       => now()
        ];

        $controller = new RoomController;
        $status = $controller->insertMealTypesTranslation($data);
        $this->assertTrue($status);
    }

}
