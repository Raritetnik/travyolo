<?php
namespace App\Http\Controllers;

use App\Models\RoomType;
use App\Models\RoomTypesTranslation;
use App\Models\MealType;
use App\Models\MealTypesTranslation;
use App\Models\RoomCategory;
use App\Models\RoomCategoriesTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class RoomController extends Controller
{

    /**
    * Function for insert the data in the RoomType Model(Database)
    * @param array $data - An associative array containing information to be inserted in the DB.
    * @return bool - Returns true if the data was successfully inserted, false otherwise.
    */
    public function insertRoomType($data){
        try {
            RoomType::create([
                'code'       => $data['code'],
                'quantity'   => $data['quantity'],
                'name'       => $data['name'],
                'updated_at' => $data['updated_at']
            ]);
            return true;
        } catch (\Exception $e) {
            Log::error("Exception : " . $e->getMessage());
            return false;
        }
    }

    /**
    * Function for update the data in the RoomType Model(Database)
    * @param array $data - An associative array containing information to be inserted in the DB.
    * @return bool - Returns true if the data was successfully updated, false otherwise.
    */
    public function updateRoomType($data){

        try {
            $roomType = RoomType::where('code', $data['code'])->first();

            if(isset($roomType)){
                $roomType->update([
                    'code'       => $data['code'],
                    'quantity'   => $data['quantity'],
                    'name'       => $data['name'],
                    'updated_at' => now()
                ]);
                return true;
            }
            else{
                return false;
               }
        } catch (\Exception $e) {
            Log::error("Exception : " . $e->getMessage());
            return false;
        }
    }

    /**
    * Function for delete the data in the RoomType Model(Database)
    * @param array $data - Primary key
    * @return bool - Returns true if the data was successfully deleted, false otherwise.
    */
    public function deleteRoomType($data){
 
        try {
            $roomType = RoomType::where('code', $data['code'])->first();

            if(isset($roomType)){
                $roomType->delete();
                return true;
            }
            else{
                return false;
            }
        } catch (\Exception $e) {
            Log::error("Exception : " . $e->getMessage());
            return false;
        }
    }


    /**
    * Function for insert the data in the RoomTypesTranslation Model(Database)
    * @param array $data - An associative array containing information to be inserted in the DB.
    * @return bool - Returns true if the data was successfully inserted, false otherwise.
    */
    public function insertRoomTypeTranslation($data){
        try {
            RoomTypesTranslation::create([
                'language_country' => $data['language_country'],
                'name'             => $data['name'],
                'room_types_code'  => $data['code'],
                'updated_at'       => now()
            ]);

            return true;
        } catch (\Exception $e) {
            Log::error("Exception : " . $e->getMessage());
            return false;
        }
    }


    /**
    * Function for update the data in the RoomTypesTranslation Model(Database)
    * @param array $data - An associative array containing information to be inserted in the DB.
    * @return bool - Returns true if the data was successfully updated, false otherwise.
    */
    public function updateRoomTypesTranslation($data){

        try {
            $roomTypeTranslation = RoomTypesTranslation::where('language_country',$data['language_country'])
            ->where('room_types_code',$data['code'])->first();

            if(isset($roomTypeTranslation)){
                $roomTypeTranslation->update([
                    'language_country' => $data['language_country'],
                    'name'             => $data['name'],
                    'room_types_code'  => $data['code'],
                    'updated_at'       => now()
                ]);
                return true;
            }
            else{
                return false;
            }
        } catch (\Exception $e) {
            Log::error("Exception : " . $e->getMessage());
            return false;
        }
    }

    /**
    * Function for delete the data in the RoomTypesTranslation Model(Database)
    * @param array $data - Primary key
    * @return bool - Returns true if the data was successfully deleted, false otherwise.
    */
    public function deleteRoomTypesTranslation($data){
        try {
            $roomTypeTranslation = RoomTypesTranslation::where('language_country',$data['language_country'])
            ->where('room_types_code' , $data['code'])->first();

            if(isset($roomTypeTranslation)){
                $roomTypeTranslation->delete();
                return true;
            }
            else{
                return false;
            }
        } catch (\Exception $e) {
            Log::error("Exception : " . $e->getMessage());
            return false;
        }
    }

    /**
    * Function for insert the data in the RoomCategory Model(Database)
    * @param array $data - An associative array containing information to be inserted in the DB.
    * @return bool - Returns true if the data was successfully inserted, false otherwise.
    */
    public function insertRoomCategory($data){
        try {
            RoomCategory::create([
                'code'       => $data['code'],
                'name'       => $data['name'],
                'updated_at' => now()
            ]);
            return true;
        } catch (\Exception $e) {
            Log::error("Exception : " . $e->getMessage());
            return false;
        }
    }

    /**
    * Function for update the data in the RoomCategory Model(Database)
    * @param array $data - An associative array containing information to be inserted in the DB.
    * @return bool - Returns true if the data was successfully updated, false otherwise.
    */
    public function updateRoomCategory($data){

        try {
            $roomCategorie = RoomCategory::where('code', $data['code'])->first();

            if(isset($roomCategorie)){
                $roomCategorie->update([
                    'code'       => $data['code'],
                    'name'       => $data['name'],
                    'updated_at' => now()
                ]);
                return true;
            }
            else{
                return false;
               }
        } catch (\Exception $e) {
            Log::error("Exception : " . $e->getMessage());
            return false;
        }
    }

    /**
    * Function for delete the data in the RoomCategory Model(Database)
    * @param array $data - Primary key
    * @return bool - Returns true if the data was successfully deleted, false otherwise.
    */
    public function deleteRoomCategory($data){
        try {
            $roomCategorie = RoomCategory::where('code', $data['code'])->first();

            if(isset($roomCategorie)){
                $roomCategorie->delete();
                return true;
            }
            else{
                return false;
            }
        } catch (\Exception $e) {
            Log::error("Exception : " . $e->getMessage());
            return false;
        }
    }


    /**
    * Function for insert the data in the RoomCategoriesTranslation Model(Database)
    * @param array $data - An associative array containing information to be inserted in the DB.
    * @return bool - Returns true if the data was successfully inserted, false otherwise.
    */
    public function insertRoomCategoriesTranslation($data){
        try {
            RoomCategoriesTranslation::create([
                'language_country' => $data['language_country'],
                'name'             => $data['name'],
                'room_categories_code'  => $data['code'],
                'updated_at'       => now()
            ]);

            return true;
        } catch (\Exception $e) {
            Log::error("Exception : " . $e->getMessage());
            return false;
        }
    }


    /**
    * Function for update the data in the RoomCategoriesTranslation Model(Database)
    * @param array $data - An associative array containing information to be inserted in the DB.
    * @return bool - Returns true if the data was successfully updated, false otherwise.
    */
    public function updateRoomCategoriesTranslation($data){

        try {
            $roomCategoriesTranslation = RoomCategoriesTranslation::where('language_country',$data['language_country'])
            ->where('room_categories_code',$data['code'])->first();

            if(isset($roomCategoriesTranslation)){
                $roomCategoriesTranslation->update([
                    'language_country' => $data['language_country'],
                    'name'             => $data['name'],
                    'room_categories_code'  => $data['code'],
                    'updated_at'       => now()
                ]);
                return true;
            }
            else{
                return false;
            }
        } catch (\Exception $e) {
            Log::error("Exception : " . $e->getMessage());
            return false;
        }
    }

    /**
    * Function for delete the data in the RoomCategoriesTranslation Model(Database)
    * @param array $data - Primary key
    * @return bool - Returns true if the data was successfully deleted, false otherwise.
    */
    public function deleteRoomCategoriesTranslation($data){
        try {
            $roomCategoriesTranslation = RoomCategoriesTranslation::where('language_country',$data['language_country'])
            ->where('room_categories_code' , $data['code'])->first();

            if(isset($roomCategoriesTranslation)){
                $roomCategoriesTranslation->delete();
                return true;
            }
            else{
                return false;
            }
        } catch (\Exception $e) {
            Log::error("Exception : " . $e->getMessage());
            return false;
        }
    }

    /**
    * Function for insert the data in the MealType Model(Database)
    * @param array $data - An associative array containing information to be inserted in the DB.
    * @return bool - Returns true if the data was successfully inserted, false otherwise.
    */
    public function insertMealType($data){
    try {
        MealType::create([
            'code'       => $data['code'],
            'name'       => $data['name'],
            'score'      => $data['score'],
            'updated_at' => now()
        ]);

        return true;
    } catch (\Exception $e) {
        Log::error("Exception : " . $e->getMessage());
        return false;
    }
}

    /**
    * Function for update the data in the MealType Model(Database)
    * @param array $data - An associative array containing information to be inserted in the DB.
    * @return bool - Returns true if the data was successfully updated, false otherwise.
    */
    public function updateMealType($data){

        try {
            $mealType = MealType::where('code', $data['code'])->first();

            if(isset($mealType)){
                $mealType->update([
                    'code'       => $data['code'],
                    'name'       => $data['name'],
                    'score'      => $data['score'],
                    'updated_at' => now()
                ]);
                return true;
            }
            else{
                return false;
            }
        } catch (\Exception $e) {
            Log::error("Exception : " . $e->getMessage());
            return false;
        }
    }

    /**
    * Function for delete the data in the MealType Model(Database)
    * @param array $data - Primary key
    * @return bool - Returns true if the data was successfully deleted, false otherwise.
    */
    public function deleteMealType($data){
        try {
            $mealType = MealType::where('code', $data['code'])->first();

            if(isset($mealType)){
                $mealType->delete();
                return true;
            }
            else{
                return false;
            }
        } catch (\Exception $e) {
            Log::error("Exception : " . $e->getMessage());
            return false;
        }
    }


    /**
    * Function for insert the data in the MealTypesTranslation Model(Database)
    * @param array $data - An associative array containing information to be inserted in the DB.
    * @return bool - Returns true if the data was successfully inserted, false otherwise.
    */
    public function insertMealTypesTranslation($data){
        try {
            MealTypesTranslation::create([
                'language_country' => $data['language_country'],
                'name'             => $data['name'],
                'meal_types_code'  => $data['code'],
                'updated_at'       => now()
            ]);

            return true;
        } catch (\Exception $e) {
            Log::error("Exception : " . $e->getMessage());
            return false;
        }
    }

    /**
    * Function for update the data in the MealTypesTranslation Model(Database)
    * @param array $data - An associative array containing information to be inserted in the DB.
    * @return bool - Returns true if the data was successfully updated, false otherwise.
    */
    public function updateMealTypesTranslation($data){
        try {
            $mealTypeTranslation = MealTypesTranslation::where('language_country',$data['language_country'])
            ->where('meal_types_code' , $data['code'])->first();

            if(isset($mealTypeTranslation)){
                $mealTypeTranslation->update([
                    'language_country' => $data['language_country'],
                    'name'             => $data['name'],
                    'meal_types_code'  => $data['code'],
                    'updated_at'       => now()
                ]);
                return true;
            }
            else{
                return false;
            }
        } catch (\Exception $e) {
            Log::error("Exception : " . $e->getMessage());
            return false;
        }
    }

    /**
    * Function for delete the data in the MealTypesTranslation Model(Database)
    * @param array $data - Primary key
    * @return bool - Returns true if the data was successfully deleted, false otherwise.
    */
    public function deleteMealTypesTranslation($data){
        try {
            $mealTypeTranslation = MealTypesTranslation::where('language_country',$data['language_country'])
            ->where('meal_types_code' , $data['code'])->first();

            if(isset($mealTypeTranslation)){
                $mealTypeTranslation->delete();
                return true;
            }
            else{
                return false;
            }
        } catch (\Exception $e) {
            Log::error("Exception : " . $e->getMessage());
            return false;
        }
    }


    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $data)
    {
        //
    }

    public function show(RoomType $roomType)
    {
        //
    }

    public function edit(RoomType $roomType)
    {
        //
    }

    public function update(Request $data, RoomType $roomType)
    {
        //
    }

    public function destroy(RoomType $roomType)
    {
        //
    }

}
?>
