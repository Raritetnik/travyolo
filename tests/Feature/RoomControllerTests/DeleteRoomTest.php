<?php
namespace Tests\Feature;

use App\Http\Controllers\RoomController;
use App\Models\RoomType;
use App\Models\RoomTypesTranslation;
use App\Models\RoomCategory;
use App\Models\RoomCategoriesTranslation;
use App\Models\MealType;
use App\Models\MealTypesTranslation;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class DeleteRoomTest extends TestCase
{
    use DatabaseTransactions;
    /**
    * Function that test the deleteRoomType method in the RoomController
    * @return bool
    */

    public function testRoomTypeDelete()
    {
        $roomType = RoomType::factory()->create();

        $controller = new RoomController();
        $status = $controller->deleteRoomType($roomType);
        $this->assertTrue($status);
        $this->assertDatabaseMissing('room_types', ['code' => $roomType->code]);
    }

    /**
    * Function that test the deleteRoomTypesTranslation method in the RoomController
    * @return bool
    */
    public function testRoomTypesTranslationDelete()
    {
        $roomTypesTranslation = RoomTypesTranslation::factory()->create();
        $roomTypesTranslation->code =  $roomTypesTranslation->room_types_code;
       
        $controller = new RoomController();
        $status = $controller->deleteRoomTypesTranslation($roomTypesTranslation);
        $this->assertTrue($status);
        $this->assertDatabaseMissing('room_types_translations', ['room_types_code' => $roomTypesTranslation->room_types_code , 'language_country' => $roomTypesTranslation->language_country]);
    }

    /**
    * Function that test the deleteRoomCategories method in the RoomController
    * @return bool
    */
    public function testRoomCategoriesDelete()
    {
        $roomCategory = RoomCategory::factory()->create();

        $controller = new RoomController();
        $status = $controller->deleteRoomCategory($roomCategory);
        $this->assertTrue($status);
        $this->assertDatabaseMissing('room_categories', ['code' => $roomCategory->code]);
    }

    /**
    * Function that test the deleteRoomCategoriesTranslation method in the RoomController
    * @return bool
    */
    public function testRoomCategoriesTranslationDelete()
    {
        $roomCategoryTranslation = RoomCategoriesTranslation::factory()->create();
        $roomCategoryTranslation->code =  $roomCategoryTranslation->room_categories_code;
        $controller = new RoomController();
        $status = $controller->deleteRoomCategoriesTranslation($roomCategoryTranslation);
        $this->assertTrue($status);
        $this->assertDatabaseMissing('room_categories_translations', ['room_categories_code' => $roomCategoryTranslation->room_categories_code , 'language_country' => $roomCategoryTranslation->language_country]);

    }

    /**
    * Function that test the deleteMealType method in the RoomController
    * @return bool
    */
     public function testMealTypeDelete()
     {
        
        $mealType = MealType::factory()->create();
        $controller = new RoomController();
        $status = $controller->deleteMealType($mealType);
        $this->assertTrue($status);
        $this->assertDatabaseMissing('meal_types', ['code' => $mealType->code]);
        }



    /**
    * Function that test the deleteMealTypesTranslation method in the RoomController
    * @return bool
    */
    public function testMealTypesTranslationDelete()
    {
        $mealTypeTranslation = MealTypesTranslation::factory()->create();
        $mealTypeTranslation->code = $mealTypeTranslation->meal_types_code;
        $controller = new RoomController();
        $status = $controller->deleteMealTypesTranslation($mealTypeTranslation);
        $this->assertTrue($status);
        $this->assertDatabaseMissing('meal_types_translations', ['meal_types_code' => $mealTypeTranslation->meal_types_code , 'language_country' => $mealTypeTranslation->language_country]);
       }
}
