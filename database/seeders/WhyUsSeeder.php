<?php

namespace Database\Seeders;

use App\Models\WhyUs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WhyUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        WhyUs::create([
            'question' => 'استخدام أفضل الأدوات',
            'answer' => 'نقوم بتزويد فريقنا بأفضل الأدوات و معدات الصيانة لتقديم خدمات صيانة موثوقة , بالإضافة إلى استخدام أحدث المعدات في عالم الصيانة .',
        ]);
        WhyUs::create([
            'question' => 'خدمة متنوعة و شاملة ',
            'answer' => 'يمكن لفريقنا الفني بزيارة واحدة لمنزلك أو مكتبك فحص جميع الأعطال و المشاكل في أجهزتك المنزلية و إصلاحها على الفور بدقة و حرفية .'

        ]);
        WhyUs::create([
            'question' => 'أفضل خدمة صيانة',
            'answer' => 'إذا كنت تبحث عن خدمة الصيانة رقم واحد في المملكة فنحن خيارك الأفضل , نقدم جميع الخدمات الموثوقة للعملاء وعلى يد أفضل فريق فني .'
        ]);
        WhyUs::create([
            'question' => 'أفضل قيمة مقابل السعر ',
            'answer' => 'تعد ميزة الحصول على أفضل قيمة مقابل السعر ميزة مهمة للعملاء , فهي تضمن لهم جودة الخدمة و الكفاءة في العمل بالإضافة للحصول على تكلفة معقولة تناسب الجميع .'
        ]);
        WhyUs::create([
            'question' => 'خدمة في الوقت المحدد ',
            'answer' => 'نحن ندرك اهمية عامل الوقت في تقديم الخدمات , لذلك نحرص على الوصول في الوقت المتفق عليه وانجاز المهمة في الوقت المحدد بدون أي تأخير لجدول مواعيدك .'

        ]);
    }
}
