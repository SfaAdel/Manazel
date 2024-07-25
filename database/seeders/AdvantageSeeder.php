<?php

namespace Database\Seeders;

use App\Models\Advantage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdvantageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        Advantage::create([
            'name' => 'استخدام أفضل الأدوات',
            'icon'=>'1.png',
        ]);
        Advantage::create([
            'name' => 'خدمة متنوعة و شاملة ',
            'icon'=>'2.png',
        ]);
        Advantage::create([
            'name' => 'أفضل خدمة صيانة',
            'icon'=>'3.png',
        ]);
        Advantage::create([
            'name' => 'أفضل قيمة مقابل السعر',
            'icon'=>'4.png',
        ]);
        Advantage::create([
            'name' => 'خدمة في الوقت المحدد ',
            'icon'=>'5.png',
        ]);
        Advantage::create([
            'name' => 'التعامل مع امهر المتخصصين',
            'icon'=>'6.png',
        ]);
    }
}
