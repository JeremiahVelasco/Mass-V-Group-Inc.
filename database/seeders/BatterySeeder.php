<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Battery;
class BatterySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $batteries = [
            [
                'image' => '/storage/assets/MegaForce_PLUS.png',
                'name' => 'MegaForce Plus',
                'mvgi' => '12364',
                'jis_type' => '65422',
                'warranty' => '12 MONTHS',
                'description1' => 'Lorem ipsum dolor sit amet consectetur.',
                'description2' => 'Lorem ipsum dolor sit amet consectetur.',
                'description3' => 'Lorem ipsum dolor sit amet consectetur.',
                'saved_slot' =>1, 
            ],
            [
                'image' => '/storage/assets/MegaForce_LM.png',
                'name' => 'MegaForce Low Maintenance',
                'mvgi' => '12274',
                'jis_type' => '65127',
                'warranty' => '6 MONTHS / 12 MONTHS',
                'description1' => 'Lorem ipsum dolor sit amet consectetur.',
                'description2' => 'Lorem ipsum dolor sit amet consectetur.',
                'description3' => 'Lorem ipsum dolor sit amet consectetur.',
                'saved_slot' => 2,
            ],
            [
                'image' => '/storage/assets/MegaForce_MF.png',
                'name' => 'MegaForce Maintenance Free',
                'mvgi' => '24764',
                'jis_type' => '15592',
                'warranty' => '12 MONTHS',
                'description1' => 'Lorem ipsum dolor sit amet consectetur.',
                'description2' => 'Lorem ipsum dolor sit amet consectetur.',
                'description3' => 'Lorem ipsum dolor sit amet consectetur.',
                'saved_slot' => 3,
            ],
            [
                'image' => '/storage/assets/Primera.png',
                'name' => 'Primera Low Maintenance',
                'mvgi' => '62521',
                'jis_type' => '656727',
                'warranty' => '6 MONTHS',
                'description1' => 'Lorem ipsum dolor sit amet consectetur.',
                'description2' => 'Lorem ipsum dolor sit amet consectetur.',
                'description3' => 'Lorem ipsum dolor sit amet consectetur.',
                'saved_slot' => 4,
            ],
            [
                'image' => '/storage/assets/SuperKing.png',
                'name' => 'Superking Low Maintenance',
                'mvgi' => '12364',
                'jis_type' => '65422',
                'warranty' => '12 MONTHS',
                'description1' => 'Lorem ipsum dolor sit amet consectetur.',
                'description2' => 'Lorem ipsum dolor sit amet consectetur.',
                'description3' => 'Lorem ipsum dolor sit amet consectetur.',
                'saved_slot' => 0
            ]
        ];
        foreach($batteries as $battery){
            Battery::create($battery);
        }
    }
}
