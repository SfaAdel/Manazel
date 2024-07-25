<?php

namespace Database\Seeders;

use App\Models\AboutUsCounter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutUsCounterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        AboutUsCounter::create([
            'title' => 'مشروع منجز',
            'number' => '14000',
            'icon' => '1.png',
        ]);
        AboutUsCounter::create([
            'title' => 'عملاء سعداء',
            'number' => '18000',
            'icon' => '2.png',
        ]);
        AboutUsCounter::create([
            'title' => 'تاريخ الإنشاء',
            'number' => '2000',
            'icon' => '3.png',
        ]);
    }
}
