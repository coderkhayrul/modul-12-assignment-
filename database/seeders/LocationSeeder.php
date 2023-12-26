<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations = [
            [
                'name' => 'Dhaka',
                'status' => true,
            ],
            [
                'name' => 'Comilla',
                'status' => true,
            ],
            [
                'name' => 'Chittagong',
                'status' => true,
            ],
            [
                'name' => 'Coxs Bazaar',
                'status' => true,
            ],
        ];

        foreach ($locations as $key => $location) {
            Location::create($location);
        }
    }
}
