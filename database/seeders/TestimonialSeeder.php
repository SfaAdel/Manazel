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
            'icon' => 'نورا.PNG',
        ]);
        Testimonial::create([
            'name' => 'مصطفي',
            'stars' => 5,
            'review' => 'خدمة رائعة',
            'icon' => 'مصطفي.PNG',
        ]);
        Testimonial::create([
            'name' => 'لمى',
            'stars' => 5,
            'review' => 'خدمة ممتازة',
            'icon' => 'لمى.PNG',
        ]);
        Testimonial::create([
            'name' => 'شروق',
            'stars' => 4,
            'review' => 'خدمة ممتازة مع اشخاص متخصصين',
            'icon' => 'شروق.PNG',
        ]);
        Testimonial::create([
            'name' => 'يوسف',
            'stars' => 3,
            'review' => 'عمل جيد',
            'icon' => 'يوسف.PNG',
        ]);
        Testimonial::create([
            'name' => 'احمد',
            'stars' => 5,
            'review' => 'عمل ممتاز والتزام رائع بالمواعيد',
            'icon' => 'احمد.PNG',
        ]);
    }
}
