<?php

namespace Database\Seeders;

use App\Models\Provider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        Provider::create([
            'name' => 'محمود احمد على',
            'phone' => '0551234567',
            'category_id' => 1,
            'status' => 1,
        ]);
        Provider::create([
            'name' => 'فهد احمد عامر',
            'phone' => '0551234562',
            'category_id' => 2,
            'status' => 0,
        ]);
        Provider::create([
            'name' => 'يوسف حلمى على',
            'phone' => '0551234563',
            'category_id' => 3,
            'status' => 1,
        ]);
        Provider::create([
            'name' => 'جاسر مصطفى العابدين',
            'phone' => '0551234564',
            'category_id' => 4,
            'status' => 1,
        ]);
        Provider::create([
            'name' => 'احمد احمد محمود',
            'phone' => '0551234565',
            'category_id' => 5,
            'status' => 1,
        ]);
        Provider::create([
            'name' => 'احمد ياسر ',
            'phone' => '0551234566',
            'category_id' => 2,
            'status' => 1,
        ]);
        Provider::create([
            'name' => 'مصطفي راشد على',
            'phone' => '0551234568',
            'category_id' => 2,
            'status' => 1,
        ]);
        Provider::create([
            'name' => 'محمد المصيلحي ',
            'phone' => '0551234569',
            'category_id' => 2,
            'status' => 0,
        ]);
    }
}
