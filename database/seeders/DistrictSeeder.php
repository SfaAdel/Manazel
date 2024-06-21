<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        District::create([
            'name' => 'العارض',
            'city_id' => 1,
        ]);
        District::create([
            'name' => 'النرجس',
            'city_id' => 1,
        ]);
        District::create([
            'name' => 'الربيع',
            'city_id' => 1,
        ]);
    }
}
