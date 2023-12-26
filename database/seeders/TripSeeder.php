<?php

namespace Database\Seeders;

use App\Models\Trip;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $buses = [
            [
                'name' => 'Dhaka to Cox\'s Bazar',
                'status' => 1,
            ],
            [
                'name' => 'Dhaka to Chittagong',
                'status' => 1,
            ]
        ];

        foreach ($buses as $bus) {
            Trip::create($bus);
        }
    }
}
