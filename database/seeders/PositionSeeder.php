<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $postion = [
            [
                'name' => 'Penyerang'
            ],
            [
                'name' => 'Gelandang'
            ],
            [
                'name' => 'Bertahan'
            ],
            [
                'name' => 'Penjaga Gawang'
            ]
        ];

        Position::insert($postion);
    }
}
