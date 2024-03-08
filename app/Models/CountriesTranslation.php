<?php

namespace App\Models;

use App\Traits\HasCompositePrimaryKeyTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * The CountriesTranslation represents a translation for a country.
 * It extends the Model class and uses the HasFactory to create instances of your models with fake data for testing.
 *
 * this class has the following fillable atributes:
 * - The language and country code (e.g., 'fr_FR') for the translation.
 * - name: the translated name of the country.
 * - countries_code: The unique identifier for the related country.
 * - updated_at: The timestamp when the countries_translations information was last updated from the API.
 *
 */

class CountriesTranslation extends Model
{
    use HasFactory;
    use HasCompositePrimaryKeyTrait;
    protected $fillable = [
        'language_country',
        'name',
        'countries_code',
        'updated_at'

    ];
    public $timestamps = false;

    protected $primaryKey = ['language_country', 'countries_code'];
    public $incrementing = false;
}
