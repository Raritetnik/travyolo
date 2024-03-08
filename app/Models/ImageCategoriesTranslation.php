<?php

namespace App\Models;

use App\Traits\HasCompositePrimaryKeyTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageCategoriesTranslation extends Model
{
    use HasCompositePrimaryKeyTrait;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string, string, string, date>
    */
    protected $fillable = [
        'language_country',
        'name',
        'image_categories_code',
        'updated_at',
    ];
    public $timestamps = false;

    protected $primaryKey = ['language_country', 'image_categories_code'];
    public $incrementing = false;
}
