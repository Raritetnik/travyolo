<?php

namespace App\Models;

use App\Traits\HasCompositePrimaryKeyTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacilitiesHasFacilityTheme extends Model
{
    use HasFactory;
    use HasCompositePrimaryKeyTrait;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'facilities_code',
        'facility_themes_code',
    ];

    public $timestamps = false;
    protected $primaryKey = ['facilities_code', 'facility_themes_code'];
    public $incrementing = false;
}
