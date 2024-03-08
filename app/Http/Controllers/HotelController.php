<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\HotelsTranslation;
use App\Models\Chain;
use App\Models\Image;
use App\Models\ImageCategory;
use App\Models\ImageCategoriesTranslation;
use App\Models\HotelsHasHotelTheme;
use App\Models\HotelsHasChains;
use App\Models\HotelsHasFacility;
use App\Models\HotelTheme;
use App\Models\HotelThemesTranslation;
use App\Models\HotelType;
use App\Models\HotelTypesTranslation;
use App\Models\RTypesTranslation;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HotelController extends Controller
{


    /**
     * This function 'insertChain' is a public function for insert the data in the chain Model(Database)
     * @param array $data - An associative array containing information about the chain to be inserted.
     * @return bool - Returns true if the data was successfully inserted, false otherwise.
     */
    public function insertChain($data)
    {
        try {
            Chain::create([
                'code'       => $data['code'],
                'name'       => $data['name'],
                'updated_at' => now(),
            ]);
            return true;
        } catch (\Exception $e) {
            Log::error("Exception : " . $e->getMessage());
            return false;
        }
    }

    /**
     * This function 'updateChains' is a public function for update the data in the chains Model(Database)
     * @param array $data - An associative array containing information about the chains to be updated.
     * @return bool - Returns true if the data was successfully updated, false otherwise.
     */
    public function updateChain($data)
    {
        try {
            $chain = Chain::where('code', $data['code'])->first();

            if (isset($chain)) {
                $chain->update([
                    'name'       => $data['name'],
                    'updated_at' => now(),
                ]);
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            Log::error("Exception : " . $e->getMessage());
            return false;
        }
    }

    /**
     * This function 'deleteChains' is a public function for delete the data in the chain Model(Database)
     * @param array $data - An associative array containing information about the chain to be deleted.
     * @return bool - Returns true if the data was successfully deleted, false otherwise.
     */
    public function deleteChain($data)
    {
        try {
            $deleteChain = Chain::where('code', $data['code'])->first();

            if (isset($deleteChain)) {
                $deleteChain->delete();
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            Log::error("Exception : " . $e->getMessage());
            return false;
        }
    }

    /**
     * This function 'insertHotelType' is a public function for insert the data in the Hotel Type Model(Database)
     * @param array $data - An associative array containing information about the hotel type to be inserted.
     * @return bool - Returns true if the data was successfully inserted, false otherwise.
     */
    public function insertHotelType($data)
    {
        try {
            HotelType::create([
                'code'       => $data['code'],
                'name'       => $data['name'],
                'updated_at' => now(),
            ]);
            return true;
        } catch (\Exception $e) {
            Log::error("Exception : " . $e->getMessage());
            return false;
        }
    }

    /**
     * This function 'updateHotelType' is a public function for update the data in the hotel type Model(Database)
     * @param array $data - An associative array containing information about the hotel type to be updated.
     * @return bool - Returns true if the data was successfully updated, false otherwise.
     */
    public function updateHotelType($data)
    {
        try {
            $hotelType = HotelType::where('code', $data['code'])->first();

            if (isset($hotelType)) {
                $hotelType->update([
                    'name'       => $data['name'],
                    'updated_at' => now(),
                ]);
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            Log::error("Exception : " . $e->getMessage());
            return false;
        }
    }

    /**
     * This function 'deleteHotel type' is a public function for delete the data in the hotel type Model(Database)
     * @param array $data - An associative array containing information about the hotel type to be deleted.
     * @return bool - Returns true if the data was successfully deleted, false otherwise.
     */
    public function deleteHotelType($data)
    {
        try {
            $deleteHotelType = HotelType::where('code', $data['code'])->first();

            if (isset($deleteHotelType)) {
                $deleteHotelType->delete();
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            log::error("exception : " . $e->getMessage());
            return false;
        }
    }

    /**
     * This function 'insertHotelTypeTranslation' is a public function for insert the data in the Hotel Type translation Model(Database)
     * @param array $data - An associative array containing information about the hotel type translation to be inserted.
     * @return bool - Returns true if the data was successfully inserted, false otherwise.
     */
    public function insertHotelTypeTranslation($data)
    {
        try {
            HotelTypesTranslation::create([
                'language_country' => $data['language_country'],
                'name'             => $data['name'],
                'hotel_types_code' => $data['code'],
                'updated_at'       => now(),
            ]);
            return true;
        } catch (\Exception $e) {
            log::error("exception : " . $e->getMessage());
            return false;
        }
    }

    /**
     * This function 'updateHotelTypeTranslation' is a public function for update the data in the hotel type translation Model(Database)
     * @param array $data - An associative array containing information about the hotel type translation to be updated.
     * @return bool - Returns true if the data was successfully updated, false otherwise.
     */
    public function updateHotelTypeTranslation($data)
    {
        try {
            $hotelTypeTranslation = HotelTypesTranslation::where('hotel_types_code', $data['code'])
            ->where('language_country', $data['language_country'])->first();

            if (isset($hotelTypeTranslation)) {

                $hotelTypeTranslation->update([
                    'name'             => $data['name'],
                    'updated_at'       => now(),
                ]);
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            log::error("exception : " . $e->getMessage());
            return false;
        }
    }

    /**
     * This function 'deleteHotelTypeTranslation' is a public function for delete the data in the hotel type translation Model(Database)
     * @param array $data - An associative array containing information about the hotel type translation to be deleted.
     * @return bool - Returns true if the data was successfully deleted, false otherwise.
     */
    public function deleteHotelTypeTranslation($data)
    {

        try {
            $deleteHotelTypeTranslation = HotelTypesTranslation::where('hotel_types_code', $data['code'])
            ->where('language_country', $data['language_country'])->first();
            if (isset($deleteHotelTypeTranslation)) {
                $deleteHotelTypeTranslation->delete();
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            log::error("exception : " . $e->getMessage());
            return false;
        }
    }

    /**
     * This function 'insertHotel' is a public function for insert the data in the hotel Model(Database)
     * @param array $data - An associative array containing information about the hotel to be inserted.
     * @return bool - Returns true if the data was successfully inserted, false otherwise.
     */
    public function insertHotel($data)
    {
        try {
            Hotel::create([
                'code'                   => $data['code'],
                'master'                 => $data['master'],
                'name'                   => $data['name'],
                'zipcode'                => $data['zipcode'],
                'address'                => $data['address'],
                'latitude'               => $data['latitude'],
                'longitude'              => $data['longitude'],
                'stars'                  => $data['stars'],
                'nr_rooms'               => $data['nr_rooms'],
                'nr_restaurants'         => $data['nr_restaurants'],
                'nr_bars'                => $data['nr_bars'],
                'nr_halls'               => $data['nr_halls'],
                'yearbuilt'              => $data['year_built'],
                'checkin_from'           => $data['checkin_from'],
                'checkout_to'            => $data['checkout_to'],

                'checkout_from'          => $data['checkout_from'],
                'checkin_to'             => $data['checkin_to'],
                'gmt_offset'             => $data['gmt_offset'],
                'email'                  => $data['email'],
                'phone'                  => $data['phone'],
                'currencycode'           => $data['currencycode'],
                'availability_score'     => $data['availability_score'],
                'hotel_score'            => $data['hotel_score'],
                'book_score'             => $data['book_score'],
                'room_amenity'           => $data['room_amenity'],

                'hotel_information'      => $data['hotel_information'],
                'hotel_introduction'     => $data['hotel_introduction'],
                'location_information'   => $data['location_information'],
                'attraction_information' => $data['attraction_information'],
                'hotel_amenity'          => $data['hotel_amenity'],
                'destinations_code'      => $data['destination'],
                'hotel_types_code'       => $data['hotel_type'],
                'updated_at'             => now(),
            ]);
            return true;
        } catch (\Exception $e) {
            log::error("exception : " . $e->getMessage());
            return false;
        }
    }



    /**
     * This function 'updateHotel' is a public function for update the data in the hotel  Model(Database)
     * @param array $data - An associative array containing information about the hotel  to be updated.
     * @return bool - Returns true if the data was successfully updated, false otherwise.
     */

    public function updateHotel($data)
    {
        try {
            $hotel = Hotel::where('code', $data['code'])->first();

            if (isset($hotel)) {
                $hotel->update([
                    'master'                 => $data['master'],
                    'name'                   => $data['name'],
                    'zipcode'                => $data['zipcode'],
                    'address'                => $data['address'],
                    'latitude'               => $data['latitude'],
                    'longitude'              => $data['longitude'],
                    'stars'                  => $data['stars'],
                    'nr_rooms'               => $data['nr_rooms'],
                    'nr_restaurants'         => $data['nr_restaurants'],
                    'nr_bars'                => $data['nr_bars'],
                    'nr_halls'               => $data['nr_halls'],
                    'yearbuilt'              => $data['year_built'],
                    'checkin_from'           => $data['checkin_from'],
                    'checkout_to'            => $data['checkout_to'],

                    'checkout_from'          => $data['checkout_from'],
                    'checkin_to'             => $data['checkin_to'],
                    'gmt_offset'             => $data['gmt_offset'],
                    'email'                  => $data['email'],
                    'phone'                  => $data['phone'],
                    'currencycode'           => $data['currencycode'],
                    'availability_score'     => $data['availability_score'],
                    'hotel_score'            => $data['hotel_score'],
                    'book_score'             => $data['book_score'],
                    'room_amenity'           => $data['room_amenity'],

                    'hotel_information'      => $data['hotel_information'],
                    'hotel_introduction'     => $data['hotel_introduction'],
                    'location_information'   => $data['location_information'],
                    'attraction_information' => $data['attraction_information'],
                    'hotel_amenity'          => $data['hotel_amenity'],
                    'destinations_code'      => $data['destination'],
                    'hotel_types_code'       => $data['hotel_type'],
                    'updated_at'             => now(),
                ]);
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            log::error("exception : " . $e->getMessage());
            return false;
        }
    }



    /**
     * This function 'deleteHotel' is a public function for delete the data in the hotel Model(Database)
     * @param array $data - An associative array containing information about the hotel to be deleted.
     * @return bool - Returns true if the data was successfully deleted, false otherwise.
     */
    public function deleteHotel($data)
    {
        try {
            $deleteHotel = hotel::where('code', $data['code'])->first();

            if (isset($deleteHotel)) {
                $deleteHotel->delete();
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            log::error("exception : " . $e->getMessage());
            return false;
        }
    }


    /**
     * This function 'insertHotelTranslation' is a public function for insert the data in the Hotel translation Model(Database)
     * @param array $data - An associative array containing information about the hotel translation to be inserted.
     * @return bool - Returns true if the data was successfully inserted, false otherwise.
     */
    public function insertHotelTranslation($data)
    {
        try {
            HotelsTranslation::create([
                'language_country'       => $data['language_country'],
                'hotel_information'      => $data['hotel_information'],
                'hotel_introduction'     => $data['hotel_introduction'],
                'location_information'   => $data['location_information'],
                'attraction_information' => $data['attraction_information'],
                'hotel_amenity'          => $data['hotel_amenity'],
                //'room_amenity'           => $data['room_amenity'],
                'hotels_code'            => $data['code'],
                'updated_at'             => now(),
            ]);
            return true;
        } catch (\Exception $e) {
            log::error("exception : " . $e->getMessage());
            return false;
        }
    }

    /**
     * This function 'updateHotelTranslation' is a public function for update the data in the hotel translation Model(Database)
     * @param array $data - An associative array containing information about the hotel  translation to be updated.
     * @return bool - Returns true if the data was successfully updated, false otherwise.
     */
    public function updateHotelTranslation($data)
    {
        try {
            $hotelTranslation = HotelsTranslation::where('hotels_code', $data['hotels_code'])
            ->where('language_country', $data['language_country'])->first();

            if (isset($hotelTranslation)) {
                $hotelTranslation->update([
                    'hotel_information'      => $data['hotel_information'],
                    'hotel_introduction'     => $data['hotel_introduction'],
                    'location_information'   => $data['location_information'],
                    'attraction_information' => $data['attraction_information'],
                    'hotel_amenity'          => $data['hotel_amenity'],
                    //'room_amenity'         => $data['room_amenity'],
                    'updated_at'             => now(),
                ]);
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            log::error("exception : " . $e->getMessage());
            return false;
        }
    }

    /**
     * This function 'deleteHotelTranslation' is a public function for delete the data in the hotel translation Model(Database)
     * @param array $data - An associative array containing information about the hotel  translation to be deleted.
     * @return bool - Returns true if the data was successfully deleted, false otherwise.
     */
    public function deleteHotelTranslation($data)
    {   
        try {
            $deleteHotelTranslation = HotelsTranslation::where('hotels_code', $data['code'])
            ->where('language_country', $data['language_country'])->first();

            if (isset($deleteHotelTranslation)) {
                $deleteHotelTranslation->delete();
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            log::error("exception : " . $e->getMessage());
            return false;
        }
    }

    /**
     * This function 'insertHotelTheme' is a public function for insert the data in the Hotel Theme Model(Database)
     * @param array $data - An associative array containing information about the hotel theme to be inserted.
     * @return bool - Returns true if the data was successfully inserted, false otherwise.
     */
    public function insertHotelTheme($data)
    {
        try {
            HotelTheme::create([
                'code'       => $data['code'],
                'name'       => $data['name'],
                'updated_at' => now(),
            ]);
            return true;
        } catch (\Exception $e) {
            log::error("exception : " . $e->getMessage());
            return false;
        }
    }

    /**
     * This function 'updateHotelTheme' is a public function for update the data in the hotel theme Model(Database)
     * @param array $data - An associative array containing information about the hotel theme to be updated.
     * @return bool - Returns true if the data was successfully updated, false otherwise.
     */
    public function updateHotelTheme($data)
    {
        try {
            $hotelTheme = HotelTheme::where('code', $data['code'])->first();
            if (isset($hotelTheme)) {
                $hotelTheme->update([
                    'name'       => $data['name'],
                    'updated_at' => now(),
                ]);
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            log::error("exception : " . $e->getMessage());
            return false;
        }
    }

    /**
     * This function 'deleteHotelTheme' is a public function for delete the data in the hotel theme Model(Database)
     * @param array $data - An associative array containing information about the hotel theme to be deleted.
     * @return bool - Returns true if the data was successfully deleted, false otherwise.
     */
    public function deleteHotelTheme($data)
    {
        try {
            $deleteHotelTheme = HotelTheme::where('code', $data['code'])->first();

            if (isset($deleteHotelTheme)) {
                $deleteHotelTheme->delete();
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            log::error("exception : " . $e->getMessage());
            return false;
        }
    }


    /**
     * This function 'insertHotelThemeTranslation' is a public function for insert the data in the Hotel Theme translation Model(Database)
     * @param array $data - An associative array containing information about the hotel theme translation to be inserted.
     * @return bool - Returns true if the data was successfully inserted, false otherwise.
     */
    public function insertHotelThemeTranslation($data)
    {
        try {
            HotelThemesTranslation::create([
                'language_country'      => $data['language_country'],
                'name'                  => $data['name'],
                'hotel_themes_code'     => $data['code'],
                'updated_at'            => now(),

            ]);
            return true;
        } catch (\Exception $e) {
            log::error("exception : " . $e->getMessage());
            return false;
        }
    }

    /**
     * This function 'update Hotel theme Translation' is a public function for update the data in the hotel theme translation Model(Database)
     * @param array $data - An associative array containing information about the hotel theme translation to be updated.
     * @return bool - Returns true if the data was successfully updated, false otherwise.
     */
    public function updateHotelThemeTranslation($data)
    {
        try {
            $hotelThemesTranslation = HotelThemesTranslation::where('hotel_themes_code', $data['code'])
            ->where('language_country', $data['language_country'])->first();

            if (isset($hotelThemesTranslation)) {
                $hotelThemesTranslation->update([
                    'name'             => $data['name'],
                    'updated_at'       => now(),
                ]);
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            log::error("exception : " . $e->getMessage());
            return false;
        }
    }

    /**
     * This function 'deleteHotelThemeTranslation' is a public function for delete the data in the hotel theme translation Model(Database)
     * @param array $data - An associative array containing information about the hotel theme translation to be deleted.
     * @return bool - Returns true if the data was successfully deleted, false otherwise.
     */
    public function deleteHotelThemeTranslation($data)
    {
        try {
            $deleteHotelThemesTranslation = HotelThemesTranslation::where('hotel_themes_code', $data['code'])
            ->where('language_country', $data['language_country'])->first();

            if (isset($deleteHotelThemesTranslation)) {
                $deleteHotelThemesTranslation->delete();
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            log::error("exception : " . $e->getMessage());
            return false;
        }
    }

    /**
     * Function for insert the data in the Hotels Has Hotel Theme Model(Database)
     * @param array $data - An associative array containing information to be inserted in the DB.
     * @return bool - Returns true if the data was successfully inserted, false otherwise.
     */
    public function insertHotelsHasHotelTheme($data)
    {
        try {
            HotelsHasHotelTheme::create([
                'hotels_code'       => $data['hotels_code'],
                'hotel_themes_code' => $data['hotel_themes_code'],
            ]);
            return true;
        } catch (\Exception $e) {
            log::error("exception : " . $e->getMessage());
            return false;
        }
    }

    /**
     * Function for update the data in the HotelsHasHotelTheme Model(Database)
     * @param array $data - An associative array containing information to be inserted in the DB.
     * @return bool - Returns true if the data was successfully updated, false otherwise.
     */

    public function updateHotelsHasHotelTheme($data)
    {
        try {
            $hotelsHasHotelTheme = HotelsHasHotelTheme::where('hotels_code', $data['hotels_code'])
            ->where('hotel_themes_code', $data['hotel_themes_code'])->first();

            if (isset($hotelsHasHotelTheme)) {
                $hotelsHasHotelTheme->update([
                    'hotels_code'       => $data['hotels_code'],
                    'hotel_themes_code' => $data['hotel_themes_code'],
                ]);
            } else {
                return false;
            }
            return true;
        } catch (\Exception $e) {
            log::error("exception : " . $e->getMessage());
            return false;
        }
    }

    /**
     * Function for delete the data in the hotel has hotel theme Model(Database)
     * @param array $data - An associative array containing information to be inserted in the DB.
     * @return bool - Returns true if the data was successfully deleted, false otherwise.
     */
    public function deleteHotelsHasHotelTheme($data)
    {
        try {
            $deleteHotelsHasHotelTheme = HotelsHasHotelTheme::where('hotels_code', $data['hotels_code'])
            ->where('hotel_themes_code', $data['hotel_themes_code'])->first();

            if (isset($deleteHotelsHasHotelTheme)) {
                $deleteHotelsHasHotelTheme->delete();
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            log::error("exception : " . $e->getMessage());
            return false;
        }
    }

    /**
     * Function for insert the data in the Hotels Has chains Model(Database)
     * @param array $data - An associative array containing information to be inserted in the DB.
     * @return bool - Returns true if the data was successfully inserted, false otherwise.
     */
    public function insertHotelsHasChains($data)
    {
        try {
            HotelsHasChains::create([
                'hotels_code'       => $data['hotels_code'],
                'chains_code'       => $data['chains_code'],
            ]);
            return true;
        } catch (\Exception $e) {
            log::error("exception : " . $e->getMessage());
            return false;
        }
    }

        /**
     * Function for update the data in the HotelsHasChains Model(Database)
     * @param array $data - An associative array containing information to be inserted in the DB.
     * @return bool - Returns true if the data was successfully updated, false otherwise.
     */
    public function updateHotelsHasChains($data)
    {
        try {
            $hotelsHasChains = HotelsHasChains::where('hotels_code', $data['hotels_code'])
            ->where('chains_code', $data['chains_code'])->first();

            if (isset($hotelsHasChains)) {
                $hotelsHasChains->update([
                    'hotels_code'       => $data['hotels_code'],
                    'chains_code'       => $data['chains_code'],
                ]);
            } else {
                return false;
            }
            return true;
        } catch (\Exception $e) {
            log::error("exception : " . $e->getMessage());
            return false;
        }
    }

    /**
     * Function for delete the data in the hotel has chains Model(Database)
     * @param array $data - An associative array containing information to be inserted in the DB.
     * @return bool - Returns true if the data was successfully deleted, false otherwise.
     */
    public function deleteHotelsHasChains($data)
    {
        try {
            $deleteHotelsHasChains = HotelsHasChains::where('hotels_code', $data['hotels_code'])
            ->where('chains_code', $data['chains_code'])->first();

            if (isset($deleteHotelsHasChains)) {
                $deleteHotelsHasChains->delete();
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            log::error("exception : " . $e->getMessage());
            return false;
        }
    }

     /**
     * Function for insert the data in the Hotels Has facilities Model(Database)
     * @param array $data - An associative array containing information to be inserted in the DB.
     * @return bool - Returns true if the data was successfully inserted, false otherwise.
     */
    public function insertHotelsHasFacilities($data)
    {
        try {
            HotelsHasFacility::create([
                'hotels_code'       => $data['hotels_code'],
                'facilities_code'   => $data['facilities_code'],
            ]);
            return true;
        } catch (\Exception $e) {
            log::error("exception : " . $e->getMessage());
            return false;
        }
    }

        /**
     * Function for update the data in the HotelsHasFacilities Model(Database)
     * @param array $data - An associative array containing information to be inserted in the DB.
     * @return bool - Returns true if the data was successfully updated, false otherwise.
     */
    public function updateHotelsHasFacilities($data)
    {
        try {
            $hotelsHasFacilities = HotelsHasFacility::where('hotels_code', $data['hotels_code'])
            ->where('facilities_code', $data['facilities_code'])->first();

            if (isset($hotelsHasFacilities)) {
                $hotelsHasFacilities->update([
                    'hotels_code'       => $data['hotels_code'],
                    'facilities_code'   => $data['facilities_code'],
                ]);
            } else {
                return false;
            }
            return true;
        } catch (\Exception $e) {
            log::error("exception : " . $e->getMessage());
            return false;
        }
    }

      /**
     * Function for delete the data in the hotel has chains Model(Database)
     * @param array $data - An associative array containing information to be inserted in the DB.
     * @return bool - Returns true if the data was successfully deleted, false otherwise.
     */
    public function deleteHotelsHasFacilities($data)
    {
        try {
            $deleteHotelsHasFacilities = HotelsHasFacility::where('hotels_code', $data['hotels_code'])
            ->where('facilities_code', $data['facilities_code'])->first();

            if (isset($deleteHotelsHasFacilities)) {
                $deleteHotelsHasFacilities->delete();
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            log::error("exception : " . $e->getMessage());
            return false;
        }
    }

    /**
     * Function for insert the data in the ImageCategories Model(Database)
     * @param array $data - An associative array containing information to be inserted in the DB.
     * @return bool - Returns true if the data was successfully inserted, false otherwise.
     */
    public function insertImageCategory($data)
    {
        try {
            ImageCategory::create([
                'code'       => $data['code'],
                'name'       => $data['name'],
                'updated_at' => now(),
            ]);
            return true;
        } catch (\Exception $e) {
            log::error("exception : " . $e->getMessage());
            return false;
        }
    }

    /**
     * Function for update the data in the ImageCategories Model(Database)
     * @param array $data - An associative array containing information to be inserted in the DB.
     * @return bool - Returns true if the data was successfully updated, false otherwise.
     */
    public function updateImageCategory($data)
    {
        try {
            $imageCategory = ImageCategory::where('code', $data['code'])->first();

            if (isset($imageCategory)) {
                $imageCategory->update([
                    'name'       => $data['name'],
                    'updated_at' => now(),
                ]);
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            log::error("exception : " . $e->getMessage());
            return false;
        }
    }

    /**
     * Function for delete the data in the ImageCategories Model(Database)
     * @param array $data - An associative array containing information to be inserted in the DB.
     * @return bool - Returns true if the data was successfully deleted, false otherwise.
     */
    public function deleteImageCategory($data)
    {
        try {
            $deleteImageCategory = ImageCategory::where('code', $data['code'])->first();

            if (isset($deleteImageCategory)) {
                $deleteImageCategory->delete();
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            log::error("exception : " . $e->getMessage());
            return false;
        }
    }


    /**
     * Function for insert the data in the ImageCategories translations Model(Database)
     * @param array $data - An associative array containing information to be inserted in the DB.
     * @return bool - Returns true if the data was successfully inserted, false otherwise.
     */
    public function insertImageCategoriesTranslation($data)
    {
        try {
            ImageCategoriesTranslation::create([
                'language_country'      => $data['language_country'],
                'name'                  => $data['name'],
                'image_categories_code' => $data['code'],
                'updated_at'            => now(),

            ]);
            return true;
        } catch (\Exception $e) {
            log::error("exception : " . $e->getMessage());
            return false;
        }
    }

    /**
     * Function for update the data in the ImageCategoriestranslation Model(Database)
     * @param array $data - An associative array containing information to be inserted in the DB.
     * @return bool - Returns true if the data was successfully updated, false otherwise.
     */
    public function updateImageCategoriesTranslation($data)
    {
        try {
            $imageCategoriesTranslation = ImageCategoriesTranslation::where('image_categories_code', $data['image_categories_code'])
            ->where('language_country', $data['language_country'])->first();

            if (isset($imageCategoriesTranslation)) {
                $imageCategoriesTranslation->update([
                    'name'             => $data['name'],
                    'updated_at'       => now(),
                ]);
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            log::error("exception : " . $e->getMessage());
            return false;
        }
    }

    /**
     * Function for delete the data in the ImageCategories translation Model(Database)
     * @param array $data - An associative array containing information to be inserted in the DB.
     * @return bool - Returns true if the data was successfully deleted, false otherwise.
     */
    public function deleteImageCategoriesTranslation($data)
    {
        try {
            $deleteImageCategoriesTranslation = ImageCategoriesTranslation::where('image_categories_code', $data['code'])
            ->where('language_country', $data['language_country'])->first();

            if ($deleteImageCategoriesTranslation) {
                $deleteImageCategoriesTranslation->delete();
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            log::error("exception : " . $e->getMessage());
            return false;
        }
    }

    /**
     * Function for insert the data in the Image Model(Database)
     * @param array $data - An associative array containing information to be inserted in the DB.
     * @return bool - Returns true if the data was successfully inserted, false otherwise.
     */
    public function insertImages($data)
    {
        try {
            Image::create([
                'tag'                   => $data['tag'],
                'original'              => $data['original'],
                'large'                 => $data['large'],
                'small'                 => $data['small'],
                'mid'                   => $data['mid'],
                'image_categories_code' => $data['image_categories_code'],
                'room_categories_code'  => $data['room_categories_code'],
                'hotels_code'           => $data['hotels_code'],
                'updated_at'            => $data['updated_at'],
            ]);
            return true;
        } catch (\Exception $e) {
            log::error("exception : " . $e->getMessage());
            return false;
        }
    }

    /**
     * Function for update the data in the Images Model(Database)
     * @param array $data - An associative array containing information to be inserted in the DB.
     * @return bool - Returns true if the data was successfully updated, false otherwise.
     */
    public function updateImages($data)
    {   
        try {
            $image = Image::where('original', $data['original'])
        ->where('hotels_code', $data['hotels_code'])->first();

            if (isset($image)) {
                $image->update([
                'tag'                   => $data['tag'],
                'large'                 => $data['large'],
                'small'                 => $data['small'],
                'mid'                   => $data['mid'],
                'image_categories_code' => $data['image_categories_code'],
                'room_categories_code'  => $data['room_categories_code'],
                'updated_at'            => $data['updated_at'],
                ]);
                return true;
             } else {
                 return false;
             }
        } catch (\Exception $e) {
            log::error("exception : " . $e->getMessage());
            return false;
        }
    }

    /**
     * Function for delete the data in the Images Model(Database)
     * @param array $data - An associative array containing information to be inserted in the DB.
     * @return bool - Returns true if the data was successfully deleted, false otherwise.
     */
    public function deleteImages($data)
    {
        try {
            $deleteImage = Image::where('original', $data['original'])
            ->where('hotels_code', $data['hotels_code'])->first();
            
            if (isset($deleteImage)) {
                Image::where('original', $data['original'])
            ->where('hotels_code', $data['hotels_code'])->delete();
               
                return true;
            }
             else {
                return false;
            }
        } catch (\Exception $e) {
            log::error("exception : " . $e->getMessage());
            return false;
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotel $hotel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel)
    {
        //
    }
}
