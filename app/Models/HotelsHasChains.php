<?php

namespace App\Models;

use App\Traits\HasCompositePrimaryKeyTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelsHasChains extends Model
{
    use HasCompositePrimaryKeyTrait;
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'hotels_code',
        'chains_code',
    ];
    public $timestamps = false;
    protected $primaryKey = ['hotels_code', 'chains_code'];
    public $incrementing = false;
}
