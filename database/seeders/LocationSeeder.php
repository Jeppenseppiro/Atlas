<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Location::create([
            'address' => 'PASAR Admin',
            'latitude' => 10.892121664209077,
            'longitude' => 124.43895358973826
        ]);

        Location::create([
            'address' => 'PASAR Hospital',
            'latitude' => 10.891737344205044,
            'longitude' => 124.44039870079118
        ]);

        Location::create([
            'address' => 'PASAR Skill Centre',
            'latitude' => 10.8907986716582,
            'longitude' => 124.44004972489873
        ]);

        Location::create([
            'address' => 'PMG',
            'latitude' => 10.893028466816013,
            'longitude' => 124.43860906778971
        ]);

        Location::create([
            'address' => 'MEMS BLDG',
            'latitude' => 10.893478075013633,
            'longitude' => 124.43860455687
        ]);

        Location::create([
            'address' => 'Laboratory',
            'latitude' => 10.89335183041587,
            'longitude' => 124.43811061116062
        ]);

        Location::create([
            'address' => 'Warehouse',
            'latitude' => 10.892540237505978,
            'longitude' => 124.43781000935466
        ]);

        Location::create([
            'address' => 'Refinery',
            'latitude' => 10.893288097688568,
            'longitude' => 124.43569225994447
        ]);

        Location::create([
            'address' => 'Dust Packing House',
            'latitude' => 10.891979449005593,
            'longitude' => 124.43477384448133
        ]);

        Location::create([
            'address' => 'Smelter',
            'latitude' => 10.892511929338806,
            'longitude' => 124.43527781738524
        ]);

        Location::create([
            'address' => 'Production Building',
            'latitude' => 10.892136101444754,
            'longitude' => 124.43710707132666
        ]);

        Location::create([
            'address' => 'Maintenance BLDG & Machine Shop And Fabrication',
            'latitude' => 10.892099783860603,
            'longitude' => 124.43781640276025
        ]);

        Location::create([
            'address' => 'Kobe Oxygen Plant',
            'latitude' => 10.89165815667158,
            'longitude' => 124.43768893892896
        ]);

        Location::create([
            'address' => 'XRF BLDG',
            'latitude' => 10.891739154911502,
            'longitude' => 124.43679594479221
        ]);

        Location::create([
            'address' => 'Power Plant',
            'latitude' => 10.891571691226678,
            'longitude' => 124.43636960874261
        ]);

        Location::create([
            'address' => 'Acid Plant Office',
            'latitude' => 10.8912390561948,
            'longitude' => 124.43644596093212
        ]);

        Location::create([
            'address' => 'Blending House',
            'latitude' => 10.891748533879335,
            'longitude' => 124.43379893624079
        ]);

        Location::create([
            'address' => 'Concentrate Storage House',
            'latitude' => 10.89248602257945,
            'longitude' => 124.43309619750552
        ]);

        Location::create([
            'address' => 'OLD SFP',
            'latitude' => 10.893086446571186,
            'longitude' => 124.43247643937642
        ]);
    }
}
