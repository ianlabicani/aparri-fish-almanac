<?php

namespace Database\Seeders;

use App\Models\FishFamily;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FishFamilySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $families = [
            'acanthuridae',
            'anguillidae',
            'ariidae',
            'aulostumidae',
            'balistidae',
            'belonidae',
            'bothidae',
            'caesionidae',
            'carangidae',
            'centropomidae',
            'chaetodontidae',
            'chanidae',
            'chirocentridae',
            'coryphaenidae',
            'cynoglossidae ',
            'diodontidae',
            'drepanidae',
            'elopidae',
            'ephippidae',
            'engraulidae',
            'exocoetidae',
        ];

        foreach ($families as $family) {
            FishFamily::create(['name' => $family]);
        }
    }
}
