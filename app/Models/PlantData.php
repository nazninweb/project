<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlantData extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'number',
        'tag',
        'date',
        'notes',
        'location',
        'altitude',
        'latitude',
        'longitude',
        'images'
    ];
    

}