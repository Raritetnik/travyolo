<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'updated_at'
    ];

    public $timestamps = false;

    protected $primaryKey = 'code';
    public $incrementing = false;
}
