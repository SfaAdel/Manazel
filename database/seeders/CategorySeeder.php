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
            'name' => 'صيانة الأجهزة المنزلية',
            'description' => 'صيانة واصلاح وتركيب جميع انواعالأجهزة المنزلية بالمملكة',
            'icon' => '4.png',
            'bannar' => '4.png',
            'logo' => 'logo1.png',
        ]);
        Category::create([
            'name' => 'أعمال السباكة',
            'description' => 'كل مايخص أعمال السباكة من صيانة وتأسيس وتشطيب',
            'icon' => '3.png',
            'bannar' => '3.png',
            'logo' => 'logo2.png',

        ]);
        Category::create([
            'name' => 'أعمال الكهرباء',
            'description' => 'جميع أعمال صيانة الكهرباء والتاسيس والتشطيب',
            'icon' => '2.png',
            'bannar' => '2.png',
            'logo' => 'logo1.png',

        ]);
        Category::create([
            'name' => 'مكيفات الهواء',
            'description' => 'جميع أعمال المكيفات من فك وتركيب وغسيل وصيانة لجميع الأنواع',
            'icon' => '1.png',
            'bannar' => '1.png',
            'logo' => 'logo2.png',

        ]);
    }
}
