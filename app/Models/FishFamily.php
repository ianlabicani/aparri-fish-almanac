<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FishFamily extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function fish()
    {
        return $this->hasMany(Fish::class, 'fish_family_id');
    }
}
