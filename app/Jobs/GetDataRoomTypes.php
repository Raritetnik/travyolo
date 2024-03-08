<?php

namespace App\Jobs;

use App\Http\Controllers\RoomController;
use App\Models\MealType;
use App\Models\MealTypesTranslation;
use App\Models\RoomCategoriesTranslation;
use App\Models\RoomCategory;
use App\Models\RoomType;
use App\Models\RoomTypesTranslation;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\DB;

class GetDataRoomTypes implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $URL_PROVIDER_API;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->URL_PROVIDER_API = env('API_URL');
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->clearAndFetchMealTypes();
        $this->clearAndFetchMealTypesTranslations();
        $this->clearAndFetchRoomTypes();
        $this->clearAndFetchRoomTypesTranslations();
        $this->clearAndFetchRoomCategories();
        $this->clearAndFetchRoomCategoriesTranslations();
    }

    /**
    * This function is designed to synchronize the meal types data with an external API.
    * It clears the current meal types data from the database and fetches the updated data from the API.
    * @return void
    * @throws \Exception If an error occurs during the process
    */
    public function clearAndFetchMealTypes(){
        $API_NAME = "meal-types";

        try{
            //Function to get all the entries from the table MealTypes and then empty the table
            $count = MealType::count();
            if($count>0){
                $deletedFiles = MealType::query()->delete();
                Log::info($deletedFiles.' records deleted successfully -> meal types');
            }


            //Function to get the data from API and then insert it into the table MealType
            $response = Http::get($this->URL_PROVIDER_API. $API_NAME);

            if ($response->successful()) {
                $data = $response->json();
                Log::info('Data retrieved successfully -> meal types');

                foreach ($data as $key) {
                    $mealType = new RoomController;

                    $key['updated_at'] = Carbon::parse($key['updated_at'])->format('Y-m-d H:i:s');

                    if($mealType->insertMealType($key)){
                        Log::info('Data inserted successfully');
                    }else{
                        Log::error('Data insertion failed:' . $response->status());
                    }
                }

            } else {
                Log::error('Request failed with status code: ' . $response->status());
            }

        }catch (\Exception $e){
            Log::critical($e->getMessage());
        }
    }

    /**
    * This function is designed to synchronize the meal types translations data with an external API.
    * It clears the current meal types translations data from the database and fetches the updated data from the API.
    * @return void
    * @throws \Exception If an error occurs during the process
    */
    public function clearAndFetchMealTypesTranslations(){
        $API_NAME = "meal-types/translations";
        $API_LANGUAGE = "fr";

        try{
            //Function to get all the entries from the table MealTypesTranslations and then empty the table
            $count = MealTypesTranslation::count();
            if($count>0){
                $deletedFiles = MealTypesTranslation::query()->delete();
                Log::info($deletedFiles.' records deleted successfully -> meal types translations');
            }


            //Function to get the data from API and then insert it into the table MealTypesTranslation
            $response = Http::get($this->URL_PROVIDER_API. $API_NAME. '/?language_code='. $API_LANGUAGE);

            if ($response->successful()) {
                $data = $response->json();
                Log::info('Data retrieved successfully -> meal types translations');

                foreach ($data as $key) {
                    $mealType = new RoomController;

                    $key['language_country'] = $API_LANGUAGE;

                    if($mealType->insertMealTypesTranslation($key)){
                        Log::info('Data inserted successfully');
                    }else{
                        Log::error('Data insertion failed:' . $response->status());
                    }
                }

            } else {
                Log::error('Request failed with status code: ' . $response->status());
            }

        }catch (\Exception $e){
            Log::critical($e->getMessage());
        }
    }

    /**
    * This function is designed to synchronize the room types data with an external API.
    * It clears the current room types data from the database and fetches the updated data from the API.
    * @return void
    * @throws \Exception If an error occurs during the process
    */
    public function clearAndFetchRoomTypes(){
        $API_NAME = "room-types";

        try{
            //Function to get all the entries from the table RoomTypes and then empty the table
            $count = RoomType::count();
            if($count>0){
                $deletedFiles = RoomType::query()->delete();
                Log::info($deletedFiles.' records deleted successfully -> room types');
            }


            //Function to get the data from API and then insert it into the table RoomType
            $response = Http::get($this->URL_PROVIDER_API. $API_NAME);

            if ($response->successful()) {
                $data = $response->json();
                Log::info('Data retrieved successfully -> room types');

                foreach ($data as $key) {
                    $roomType = new RoomController;

                    $key['updated_at'] = Carbon::parse($key['updated_at'])->format('Y-m-d H:i:s');

                    if($roomType->insertRoomType($key)){
                        Log::info('Data inserted successfully');
                    }else{
                        Log::error('Data insertion failed:' . $response->status());
                    }
                }

            } else {
                Log::error('Request failed with status code: ' . $response->status());
            }

        }catch (\Exception $e){
            Log::critical($e->getMessage());
        }
    }

    /**
    * This function is designed to synchronize the room types translations data with an external API.
    * It clears the current room types translations data from the database and fetches the updated data from the API.
    * @return void
    * @throws \Exception If an error occurs during the process
    */
    public function clearAndFetchRoomTypesTranslations(){
        $API_NAME = "room-types/translations";
        $API_LANGUAGE = "fr";

        try{
            //Function to get all the entries from the table RoomTypesTranslation and then empty the table
            $count = RoomTypesTranslation::count();
            if($count>0){
                $deletedFiles = RoomTypesTranslation::query()->delete();
                Log::info($deletedFiles.' records deleted successfully -> room types translations');
            }


            //Function to get the data from API and then insert it into the table RoomTypesTranslation
            $response = Http::get($this->URL_PROVIDER_API. $API_NAME. '/?language_code='. $API_LANGUAGE);

            if ($response->successful()) {
                $data = $response->json();
                Log::info('Data retrieved successfully -> room types translations');

                foreach ($data as $key) {
                    $roomType = new RoomController;

                    $key['language_country'] = $API_LANGUAGE;

                    if($roomType->insertRoomTypeTranslation($key)){
                        Log::info('Data inserted successfully');
                    }else{
                        Log::error('Data insertion failed:' . $response->status());
                    }
                }

            } else {
                Log::error('Request failed with status code: ' . $response->status());
            }

        }catch (\Exception $e){
            Log::critical($e->getMessage());
        }
    }

    /** ========================================================= */

    /**
    * This function is designed to synchronize the room types data with an external API.
    * It clears the current room categories data from the database and fetches the updated data from the API.
    * @return void
    * @throws \Exception If an error occurs during the process
    */
    public function clearAndFetchRoomCategories(){
        $API_NAME = "room-categories";

        try{
            //Function to get all the entries from the table RoomCategory and then empty the table
            $count = RoomCategory::count();
            if($count>0){
                $deletedFiles = RoomCategory::query()->delete();
                Log::info($deletedFiles.' records deleted successfully -> room categories');
            }


            //Function to get the data from API and then insert it into the table RoomType
            $response = Http::get($this->URL_PROVIDER_API. $API_NAME);

            if ($response->successful()) {
                $data = $response->json();
                Log::info('Data retrieved successfully -> room categories');

                foreach ($data as $key) {
                    $roomCategories = new RoomController;

                    $key['updated_at'] = Carbon::parse($key['updated_at'])->format('Y-m-d H:i:s');

                    if($roomCategories->insertRoomCategory($key)){
                        Log::info('Data inserted successfully');
                    }else{
                        Log::error('Data insertion failed:' . $response->status());
                    }
                }

            } else {
                Log::error('Request failed with status code: ' . $response->status());
            }

        }catch (\Exception $e){
            Log::critical($e->getMessage());
        }
    }

    /**
    * This function is designed to synchronize the room types translations data with an external API.
    * It clears the current room types translations data from the database and fetches the updated data from the API.
    * @return void
    * @throws \Exception If an error occurs during the process
    */
    public function clearAndFetchRoomCategoriesTranslations(){
        $API_NAME = "room-categories/translations";
        $API_LANGUAGE = "fr";

        try{
            //Function to get all the entries from the table RoomTypesTranslation and then empty the table
            $count = RoomCategoriesTranslation::count();
            if($count>0){
                $deletedFiles = RoomCategoriesTranslation::query()->delete();
                Log::info($deletedFiles.' records deleted successfully -> room categories translations');
            }


            //Function to get the data from API and then insert it into the table RoomCategoriesTranslation
            $response = Http::get($this->URL_PROVIDER_API. $API_NAME. '/?language_code='. $API_LANGUAGE);

            if ($response->successful()) {
                $data = $response->json();
                Log::info('Data retrieved successfully -> room categories translations');

                foreach ($data as $key) {
                    $roomCategories = new RoomController;

                    $key['language_country'] = $API_LANGUAGE;

                    if($roomCategories->insertRoomCategoriesTranslation($key)){
                        Log::info('Data inserted successfully');
                    }else{
                        Log::error('Data insertion failed:' . $response->status());
                    }
                }

            } else {
                Log::error('Request failed with status code: ' . $response->status());
            }

        }catch (\Exception $e){
            Log::critical($e->getMessage());
        }
    }

} /* end of class */