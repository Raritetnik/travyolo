<?php

namespace App\Models;
use App\Traits\HasCompositePrimaryKeyTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    use HasCompositePrimaryKeyTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<string, string, string, string, string, date, string, string>
    */
    protected $fillable = [
        'tag',
        'original',
        'large',
        'small',
        'mid',
        'updated_at',
        'image_categories_code',
        'room_categories_code',
        'hotels_code'
    ];
    
    public $timestamps = false;
    protected $primaryKey = ['original', 'hotels_code'];
    public $incrementing = false;
}
