<?php

namespace App\Models;

use App\Traits\HasCompositePrimaryKeyTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacilityTranslation extends Model
{
    use HasCompositePrimaryKeyTrait;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'language_country',
        'name',
        'facilities_code',
        'updated_at',
    ];

    public $timestamps = false;

    protected $primaryKey = ['language_country', 'facilities_code'];
    public $incrementing = false;
}
