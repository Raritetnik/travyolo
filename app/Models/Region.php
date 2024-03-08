<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * The Region class represents a geographical region.
 * It extends the Model class and uses the HasFactory to create instances of your models with fake data for testing.
 *
 * This class has the following fillable attributes:
 * - code: code of the region
 * - name: Name of the region
 * - kind: Kind of the region (possible contents are : province, state, island, other)
 * - state_code : State code of the region.
 * - countries_code: The unique identifier for the related country.
 * - updated_at: The timestamp when the region information was last updated from the API.
 *
 */
class Region extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'name',
        'kind',
        'state_code',
        'countries_code',
        'updated_at'

    ];
    public $timestamps = false;

    protected $primaryKey = 'code';
    public $incrementing = false;
}
