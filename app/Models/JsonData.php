<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JsonData extends Model
{
    use HasFactory;
    protected $fillable=[
        
        'tag',
        'date',
        'notes',
       'taxon',
        'altitude',
        'latitude',
       'longitude'
       
    ];

    protected $casts=[
        
       'answers' => 'array',
       'images' => 'array'
    ];
    

}

