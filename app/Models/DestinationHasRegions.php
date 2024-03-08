<?php

namespace App\Models;

use App\Traits\HasCompositePrimaryKeyTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinationHasRegions extends Model
{
    use HasFactory;
    use HasCompositePrimaryKeyTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'destinations_code',
        'regions_code',
    ];

    public $timestamps = false;
    protected $primaryKey = ['destinations_code', 'regions_code'];
    public $incrementing = false;

}
