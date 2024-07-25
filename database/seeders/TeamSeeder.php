<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        Team::create([
            'name' => 'قسم الترويج و الإعلان',
            'description' => 'مكون من عدد من المتخصصين في مجال الدعاية و التسويق , مهمتهم ايصال خدمات الشركة إلى اكبر عدد من العملاء',
            'icon' => '1.png',
        ]);
        Team::create([
            'name' => 'قسم البحث و التطوير',
            'description' => 'يتكون هذا القسم من عدد من المهندسين المتخصصين بتحليل البيانات و مهمتهم تحليل سوق العمل وايجاد أفكار جديدة',
            'icon' => '2.png',
        ]);
        Team::create([
            'name' => 'قسم الإدارة',
            'description' => 'يتخصص هذا القسم بمتابعة أعمال الشركة ككل و تنسيق العمل بين الأقسام وتوجيهها لتعمل بتناغم',
            'icon' => '3.png',
        ]);
        Team::create([
            'name' => 'فريق دعم العملاء ',
            'description' => 'وهو قسم من الخبراء في مجال الصيانة مخصص للرد على اتصالات الزبائن و الردعلى جميع الإستفسارات و الأسئلة',
            'icon' => '4.png',
        ]);
        Team::create([
            'name' => 'الفريق الفني',
            'description' => 'عدد من الفنيين الخاضعين لدورات مكثفة في مجال الصيانة و هم الخط الاول و الأساسي لتقديم خدمات الصيانة للعملاء',
            'icon' => '5.png',
        ]);
        Team::create([
            'name' => 'الخبراء و المهندسين',
            'description' => 'وهم عبارة مهندسين الكهرباء و الميكانيك و الخبراء في مجال الصيانة يقومون بتشخيص الأعطال و إعطاء تعليماتهم للفريق الفني',
            'icon' => '6.png',
        ]);
    }
}
