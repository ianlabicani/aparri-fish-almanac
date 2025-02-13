<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fish extends Model
{

    /** @use HasFactory<\Database\Factories\FishFactory> */
    use HasFactory;
    protected $fillable = [
        'scientific_name',
        'english_name',
        'local_name',
        'fishing_ground',
    ];
}
