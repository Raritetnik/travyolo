<?php

namespace Tests\Feature;

use App\Http\Controllers\FacilityController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;

use App\Models\Facility;
use App\Models\FacilitiesTranslation;
use App\Models\FacilityCategory;
use App\Models\FacilityCategoriesTranslation;
use App\Models\FacilitiesHasFacilityTheme;
use App\Models\FacilityThemesTranslation;
use App\Models\FacilityScope;
use App\Models\FacilityScopesTranslation;
use App\Models\FacilityTheme;
use App\Models\FacilityType;
use App\Models\FacilityTypesTranslation;

use Tests\TestCase;

class DeleteFacilityTest extends TestCase
{
    use DatabaseTransactions;
     /**
     * Function that test the deleteFacility method in the FacilityController
     * @return bool
     */
    public function testDeleteFacility(){
        $facility = Facility::factory()->create();
        $controller = new FacilityController;
        $status = $controller->deleteFacility($facility);
        $this->assertTrue($status);
        $this->assertDatabaseMissing('facilities', ['code' => $facility->code]);

    }

    /**
     * Function that test the deleteFacilityTranslation method in the FacilityController
     * @return bool
     */
    public function testDeleteFacilityTranslation(){
        $facilitiesTranslations = FacilitiesTranslation::factory()->create();
        $facilitiesTranslations->code = $facilitiesTranslations->facilities_code;

        $controller = new FacilityController;
        $status = $controller->deleteFacilityTranslation($facilitiesTranslations);
        $this->assertTrue($status);
        $this->assertDatabaseMissing('facilities_translations', ['facilities_code' => $facilitiesTranslations->facilities_code , 'language_country' => $facilitiesTranslations->language_country]);
    }

    /**
     * Function that test the deleteFacilityCategory method in the FacilityController
     * @return bool
     */
    public function testDeleteFacilityCategory(){
        
        $facilityCategory = FacilityCategory::factory()->create();
        $controller = new FacilityController;
        $status = $controller->deleteFacilityCategory($facilityCategory);
        $this->assertTrue($status);
        $this->assertDatabaseMissing('facility_categories', ['code' => $facilityCategory->code]);
    }

    /**
     * Function that test the deleteFacilityCategoryTranslation method in the FacilityController
     * @return bool
     */
    public function testDeleteFacilityCategoryTranslation(){
        $facilityCategoriesTranslation = FacilityCategoriesTranslation::factory()->create();
        $facilityCategoriesTranslation ->code = $facilityCategoriesTranslation->facility_categories_code;
        
        $controller = new FacilityController;
        $status = $controller->deleteFacilityCategoryTranslation($facilityCategoriesTranslation);
        $this->assertTrue($status);
        $this->assertDatabaseMissing('facility_categories_translations', ['facility_categories_code' => $facilityCategoriesTranslation->facility_categories_code , 'language_country' => $facilityCategoriesTranslation->language_country]);
    }

     /**
     * Function that test the deleteFacilityScope method in the FacilityController
     * @return bool
     */
    public function testDeleteFacilityScope(){
        $facilityScope = FacilityScope::factory()->create();
        $controller = new FacilityController;
        $status = $controller->deleteFacilityScope($facilityScope);
        $this->assertTrue($status);
        $this->assertDatabaseMissing('facility_scopes', ['code' => $facilityScope->code]);
    }

     /**
     * Function that test the deleteFacilityScopeTranslation method in the FacilityController
     * @return bool
     */
    public function testDeleteFacilityScopeTranslation(){
        $facilityScopesTranslation = FacilityScopesTranslation::factory()->create();
        $facilityScopesTranslation->code =  $facilityScopesTranslation->facility_scopes_code;

        $controller = new FacilityController;
        $status = $controller->deleteFacilityScopeTranslation($facilityScopesTranslation);
        $this->assertTrue($status);
        $this->assertDatabaseMissing('facility_scopes_translations', ['facility_scopes_code' => $facilityScopesTranslation->facility_scopes_code , 'language_country' => $facilityScopesTranslation->language_country]);

    }

    /**
     * Function that test the deleteFacilityTheme method in the FacilityController
     * @return bool
     */
    public function testDeleteFacilityTheme(){
        $facilityTheme = FacilityTheme::factory()->create();

        $controller = new FacilityController;
        $status = $controller->deleteFacilityTheme($facilityTheme);
        $this->assertTrue($status);
        $this->assertDatabaseMissing('facility_themes', ['code' => $facilityTheme->code]);
    }

    /**
     * Function that test the deleteFacilityThemeTranslation method in the FacilityController
     * @return bool
     */
    public function testDeleteFacilityThemeTranslation(){
        $facilityThemesTranslation = FacilityThemesTranslation::factory()->create();
        $facilityThemesTranslation->code = $facilityThemesTranslation->facility_themes_code;

        $controller = new FacilityController;
        $status = $controller->deleteFacilityThemeTranslation($facilityThemesTranslation);
        $this->assertTrue($status);
        $this->assertDatabaseMissing('facility_themes_translations', ['facility_themes_code' => $facilityThemesTranslation->facility_themes_code , 'language_country' => $facilityThemesTranslation->language_country]);

    }

     /**
     * Function that test the deleteFacilitiesHasFacilityTheme method in the FacilityController
     * @return bool
     */
    public function testDeleteFacilitiesHasFacilityTheme(){
        $facilityHasFacilityTheme = FacilitiesHasFacilityTheme::factory()->create();

        $controller = new FacilityController;
        $status = $controller->deleteFacilitiesHasFacilityTheme($facilityHasFacilityTheme);
        $this->assertTrue($status);
        $this->assertDatabaseMissing('facilities_has_facility_themes', ['facilities_code' => $facilityHasFacilityTheme->facilities_code , 'facility_themes_code' => $facilityHasFacilityTheme->facility_themes_code]);
    }


    /**
     * Function that test the deleteFacilityType method in the FacilityController
     * @return bool
     */
    public function testDeleteFacilityType(){
        $facilityType = FacilityType::factory()->create();

        $controller = new FacilityController;
        $status = $controller->deleteFacilityType($facilityType);
        $this->assertTrue($status);
    }

    /**
     * Function that test the deleteFacilityTypeTranslation method in the FacilityController
     * @return bool
     */
    public function testDeleteFacilityTypeTranslation(){
        $facilityTypeTranslation = FacilityTypesTranslation::factory()->create();
        $facilityTypeTranslation->code = $facilityTypeTranslation->facility_types_code;

        $controller = new FacilityController;
        $status = $controller->deleteFacilityTypeTranslation($facilityTypeTranslation);
        $this->assertTrue($status);
        $this->assertDatabaseMissing('facility_types_translations', ['facility_types_code' => $facilityTypeTranslation->facility_types_code , 'language_country' => $facilityTypeTranslation->language_country]);
    }
}

