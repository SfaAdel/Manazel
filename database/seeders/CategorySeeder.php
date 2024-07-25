<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Category::create([
            'name' => 'أجهزة منزلية',
            'description' => 'صيانة واصلاح وتركيب جميع انواع الغسالات',
            'icon' => '4.png',
            'bannar' => '4.png',
        ]);
        Category::create([
            'name' => 'سباكة',
            'description' => 'صيانة واصلاح وتركيب جميع انواع الثلاجات',
            'icon' => '3.png',
            'bannar' => '3.png',

        ]);
        Category::create([
            'name' => 'كهرباء',
            'description' => 'صيانة واصلاح وتركيب جميع انواع الافران',
            'icon' => '2.png',
            'bannar' => '2.png',

        ]);
        Category::create([
            'name' => 'مكيفات',
            'description' => 'صيانة واصلاح وتركيب جميع انواع المكيفات',
            'icon' => '1.png',
            'bannar' => '1.png',
        ]);
    }
}
