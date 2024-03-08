<?php

namespace App\Models;

use App\Traits\HasCompositePrimaryKeyTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * The MealTypesTranslation class represents a translation for a room type.
 * It extends the model class uses the HasFactory to create instances of your models with fake data for testing.
 *
 * - langague_country : The language and country code (e.g., 'fr_FR') for the translation.
 *  - name: The translated name of meal type.
 * - meal_types_code : The unique identifier for the related meal type.
 * - updated_at: The timestamp when the countries_translations information was last updated from the API.
 *
 */
class MealTypesTranslation extends Model
{
    use HasCompositePrimaryKeyTrait;
    use HasFactory;

    protected $fillable = [
       'language_country',
       'name',
       'meal_types_code',
       'updated_at'

    ];

    public $timestamps = false;

    protected $primaryKey = ['language_country', 'meal_types_code'];
    public $incrementing = false;

}
