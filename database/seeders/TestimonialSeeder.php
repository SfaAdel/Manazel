<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Testimonial::create([
            'name' => 'نورا',
            'stars' => 3,
            'review' => 'عمل رائع',
            'icon' => '1724121305.png',
        ]);
        Testimonial::create([
            'name' => 'مصطفي',
            'stars' => 5,
            'review' => 'خدمة رائعة',
            'icon' => '1724121315.png',
        ]);
        Testimonial::create([
            'name' => 'لمى',
            'stars' => 5,
            'review' => 'خدمة ممتازة',
            'icon' => '1724121322.png',
        ]);
        Testimonial::create([
            'name' => 'شروق',
            'stars' => 4,
            'review' => 'خدمة ممتازة مع اشخاص متخصصين',
            'icon' => '1724121329.png',
        ]);
        Testimonial::create([
            'name' => 'يوسف',
            'stars' => 3,
            'review' => 'عمل جيد',
            'icon' => '1724121340.png',
        ]);
        Testimonial::create([
            'name' => 'احمد',
            'stars' => 5,
            'review' => 'عمل ممتاز والتزام رائع بالمواعيد',
            'icon' => '1724121347.png',
        ]);
    }
}
