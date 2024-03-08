<?php

namespace App\Models;

use App\Traits\HasCompositePrimaryKeyTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * The continentsTranslations represents a tranlation for a continent.
 * It extends the model class uses the HasFactory to create instances of your models with fake data for testing.
 *
 * this class has the following fillable attributes:
 * - language_country: The language and country code (e.g., 'fr_FR') for the translation.
 * - name: the translated name continents
 * - continents_code : The unique identifier for the related continents.
 * - updated_at : The timestamp when the continents_translations informations was last updated from the API.
 */

class ContinentsTranslation extends Model
{
    use HasFactory;
    use HasCompositePrimaryKeyTrait;

    protected $fillable = [

        'language_country',
        'name',
        'continents_code',
        'updated_at'
    ];

    public $timestamps = false;
    protected $primaryKey = ['language_country', 'continents_code'];
    public $incrementing = false;



}
