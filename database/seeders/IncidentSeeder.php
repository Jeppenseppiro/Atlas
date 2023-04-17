<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Incident;

class IncidentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Incident::create([
            'location_id' => '07017cee-765a-460c-bc97-9fc31147a30f',
            'description' => 'need help',
        ]);
    }
}
