<?php

namespace App\Models;

use App\Traits\HasCompositePrimaryKeyTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacilitiesTranslation extends Model
{
    use HasFactory;
    use HasCompositePrimaryKeyTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'language_country',
        'name',
        'updated_at',
        'facilities_code',
    ];

    public $timestamps = false;

    protected $primaryKey = ['language_country', 'facilities_code'];
    public $incrementing = false;
}
