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
        'description',
        'image'
    ];


    public function getImageUrl()
    {
        return $this->image ? asset('storage/' . $this->image) : asset('images/img-placeholder.png');
    }


    public function family()
    {
        return $this->belongsTo(FishFamily::class, 'fish_family_id');
    }

}
