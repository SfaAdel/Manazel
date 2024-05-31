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
            'icon' => '1717063589.PNG',
        ]);
        AboutUsCounter::create([
            'title' => 'عملاء سعداء',
            'number' => '18000',
            'icon' => '1717063619.PNG',
        ]);
        AboutUsCounter::create([
            'title' => 'تاريخ الإنشاء',
            'number' => '2000',
            'icon' => '1717063602.PNG',
        ]);
    }
}
