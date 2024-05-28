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
            'name' => 'غسالات',
            'description' => 'صيانة واصلاح وتركيب جميع انواع الغسالات',
            'icon' => 'غسالات.PNG',
        ]);
        Category::create([
            'name' => 'ثلاجات',
            'description' => 'صيانة واصلاح وتركيب جميع انواع الثلاجات',
            'icon' => 'ثلاجات.PNG',
        ]);
        Category::create([
            'name' => 'افران',
            'description' => 'صيانة واصلاح وتركيب جميع انواع الافران',
            'icon' => 'افران.PNG',
        ]);
        Category::create([
            'name' => 'مكيفات',
            'description' => 'صيانة واصلاح وتركيب جميع انواع المكيفات',
            'icon' => 'مكيفات.PNG',
        ]);
        Category::create([
            'name' => 'مكيفات سبليت',
            'description' => 'صيانة واصلاح وتركيب جميع انواع مكيفات سبليت',
            'icon' => 'مكيفات SPLIT.PNG',
        ]);
    }
}
