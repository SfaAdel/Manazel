<?php

namespace Database\Seeders;

use App\Models\Title;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        Title::create([
            'title' => 'اهلا بك في منازل',
            'short_description' => 'فى شركة منازل  نقدم خدمات صيانة شاملة للأجهزة المنزلية والمكيفات، بالإضافة لأعمال الكهرباء والسباكة والديكور. نضمن لك الجودة والراحة بأفضل الأسعار.',
            'section' => 'main',
            'icon' => '1724120553.png',
            'banner' => '1724121106.png',
        ]);
        Title::create([
            'title' => 'من نحن',
            'short_description' => 'شركة منازل هى شركة رائدة ومتخصصة فى خدمات الصيانة المنزلية ابتداء من الاجهزة المنزليه ومروا بالمكيفات وأعمال السباكة والكهرباء وأعمال الديكور هدفنا ثقتكم وراحة بالكم مع أفضل الفنيين المهرة والمدربين بشركة منازل',
            'section' => 'about_us',
            'icon' => '1717146544.png',
            'banner' => '2.png',
        ]);
        Title::create([
            'title' => 'خدماتنا',
            'short_description' => 'نقدم لك جميع الخدمات بكل دقة و احترافية مع فريقنا الفني المتكامل في الرياض – شركة منازل',
            'section' => 'services',
            'banner' => '3.png',
        ]);
        Title::create([
            'title' => 'اراء عملائنا',
            'short_description' => 'تحقق من رأي العملاء في خدمتنا',
            'section' => 'testimonials',
        ]);
        Title::create([
            'title' => 'ماهي الأمور المذهلة التي يمكنك الحصول عليها معنا ؟',
            'short_description' => 'عند التعامل مع شركتنا المتخصصة في عمليات الصيانة و التصليح و اعمال السباكة و الصبغ و الكهرباء في الملكة العربية السعودية , يمكن للعملاء الحصول على العديد من المزايا و الخدمات المذهلة . ومن بين هذة الميزات :',
            'section' => 'advantages',
        ]);
        Title::create([
            'title' => 'فريق العمل',
            'short_description' => 'تتكون شركتنا من عدة أقسام و كل قسم مسؤول عن انجاز مهام معينة لتحقيق أفضل استفادة مع العمل المشترك بين الأقسام , نعمل معاً كعائلة واحدة لتقديم خدمات عالية الجودة للعملاء .',
            'section' => 'teams',
        ]);
        Title::create([
            'title' => 'المدونات',
            'short_description' => 'نقدم لكم آخر الصيحات والأخبار في طرق تصميم منازلكم والحفاظ على سلامتكم بأفضل الطرق وأوفرها',
            'section' => 'blogs',
            'banner' => '7.png',

        ]);
        Title::create([
            'title' => 'تواصل معنا',
            'short_description' => 'اذا كان لديك أي استفسار أو تساؤل بخصوص شركة الأنظمة الأولية في المملكة العربية السعودية نرجو منك ملئ النموذج التالي و سنكون مسرورين بالإجابة على جميع الإستفسارات و الرد في أسرع وقت ممكن ، فريق خدمة العملاء يتمنى لكم دوام الصحة و العافية',
            'section' => 'contacts',
            'banner' => '3.png',
        ]);
    }
}
