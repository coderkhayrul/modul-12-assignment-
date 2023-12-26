<?php

namespace Database\Seeders;

use App\Models\Bus;
use App\Models\Seat;
use Illuminate\Database\Seeder;

class SeatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seats = [
            [
                'name' => 'A1',
            ],
            [
                'name' => 'A2',
            ],
            [
                'name' => 'A3',
            ],
            [
                'name' => 'A4',
            ],
            [
                'name' => 'A5',
            ],
            [
                'name' => 'A6',
            ],
            [
                'name' => 'A7',
            ],
            [
                'name' => 'A8',
            ],
            [
                'name' => 'A9',
            ],
            [
                'name' => 'A10',
            ],
            [
                'name' => 'A11',
            ],
            [
                'name' => 'A12',
            ],
            [
                'name' => 'A13',
            ],
            [
                'name' => 'A14',
            ],
            [
                'name' => 'A15',
            ],
            [
                'name' => 'A16',
            ],
            [
                'name' => 'A17',
            ],
            [
                'name' => 'A18',
            ],
            [
                'name' => 'A19',
            ],
            [
                'name' => 'A20',
            ],
            [
                'name' => 'A21',
            ],
            [
                'name' => 'A22',
            ],
            [
                'name' => 'A23',
            ],
            [
                'name' => 'A24',
            ],
            [
                'name' => 'A25',
            ],
            [
                'name' => 'A26',
            ],
            [
                'name' => 'A27',
            ],
            [
                'name' => 'A28',
            ],
            [
                'name' => 'A29',
            ],
            [
                'name' => 'A30',
            ],
            [
                'name' => 'A31',
            ],
            [
                'name' => 'A32',
            ],
            [
                'name' => 'A33',
            ],
            [
                'name' => 'A34',
            ],
            [
                'name' => 'A35',
            ],
            [
                'name' => 'A36',
            ],
        ];

        $buses = Bus::all();
        foreach ($buses as $bus) {
            $bus->seats()->createMany($seats);
        }
    }
}
