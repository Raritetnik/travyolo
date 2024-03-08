<?php

namespace App\Jobs;

use App\Http\Controllers\FacilityController;
use App\Models\Facility;
use App\Models\FacilitiesTranslation;
use App\Models\FacilityCategory;
use App\Models\FacilityCategoriesTranslation;
use App\Models\FacilityScope;
use App\Models\FacilityScopesTranslation;
use App\Models\FacilityTheme;
use App\Models\FacilityThemesTranslation;
use App\Models\FacilityType;
use App\Models\FacilityTypesTranslation;
use App\Models\FacilitiesHasFacilityTheme;
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


class GetDataFacilities implements ShouldQueue
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
    public function handle(){
       //DB::statement('SET FOREIGN_KEY_CHECKS=0');

        $this->clearAndFetchFacilityCategories();
        $this->clearAndFetchFacilityCategoriesTranslations();
        $this->clearAndFetchFacilityThemes();
        $this->clearAndFetchFacilityThemesTranslations();
        $this->clearAndFetchFacilityTypes();
        $this->clearAndFetchFacilityTypesTranslations();
        $this->clearAndFetchFacilityScopes();
        $this->clearAndFetchFacilityScopesTranslations();
        $this->clearAndFetchFacilities();
        $this->clearAndFetchFacilitiesTranslations();
        $this->clearAndFetchFacilitiesHasThemes();

       // DB::statement('SET FOREIGN_KEY_CHECKS=1');     
       
    }

    
    /**
    * This function is designed to synchronize the facilities categories data with an external API.
    * It clears the current facilities categories data from the database and fetches the updated data from the API.
    * @return void
    * @throws \Exception If an error occurs during the process
    */
    public function clearAndFetchFacilityCategories(){
        $API_NAME = "facility-categories";

        try{
            //Function to get all the entries from the table FacilityCategory and then empty the table
            $count = FacilityCategory::count();
            if($count>0){
                $deletedFiles = FacilityCategory::query()->delete();
                Log::info($deletedFiles.' records deleted successfully -> facility categories');
            }

        
            //Function to get the data from API and then insert it into the table FacilityCategory
            $response = Http::get($this->URL_PROVIDER_API. $API_NAME);

            if ($response->successful()) {
                $data = $response->json();
                Log::info('Data retrieved successfully -> facility categories');

                foreach ($data as $key) {
                    $facility = new FacilityController;
                    
                    $key['updated_at'] = Carbon::parse($key['updated_at'])->format('Y-m-d H:i:s');
            
                    if($facility->insertFacilityCategory($key)){
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
    * This function is designed to synchronize the facilities categories translations data with an external API.
    * It clears the current facilities categories translations data from the database and fetches the updated data from the API.
    * @return void
    * @throws \Exception If an error occurs during the process
    */
    public function clearAndFetchFacilityCategoriesTranslations(){
        $API_NAME = "facility-categories/translations";
        $API_LANGUAGE = "fr";

        try{
            //Function to get all the entries from the table FacilitiesCategoriesTranslation and then empty the table
            $count = FacilityCategoriesTranslation::count();
            if($count>0){
                $deletedFiles = FacilityCategoriesTranslation::query()->delete();
                Log::info($deletedFiles.' records deleted successfully -> facilities categories translations');
            }

        
            //Function to get the data from API and then insert it into the table FacilitiesCategoriesTranslation
            $response = Http::get($this->URL_PROVIDER_API. $API_NAME. '/?language_code='. $API_LANGUAGE); 

            if ($response->successful()) {
                $data = $response->json();
                Log::info('Data retrieved successfully -> facilities categories translations');

                foreach ($data as $key) {
                    $facility = new FacilityController;
                    
                    $key['language_country'] = $API_LANGUAGE;
            
                    if($facility->insertFacilityCategoryTranslation($key)){
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
    * This function is designed to synchronize the facilities themes data with an external API.
    * It clears the current facilities themes data from the database and fetches the updated data from the API.
    * @return void
    * @throws \Exception If an error occurs during the process
    */
    public function clearAndFetchFacilityThemes(){
        $API_NAME = "facility-themes";

        try{
            //Function to get all the entries from the table FacilityTheme and then empty the table
            $count = FacilityTheme::count();
            if($count>0){
                $deletedFiles = FacilityTheme::query()->delete();
                Log::info($deletedFiles.' records deleted successfully -> facility themes');
            }

        
            //Function to get the data from API and then insert it into the table FacilityTheme
            $response = Http::get($this->URL_PROVIDER_API. $API_NAME);

            if ($response->successful()) {
                $data = $response->json();
                Log::info('Data retrieved successfully -> facility themes');

                foreach ($data as $key) {
                    $facility = new FacilityController;
                    
                    $key['updated_at'] = Carbon::parse($key['updated_at'])->format('Y-m-d H:i:s');
            
                    if($facility->insertFacilityTheme($key)){
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
    * This function is designed to synchronize the facilities themes translations data with an external API.
    * It clears the current facilities themes translations data from the database and fetches the updated data from the API.
    * @return void
    * @throws \Exception If an error occurs during the process
    */
    public function clearAndFetchFacilityThemesTranslations(){
        $API_NAME = "facility-themes/translations";
        $API_LANGUAGE = "fr";

        try{
            //Function to get all the entries from the table FacilityThemesTranslation and then empty the table
            $count = FacilityThemesTranslation::count();
            if($count>0){
                $deletedFiles = FacilityThemesTranslation::query()->delete();
                Log::info($deletedFiles.' records deleted successfully -> facilities themes translations');
            }

        
            //Function to get the data from API and then insert it into the table FacilityThemesTranslation
            $response = Http::get($this->URL_PROVIDER_API. $API_NAME. '/?language_code='. $API_LANGUAGE);

            if ($response->successful()) {
                $data = $response->json();
                Log::info('Data retrieved successfully -> facilities themes translations');

                foreach ($data as $key) {
                    $facility = new FacilityController;
                    
                    $key['language_country'] = $API_LANGUAGE;
            
                    if($facility->insertFacilityThemeTranslation($key)){
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
    * This function is designed to synchronize the facilities types data with an external API.
    * It clears the current facilities types data from the database and fetches the updated data from the API.
    * @return void
    * @throws \Exception If an error occurs during the process
    */
    public function clearAndFetchFacilityTypes(){
        $API_NAME = "facility-types";

        try{
            //Function to get all the entries from the table FacilityType and then empty the table
            $count = FacilityType::count();
            if($count>0){
                $deletedFiles = FacilityType::query()->delete();
                Log::info($deletedFiles.' records deleted successfully -> facility types');
            }

        
            //Function to get the data from API and then insert it into the table FacilityType
            $response = Http::get($this->URL_PROVIDER_API. $API_NAME);

            if ($response->successful()) {
                $data = $response->json();
                Log::info('Data retrieved successfully -> facility types');

                foreach ($data as $key) {
                    $facility = new FacilityController;
                    
                    $key['updated_at'] = Carbon::parse($key['updated_at'])->format('Y-m-d H:i:s');
            
                    if($facility->insertFacilityType($key)){
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
    * This function is designed to synchronize the facilities types translations data with an external API.
    * It clears the current facilities types translations data from the database and fetches the updated data from the API.
    * @return void
    * @throws \Exception If an error occurs during the process
    */
    public function clearAndFetchFacilityTypesTranslations(){
        $API_NAME = "facility-types/translations";
        $API_LANGUAGE = "fr";

        try{
            //Function to get all the entries from the table FacilityTypesTranslation and then empty the table
            $count = FacilityTypesTranslation::count();
            if($count>0){
                $deletedFiles = FacilityTypesTranslation::query()->delete();
                Log::info($deletedFiles.' records deleted successfully -> facilities types translations');
            }

        
            //Function to get the data from API and then insert it into the table FacilityTypesTranslation
            $response = Http::get($this->URL_PROVIDER_API. $API_NAME. '/?language_code='. $API_LANGUAGE);

            if ($response->successful()) {
                $data = $response->json();
                Log::info('Data retrieved successfully -> facilities types translations');

                foreach ($data as $key) {
                    $facility = new FacilityController;
                    
                    $key['language_country'] = $API_LANGUAGE;
            
                    if($facility->insertFacilityTypeTranslation($key)){
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
    * This function is designed to synchronize the facilities scopes data with an external API.
    * It clears the current facilities scopes data from the database and fetches the updated data from the API.
    * @return void
    * @throws \Exception If an error occurs during the process
    */
    public function clearAndFetchFacilityScopes(){
        $API_NAME = "facility-scopes";

        try{
            //Function to get all the entries from the table FacilityScope and then empty the table
            $count = FacilityScope::count();
            if($count>0){
                $deletedFiles = FacilityScope::query()->delete();
                Log::info($deletedFiles.' records deleted successfully -> facility scopes');
            }

        
            //Function to get the data from API and then insert it into the table FacilityScope
            $response = Http::get($this->URL_PROVIDER_API. $API_NAME);

            if ($response->successful()) {
                $data = $response->json();
                Log::info('Data retrieved successfully -> facility scopes');

                foreach ($data as $key) {
                    $facility = new FacilityController;
                    
                    $key['updated_at'] = Carbon::parse($key['updated_at'])->format('Y-m-d H:i:s');
            
                    if($facility->insertFacilityScope($key)){
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
    * This function is designed to synchronize the facilities Scopes translations data with an external API.
    * It clears the current facilities Scopes translations data from the database and fetches the updated data from the API.
    * @return void
    * @throws \Exception If an error occurs during the process
    */
    public function clearAndFetchFacilityScopesTranslations(){
        $API_NAME = "facility-scopes/translations";
        $API_LANGUAGE = "fr";

        try{
            //Function to get all the entries from the table FacilityScopesTranslation and then empty the table
            $count = FacilityScopesTranslation::count();
            if($count>0){
                $deletedFiles = FacilityScopesTranslation::query()->delete();
                Log::info($deletedFiles.' records deleted successfully -> facilities Scopes translations');
            }

        
            //Function to get the data from API and then insert it into the table FacilityScopesTranslation
            $response = Http::get($this->URL_PROVIDER_API. $API_NAME. '/?language_code='. $API_LANGUAGE);

            if ($response->successful()) {
                $data = $response->json();
                Log::info('Data retrieved successfully -> facilities Scopes translations');

                foreach ($data as $key) {
                    $facility = new FacilityController;
                    
                    $key['language_country'] = $API_LANGUAGE;
            
                    if($facility->insertFacilityScopeTranslation($key)){
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
    * This function is designed to synchronize the facilities data with an external API.
    * It clears the current facilities data from the database and fetches the updated data from the API.
    * @return void
    * @throws \Exception If an error occurs during the process
    */
    public function clearAndFetchFacilities(){
        $API_NAME = "facilities";

        try{
            //Function to get all the entries from the table Facility and then empty the table
            $count = Facility::count();
            if($count>0){
                $deletedFiles = Facility::query()->delete();
                Log::info($deletedFiles.' records deleted successfully -> facility');
            }

        
            //Function to get the data from API and then insert it into the table Facility
            $response = Http::get($this->URL_PROVIDER_API. $API_NAME);

            if ($response->successful()) {
                $data = $response->json();
                Log::info('Data retrieved successfully -> facilities');

                foreach ($data as $key) {
                    $facility = new FacilityController;
                    
                    $key['updated_at'] = Carbon::parse($key['updated_at'])->format('Y-m-d H:i:s');
            
                    if($facility->insertFacility($key)){
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
    * This function is designed to synchronize the facilities translations data with an external API.
    * It clears the current facilities translations data from the database and fetches the updated data from the API.
    * @return void
    * @throws \Exception If an error occurs during the process
    */
    public function clearAndFetchFacilitiesTranslations(){
        $API_NAME = "facilities/translations";
        $API_LANGUAGE = "fr";

        try{
            //Function to get all the entries from the table FacilitiesTranslation and then empty the table
            $count = FacilitiesTranslation::count();
            if($count>0){
                $deletedFiles = FacilitiesTranslation::query()->delete();
                Log::info($deletedFiles.' records deleted successfully -> facilities translations');
            }

        
            //Function to get the data from API and then insert it into the table FacilitiesTranslation
            $response = Http::get($this->URL_PROVIDER_API. $API_NAME. '/?language_code='. $API_LANGUAGE);

            if ($response->successful()) {
                $data = $response->json();
                Log::info('Data retrieved successfully -> facility translations');

                foreach ($data as $key) {
                    $facility = new FacilityController;
                    
                    $key['language_country'] = $API_LANGUAGE;
            
                    if($facility->insertFacilityTranslation($key)){
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
    * This function is designed to synchronize the facilities has themes data with an external API.
    * It clears the current facilities has themes data from the database and fetches the updated data from the API.
    * @return void
    * @throws \Exception If an error occurs during the process
    */
    public function clearAndFetchFacilitiesHasThemes(){
        $API_NAME = "facilities";

        try{
            //Function to get all the entries from the table FacilityHasFacilityTheme and then empty the table
            $count = FacilitiesHasFacilityTheme::count();
            if($count>0){
                $deletedFiles = FacilitiesHasFacilityTheme::query()->delete();
                Log::info($deletedFiles.' records deleted successfully -> facility has themes');
            }

        
            //Function to get the data from API and then insert it into the table FacilityHasFacilityTheme
            $response = Http::get($this->URL_PROVIDER_API. $API_NAME);

            if ($response->successful()) {
                $data = $response->json();
                Log::info('Data retrieved successfully -> facilities has themes');               

                foreach ($data as $key) {
                    $facility = new FacilityController;
                    
                    $code = $key['code'];
                    $themes = $key['themes'];
           
                    foreach ($themes as $theme){
                        if($theme != null){
                            $data_theme['facilities_code']= $code;
                            $data_theme['facility_themes_code'] = $theme;

                            if($facility->insertFacilitiesHasFacilityTheme($data_theme)){
                                Log::info('Data inserted successfully -> facilities has themes');
                            }else{
                                Log::error('Data insertion failed:'. $response->status());
                            }
                        }
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