<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Service::create([
            'name' => 'تصليح غسالات',
            'description' => 'تصليح جميع اعطال الغسالات بجميع انواعها عن طريق امهر المتخصصين',
            'icon' => '22.png',
            'category_id' => 1,
        ]);
        Service::create([
            'name' => 'صيانة غسالات',
            'description' => 'صيانة جميع اعطال الغسالات بجميع انواعها عن طريق امهر المتخصصين',
            'icon' => '14.png',
            'category_id' => 1,
        ]);
        Service::create([
            'name' => 'تركيب غسالات',
            'description' => 'تركيب جميع الغسالات بجميع انواعها عن طريق امهر المتخصصين',
            'icon' => '25.png',
            'category_id' => 1,
        ]);
        Service::create([
            'name' => 'تصليح ثلاجات',
            'description' => 'تصليح جميع اعطال الثلاجات بجميع انواعها عن طريق امهر المتخصصين',
            'icon' => '20.png',
            'category_id' => 2,
        ]);
        Service::create([
            'name' => 'صيانة ثلاجات',
            'description' => 'صيانة جميع اعطال الثلاجات بجميع انواعها عن طريق امهر المتخصصين',
            'icon' => '17.png',
            'category_id' => 2,
        ]);
        Service::create([
            'name' => 'تركيب ثلاجات',
            'description' => 'تركيب جميع الثلاجات بجميع انواعها عن طريق امهر المتخصصين',
            'icon' => '15.png',
            'category_id' => 2,
        ]);
    }
}
