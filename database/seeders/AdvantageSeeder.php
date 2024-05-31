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
            'name' => 'استخدام أفضل الأدوات'
        ]);
        Advantage::create([
            'name' => 'خدمة متنوعة و شاملة '
        ]);
        Advantage::create([
            'name' => 'أفضل خدمة صيانة '
        ]);
        Advantage::create([
            'name' => 'أفضل قيمة مقابل السعر '
        ]);
        Advantage::create([
            'name' => 'خدمة في الوقت المحدد '
        ]);
        Advantage::create([
            'name' => 'التعامل مع امهر المتخصصين'
        ]);
    }
}
