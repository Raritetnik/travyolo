<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * The Country class represents a country.
 * It extends the Model class and uses the HasFactory to create instances of your models with fake data for testing.
 *
 * This class has the following fillable attributes:
 * - code : Code of the country.
 * - name : name of the country.
 * - continents_code : The unique identifier for the related continent.
 * - updated_at: The timestamp when the countries information was last updated from the API
 *
 */
class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'continents_code',
        'updated_at'
    ];
    public $timestamps = false;

    protected $primaryKey = 'code';
    public $incrementing = false;

}
