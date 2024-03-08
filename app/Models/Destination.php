<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * The Destination class represents a destinations location.
 * It extends the Model class and uses the HasFactory to create instances of your models with fake data for testing.
 *
 * This class has the following fillable attributes:
 * - code: Code of the destination
 * - name : Name of the destination.
 * - parent : Parent destination code (destinations)
 * - countries_code : The unique identifier for the related country.
 * - latitude : Geographic coordinate of the destination centre that specifies north-south position of destinations point on the Earth's surface.
 * - longitude : Geographic coordinate of the destination centre that specifies north-south position of destinations point on the Earth's surface.
 * - regions_code: The unique identifier for the related region.
 * - updated_at: The timestamp when the destinations information was last updated from the API
 *
 */
class Destination extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'name',
        'parent',
        'countries_code',
        'latitude',
        'longitude',
        'updated_at'

    ];
    public $timestamps = false;

    protected $primaryKey = 'code';
    public $incrementing = false;
}
