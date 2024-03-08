<?php

namespace App\Models;

use App\Traits\HasCompositePrimaryKeyTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacilityScopesTranslation extends Model
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
        'facility_scopes_code',
        'updated_at',
    ];

    public $timestamps = false;

    protected $primaryKey = ['language_country', 'facility_scopes_code'];
    public $incrementing = false;

}
