<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Http\Controllers\HotelController;
use App\Models\Hotel;
use App\Models\HotelsTranslation;
use App\Models\Chain;
use App\Models\Image;
use App\Models\ImageCategory;
use App\Models\ImageCategoriesTranslation;
use App\Models\HotelsHasHotelTheme;
use App\Models\HotelsHasChains;
use App\Models\HotelTheme;
use App\Models\HotelThemesTranslation;
use App\Models\HotelType;
use App\Models\HotelTypesTranslation;
use App\Models\HotelsHasFacility;

use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;


class GetDataHotel implements ShouldQueue
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
        //
        $this->URL_PROVIDER_API = env('API_URL');
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->clearAndFetchHotelTypes();
        $this->clearAndFetchHotelTypesTranslations();
        $this->clearAndFetchHotelThemes();
        $this->clearAndFetchHotelThemesTranslations();
        $this->clearAndFetchChains();
        $this->clearAndFetchImagesCategories();
        $this->clearAndFetchImagesCategoriesTranslations();
        $this->clearAndFetchHotels();
        $this->clearAndFetchHotelsTranslations();
        $this->clearAndFetchImages();
        $this->clearAndFetchHotelsHasHotelThemes();
        $this->clearAndFetchHotelsHasChains();
        $this->clearAndFetchHotelsHasFacilities();
    }

    /**
     * This function is designed to synchronize the hotel types data with an external API.
     * It clears the current hotel type data from the database and fetches the updated data from the API.
     * 
     * @return void
     * 
     * @throws \Exception If an error occurs during the process
     */
    public function clearAndFetchHotelTypes()
    {
        $API_NAME = "hotel-types";
        try {
            //Function to get all the entries from the table hotel type and then empty  the table 
            $count = HotelType::count();
            if ($count != 0) {
                $deletedFiles = HotelType::query()->delete();
                log::info($deletedFiles . " -> Records deleted successfully -> Hotel type ");
            }
            //Function to get the data from API and then insert it into the table hotel type
            $response = Http::get($this->URL_PROVIDER_API . $API_NAME);

            if ($response->successful()) {
                $data = $response->json();
                Log::info('Data retrieved successfully -> hotel type');
                foreach ($data as $key) {
                    $hotel = new HotelController;
                    $key['updated_at'] = Carbon::parse($key['updated_at'])->format('Y-m-d H:i:s');
                    $isValid = $hotel->insertHotelType($key);
                    if ($isValid) {
                        Log::info('Data inserted successfully');
                    } else {
                        Log::error('Data insertion failed:' . $response->status());
                    }
                }
            } else {
                Log::error('Request failed with status code: ' . $response->status());
            }
        } catch (\Exception $e) {
            Log::critical($e->getMessage());
        }
    }


    /**
     * This function is designed to synchronize the hotel type Translation data with an external API.
     * It clears the current hotel type translation data from the database and fetches the updated data from the API.
     * 
     * @return void
     * 
     * @throws \Exception If an error occurs during the process
     */
    public function clearAndFetchHotelTypesTranslations()
    {
        $API_NAME = "hotel-types/translations/";
        $API_LANGUAGE = "fr";
        try {
            //Function to get all the entries from the table hotel type translation and then empty  the table 
            $count = HotelTypesTranslation::count();

            if ($count != 0) {
                $deletedFiles = HotelTypesTranslation::query()->delete();
                log::info($deletedFiles . " -> Records deleted successfully -> hotel type translations ");
            }
            //Function to get the data from API and then insert it into the table Continents translations 

            $response = Http::get($this->URL_PROVIDER_API . $API_NAME . '/?language_code=' . $API_LANGUAGE);

            if ($response->successful()) {
                $data = $response->json();
                Log::info('Data retrieved successfully  -> hotel type translations');
                foreach ($data as $key) {
                    $hotel = new HotelController;
                    $key['language_country'] = $API_LANGUAGE;
                    $isValid = $hotel->insertHotelTypeTranslation($key);
                    if ($isValid) {
                        Log::info('Data inserted successfully');
                    } else {
                        Log::error('Data insertion failed:' . $response->status());
                    }
                }
            } else {
                Log::error('Request failed with status code: ' . $response->status());
            }
        } catch (\Exception $e) {
            Log::critical($e->getMessage());
        }
    }


    /**
     * This function is designed to synchronize the hotel theme data with an external API.
     * It clears the current hotel theme data from the database and fetches the updated data from the API.
     * 
     * @return void
     * 
     * @throws \Exception If an error occurs during the process
     */
    public function clearAndFetchHotelThemes()
    {
        $API_NAME = "hotel-themes";
        try {
            //Function to get all the entries from the table hotel theme and then empty  the table 
            $count = HotelTheme::count();
            if ($count != 0) {
                $deletedFiles = HotelTheme::query()->delete();
                log::info($deletedFiles . " -> Records deleted successfully -> Hotel theme");
            }
            //Function to get the data from API and then insert it into the table hotel theme
            $response = Http::get($this->URL_PROVIDER_API . $API_NAME);

            if ($response->successful()) {
                $data = $response->json();
                Log::info('Data retrieved successfully -> hotel theme');
                foreach ($data as $key) {
                    $hotel = new HotelController;
                    $key['updated_at'] = Carbon::parse($key['updated_at'])->format('Y-m-d H:i:s');
                    $isValid = $hotel->insertHotelTheme($key);
                    if ($isValid) {
                        Log::info('Data inserted successfully');
                    } else {
                        Log::error('Data insertion failed:' . $response->status());
                    }
                }
            } else {
                Log::error('Request failed with status code: ' . $response->status());
            }
        } catch (\Exception $e) {
            Log::critical($e->getMessage());
        }
    }


    /**
     * This function is designed to synchronize the hotel themes Translation data with an external API.
     * It clears the current hotel themes translation data from the database and fetches the updated data from the API.
     * 
     * @return void
     * 
     * @throws \Exception If an error occurs during the process
     */
    public function clearAndFetchHotelThemesTranslations()
    {
        $API_NAME = "hotel-themes/translations";
        $API_LANGUAGE = "fr";
        try {
            //Function to get all the entries from the table hotel theme translation and then empty  the table 
            $count = HotelThemesTranslation::count();

            if ($count != 0) {
                $deletedFiles = HotelThemesTranslation::query()->delete();
                log::info($deletedFiles . " -> Records deleted successfully -> hotel theme translations ");
            }
            //Function to get the data from API and then insert it into the table hotel theme translations 

            $response = Http::get($this->URL_PROVIDER_API . $API_NAME . '/?language_code=' . $API_LANGUAGE);

            if ($response->successful()) {
                $data = $response->json();
                Log::info('Data retrieved successfully  -> hotel theme translations');
                foreach ($data as $key) {
                    $hotel = new HotelController;
                    $key['language_country'] = $API_LANGUAGE;
                    $isValid = $hotel->insertHotelThemeTranslation($key);
                    if ($isValid) {
                        Log::info('Data inserted successfully');
                    } else {
                        Log::error('Data insertion failed:' . $response->status());
                    }
                }
            } else {
                Log::error('Request failed with status code: ' . $response->status());
            }
        } catch (\Exception $e) {
            Log::critical($e->getMessage());
        }
    }



    /**
     * This function is designed to synchronize the chain data with an external API.
     * It clears the current chain data from the database and fetches the updated data from the API.
     * 
     * @return void
     * 
     * @throws \Exception If an error occurs during the process
     */
    public function clearAndFetchChains()
    {
        $API_NAME = "chains";
        try {
            //Function to get all the entries from the table chain and then empty  the table 
            $count = Chain::count();
            if ($count != 0) {
                $deletedFiles = Chain::query()->delete();
                log::info($deletedFiles . " -> Records deleted successfully -> chains ");
            }
            //Function to get the data from API and then insert it into the table chains
            $response = Http::get($this->URL_PROVIDER_API . $API_NAME);

            if ($response->successful()) {
                $data = $response->json();
                Log::info('Data retrieved successfully -> chains');
                foreach ($data as $key) {
                    $hotel = new HotelController;
                    $key['updated_at'] = Carbon::parse($key['updated_at'])->format('Y-m-d H:i:s');
                    $isValid = $hotel->insertChain($key);
                    if ($isValid) {
                        Log::info('Data inserted successfully');
                    } else {
                        Log::error('Data insertion failed:' . $response->status());
                    }
                }
            } else {
                Log::error('Request failed with status code: ' . $response->status());
            }
        } catch (\Exception $e) {
            Log::critical($e->getMessage());
        }
    }


    /**
     * This function is designed to synchronize the image categories data with an external API.
     * It clears the current image categories data from the database and fetches the updated data from the API.
     * 
     * @return void
     * 
     * @throws \Exception If an error occurs during the process
     */
    public function clearAndFetchImagesCategories()
    {
        $API_NAME = "image-categories";
        try {
            //Function to get all the entries from the table image categories  and then empty  the table 
            $count = ImageCategory::count();
            if ($count != 0) {
                $deletedFiles = ImageCategory::query()->delete();
                log::info($deletedFiles . " -> Records deleted successfully -> image categories ");
            }
            //Function to get the data from API and then insert it into the table images categories
            $response = Http::get($this->URL_PROVIDER_API . $API_NAME);

            if ($response->successful()) {
                $data = $response->json();
                Log::info('Data retrieved successfully -> image categories');
                foreach ($data as $key) {
                    $hotel = new HotelController;
                    $isValid = $hotel->insertImageCategory($key);
                    if ($isValid) {
                        Log::info('Data inserted successfully');
                    } else {
                        Log::error('Data insertion failed:' . $response->status());
                    }
                }
            } else {
                Log::error('Request failed with status code: ' . $response->status());
            }
        } catch (\Exception $e) {
            Log::critical($e->getMessage());
        }
    }


    /**
     * This function is designed to synchronize the image categories Translation data with an external API.
     * It clears the current image categories translation data from the database and fetches the updated data from the API.
     * 
     * @return void
     * 
     * @throws \Exception If an error occurs during the process
     */
    public function clearAndFetchImagesCategoriesTranslations()
    {
        $API_NAME = "image-categories/translations/";
        $API_LANGUAGE = "fr";
        try {
            //Function to get all the entries from the table image categories translation and then empty  the table 
            $count = ImageCategoriesTranslation::count();

            if ($count != 0) {
                $deletedFiles = ImageCategoriesTranslation::query()->delete();
                log::info($deletedFiles . " -> Records deleted successfully -> image categories translations ");
            }
            //Function to get the data from API and then insert it into the table image categories translations

            $response = Http::get($this->URL_PROVIDER_API . $API_NAME . '/?language_code=' . $API_LANGUAGE);

            if ($response->successful()) {
                $data = $response->json();
                Log::info('Data retrieved successfully  -> image categories translations');
                foreach ($data as $key) {
                    $hotel = new HotelController;
                    $key['language_country'] = $API_LANGUAGE;
                    $isValid = $hotel->insertImageCategoriesTranslation($key);
                    if ($isValid) {
                        Log::info('Data inserted successfully');
                    } else {
                        Log::error('Data insertion failed:' . $response->status());
                    }
                }
            } else {
                Log::error('Request failed with status code: ' . $response->status());
            }
        } catch (\Exception $e) {
            Log::critical($e->getMessage());
        }
    }





    /**
     * This function is designed to synchronize the hotel data with an external API.
     * It clears the current hotel data from the database and fetches the updated data from the API.
     * 
     * @return void
     * @todo 'validation'
     * @throws \Exception If an error occurs during the process
     */
    public function clearAndFetchHotels()
    {
        $API_NAME = "hotels";
        try {
            //Function to get all the entries from the table hotel and then empty  the table 
            $count = Hotel::count();
            if ($count != 0) {
                $deletedFiles = Hotel::query()->delete();
                log::info($deletedFiles . " -> Records deleted successfully -> Hotel");
            }
            //Function to get the data from API and then insert it into the table hotel 
            $response = Http::get($this->URL_PROVIDER_API . $API_NAME);

            if ($response->successful()) {
                $data = $response->json();
                Log::info('Data retrieved successfully -> hotel');
                foreach ($data as $key) {
                    $hotel = new HotelController;
                    // Validate that the data exists
                    $key['hotel_information']      = data_get($key, 'descriptions.hotel_information', null);
                    $key['hotel_introduction']     = data_get($key, 'descriptions.hotel_introduction', null);
                    $key['location_information']   = data_get($key, 'descriptions.location_information', null);
                    $key['attraction_information'] = data_get($key, 'descriptions.attraction_information', null);
                    $key['hotel_amenity']          = data_get($key, 'descriptions.hotel_amenity', null);
                    $key['room_amenity']          = data_get($key, 'descriptions.room_amenity', null);

                    //Convert date into the correct database format
                    $key['updated_at'] = Carbon::parse($key['updated_at'])->format('Y-m-d H:i:s');

                    $isValid = $hotel->insertHotel($key);
                    if ($isValid) {
                        Log::info('Data inserted successfully');
                    } else {
                        Log::error('Data insertion failed:' . $response->status());
                    }
                }
            } else {
                Log::error('Request failed with status code: ' . $response->status());
            }
        } catch (\Exception $e) {
            Log::critical($e->getMessage());
        }
    }



    /**
     * This function is designed to synchronize the hotel Translation data with an external API.
     * It clears the current hotel translation data from the database and fetches the updated data from the API.
     * 
     * @return void
     * 
     * @throws \Exception If an error occurs during the process
     */
    public function clearAndFetchHotelsTranslations()
    {
        $API_NAME = "hotels/translations/";
        $API_LANGUAGE = "fr";
        try {
            //Function to get all the entries from the table hotel translation and then empty  the table 
            $count = HotelsTranslation::count();

            if ($count != 0) {
                $deletedFiles = HotelsTranslation::query()->delete();
                log::info($deletedFiles . " -> Records deleted successfully -> hotel translations");
            }
            //Function to get the data from API and then insert it into the table hotel translations

            $response = Http::get($this->URL_PROVIDER_API . $API_NAME . '/?language_code=' . $API_LANGUAGE);

            if ($response->successful()) {
                $data = $response->json();
                Log::info('Data retrieved successfully  -> hotel translations');
                foreach ($data as $key) {
                    $Hotel = new HotelController;
                    $key['language_country'] = $API_LANGUAGE;

                    // Validate that the data exists
                    $key['hotel_information']      = data_get($key, 'descriptions.hotel_information', null);
                    $key['hotel_introduction']     = data_get($key, 'descriptions.hotel_introduction', null);
                    $key['location_information']   = data_get($key, 'descriptions.location_information', null);
                    $key['attraction_information'] = data_get($key, 'descriptions.attraction_information', null);
                    $key['hotel_amenity']          = data_get($key, 'descriptions.hotel_amenity', null);
                    $key['room_amenity']           = data_get($key, 'descriptions.room_amenity', null);
                    $isValid = $Hotel->insertHotelTranslation($key);
                    if ($isValid) {
                        Log::info('Data inserted successfully');
                    } else {
                        Log::error('Data insertion failed:' . $response->status());
                    }
                }
            } else {
                Log::error('Request failed with status code: ' . $response->status());
            }
        } catch (\Exception $e) {
            Log::critical($e->getMessage());
        }
    }


    /**
     * This function is designed to synchronize the images data with an external API.
     * It clears the current images data from the database and fetches the updated data from the API.
     * 
     * @return void
     * 
     * @throws \Exception If an error occurs during the process
     */
    public function clearAndFetchImages()
    {
        $API_NAME = "hotels";
        try {
            //Function to get all the entries from the table images  and then empty  the table 
            $count = Image::count();
            if ($count != 0) {
                $deletedFiles = Image::query()->delete();
                log::info($deletedFiles . " -> Records deleted successfully -> images  ");
            }
            //Function to get the data from API and then insert it into the table images 
            $response = Http::get($this->URL_PROVIDER_API . $API_NAME);

            if ($response->successful()) {
                $data = $response->json();
                Log::info('Data retrieved successfully -> images');
                foreach ($data as $key) {
                    $images = $key['images'];
                    foreach ($images as $image) {
                        $hotel = new HotelController;

                        $image['code'] = $key['code'];
                        $image['large']      = data_get($image, 'thumbnail_images.large', null);
                        $image['small']      = data_get($image, 'thumbnail_images.small', null);
                        $image['mid']        = data_get($image, 'thumbnail_images.mid', null);

                        //Convert into the correct database format
                        $image['updated_at'] = Carbon::parse($key['updated_at'])->format('Y-m-d H:i:s');
                        $isValid = $hotel->insertImages($image);
                        if ($isValid) {
                            Log::info('Data inserted successfully');
                        } else {
                            Log::error('Data insertion failed:' . $response->status());
                        }
                    }
                }
            } else {
                Log::error('Request failed with status code: ' . $response->status());
            }
        } catch (\Exception $e) {
            Log::critical($e->getMessage());
        }
    }



        /**
     * This function is designed to synchronize the hotel has hotel theme data with an external API.
     * It clears the current hotel has hotel theme data from the database and fetches the updated data from the API.
     * 
     * @return void
     * 
     * @throws \Exception If an error occurs during the process
     */
    public function clearAndFetchHotelsHasHotelThemes()
    {
        $API_NAME = "hotels";
        try {
            //Function to get all the entries from the table hotel has hotel theme  and then empty  the table 
            $count = HotelsHasHotelTheme::count();
            if ($count != 0) {
                $deletedFiles = HotelsHasHotelTheme::query()->delete();
                log::info($deletedFiles . " -> Records deleted successfully -> hotel has hotel themes  ");
            }
            //Function to get the data from API and then insert it into the table hotel has hotel theme 
            $response = Http::get($this->URL_PROVIDER_API . $API_NAME);

            if ($response->successful()) {
                $data = $response->json();
                Log::info('Data retrieved successfully -> hotel has hotel theme');
                foreach ($data as $key) {
                    $hotel = new HotelController;
                    $code = $key['code'];
                    $themes = $key['themes'];
                    foreach ($themes as $theme){
                        if($theme != null){
                            $data_theme['hotels_code']= $code;
                            $data_theme['hotel_themes_code'] = $theme;
                            $isValid = $hotel->insertHotelsHasHotelTheme($data_theme);
                            if ($isValid) {
                                Log::info('Data inserted successfully');
                            } else {
                                Log::error('Data insertion failed:' . $response->status());
                            }
                        }
                    }
                }
            } else {
                Log::error('Request failed with status code: ' . $response->status());
            }
        } catch (\Exception $e) {
            Log::critical($e->getMessage());
        }
    }

        /**
     * This function is designed to synchronize the hotel has chains data with an external API.
     * It clears the current hotel has chains data from the database and fetches the updated data from the API.
     * 
     * @return void
     * 
     * @throws \Exception If an error occurs during the process
     */
    public function clearAndFetchHotelsHasChains()
    {
        $API_NAME = "hotels";
        try {
            //Function to get all the entries from the table hotel has chains and then empty  the table 
            $count = HotelsHasChains::count();
            if ($count != 0) {
                $deletedFiles = HotelsHasChains::query()->delete();
                log::info($deletedFiles . " -> Records deleted successfully -> hotel has chains  ");
            }
            //Function to get the data from API and then insert it into the table hotel has chains 
            $response = Http::get($this->URL_PROVIDER_API . $API_NAME);

            if ($response->successful()) {
                $data = $response->json();
                Log::info('Data retrieved successfully -> hotel has chains');
                foreach ($data as $key) {
                    $hotel = new HotelController;
                    $code = $key['code'];
                    $chains = $key['chains'];
                    foreach ($chains as $chain){
                        if($chain != null){
                            $data_chain['hotels_code']= $code;
                            $data_chain['chains_code'] = $chain;
                            $isValid = $hotel->insertHotelsHasChains($data_chain);
                            if ($isValid) {
                                Log::info('Data inserted successfully');
                            } else {
                                Log::error('Data insertion failed:' . $response->status());
                            }
                        }
                    }
                }
            } else {
                Log::error('Request failed with status code: ' . $response->status());
            }
        } catch (\Exception $e) {
            Log::critical($e->getMessage());
        }
    }
        /**
     * This function is designed to synchronize the hotel has facilities data with an external API.
     * It clears the current hotel has chains data from the database and fetches the updated data from the API.
     * 
     * @return void
     * 
     * @throws \Exception If an error occurs during the process
     */
    public function clearAndFetchHotelsHasFacilities()
    {
        $API_NAME = "hotels";
        try {
            //Function to get all the entries from the table hotel has chains and then empty  the table 
            $count = HotelsHasFacility::count();
            if ($count != 0) {
                $deletedFiles = HotelsHasFacility::query()->delete();
                log::info($deletedFiles . " -> Records deleted successfully -> hotel has facilities  ");
            }
            //Function to get the data from API and then insert it into the table hotel has facilities 
            $response = Http::get($this->URL_PROVIDER_API . $API_NAME);

            if ($response->successful()) {
                $data = $response->json();
                Log::info('Data retrieved successfully -> hotel has facilities');
                foreach ($data as $key) {
                    $hotel = new HotelController;
                    $code = $key['code'];
                    $facilities = $key['facilities'];
                    foreach ($facilities as $facility){
                        if($facility != null){
                            $data_facility['hotels_code']= $code;
                            $data_facility['facilities_code'] = $facility;
                            $isValid = $hotel->insertHotelsHasFacilities($data_facility);
                            if ($isValid) {
                                Log::info('Data inserted successfully');
                            } else {
                                Log::error('Data insertion failed:' . $response->status());
                            }
                        }
                    }
                }
            } else {
                Log::error('Request failed with status code: ' . $response->status());
            }
        } catch (\Exception $e) {
            Log::critical($e->getMessage());
        }
    }

}
