<?php

namespace Database\Seeders;

use App\Models\Bus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $buses = [
            [
                'name' => 'Green Line',
                'status' => 1,
            ],
            [
                'name' => 'Ena Transport Pvt',
                'status' => 1,
            ],
            [
                'name' => 'Royal Coach',
                'status' => 1,
            ],
            [
                'name' => 'London Express',
                'status' => 1,
            ]
        ];

        foreach ($buses as $bus) {
            Bus::create($bus);
        }
    }
}
