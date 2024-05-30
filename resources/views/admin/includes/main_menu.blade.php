<collapse class="outer " accordion is-fullwidth>

    <a href="{{ route('dashboard') }}" class="card link-item-no-collapse "><i
            class="fas fa-tachometer-alt"></i><span>لوحه التحكم</span></a>
            <div class="card-link text-danger like">
                <i class="fas fa-heart"></i>
            </div>

    <collapse-item title="التصنيفات" icon="fa fa-building">
        <a class="link-item" href="{{ route('admin.categories.create') }}">اضافة تصنيف</a>
        <a class="link-item" href="{{ route('admin.categories.index') }}">قائمة التصنيفات</a>
    </collapse-item>
    <collapse-item title=" الخدمات الاساسية" icon="fa fa-sitemap">
        <a class="link-item" href="{{ route('admin.services.create') }}">اضافة خدمة رئيسية</a>
        <a class="link-item" href="{{ route('admin.services.index') }}">قائمة الخدمات الرئيسية</a>
    </collapse-item>
    <collapse-item title=" الخدمات" icon="fa fa-user-tie">
        <a class="link-item" href="{{ route('admin.sub_services.create') }}">اضافة خدمة</a>
        <a class="link-item" href="{{ route('admin.sub_services.index') }}">قائمة الخدمات</a>
    </collapse-item>
    <collapse-item title=" العاملين" icon="fa fa-book">
        <a class="link-item" href="{{ route('admin.providers.create') }}">اضافة عامل</a>
        <a class="link-item" href="{{ route('admin.providers.index') }}">قائمة العمال</a>
    </collapse-item>
    <collapse-item title=" المراجعات" icon="fa fa-user-check">
        <a class="link-item" href="{{ route('admin.testimonials.create') }}">اضافة مراجعة</a>
        <a class="link-item" href="{{ route('admin.testimonials.index') }}">قائمة المراجعات</a>
    </collapse-item>
    <collapse-item title="فرق العمل" icon="fa fa-user-lock">
        <a class="link-item" href="{{ route('admin.teams.create') }}">اضافة فريق عمل</a>
        <a class="link-item" href="{{ route('admin.teams.index') }}">قائمة فرق العمل</a>
    </collapse-item>
    <collapse-item title="المدونات" icon="fa fa-handshake">
        <a class="link-item" href="{{ route('admin.blogs.create') }}">اضافة مدونة</a>
        <a class="link-item" href="{{ route('admin.blogs.index') }}">قائمة المدونات</a>
    </collapse-item>
    <collapse-item title=" العناوين" icon="fa fa-handshake">
        <a class="link-item" href="{{ route('admin.titles.create') }}"> اضافة عنوان</a>
        <a class="link-item" href="{{ route('admin.titles.index') }}">قائمة العناوين</a>
    </collapse-item>
    <collapse-item title=" الاسئلة" icon="fa fa-handshake">
        <a class="link-item" href="{{ route('admin.questions.create') }}"> اضافة سؤال</a>
        <a class="link-item" href="{{ route('admin.questions.index') }}">قائمة الاسئلة</a>
    </collapse-item>
    <collapse-item title=" المميزات" icon="fa fa-handshake">
        <a class="link-item" href="{{ route('admin.advantages.create') }}"> اضافة ميزة</a>
        <a class="link-item" href="{{ route('admin.advantages.index') }}">قائمة المميزات</a>
    </collapse-item>
    <collapse-item title=" من نحن" icon="fa fa-handshake">
        <a class="link-item" href="{{ route('admin.why.create') }}"> اضافة معلومة</a>
        <a class="link-item" href="{{ route('admin.why.index') }}">قائمة المعلومات</a>
        <a class="link-item" href="{{ route('admin.counters.create') }}"> اضافة عداد</a>
        <a class="link-item" href="{{ route('admin.counters.index') }}">قائمة الاعداد</a>
    </collapse-item>
    <collapse-item title="اجازات العاملين" icon="fa fa-handshake">
        <a class="link-item" href="{{ route('admin.provider_availabilities.index') }}">قائمة الاجازات</a>
    </collapse-item>
    <collapse-item title="الطلبات" icon="fa fa-handshake">
        <a class="link-item" href="{{ route('admin.orders.index') }}">قائمة الطلبات</a>
    </collapse-item>
    <collapse-item title="الرسائل" icon="fa fa-handshake">
        <a class="link-item" href="{{ route('admin.contacts.index') }}">قائمة الرسائل</a>
    </collapse-item>
    {{-- <a href="{{ route('admin.literacies.index') }}" class="card link-item-no-collapse"><i class="fa fa-school"></i><span>محو الأمية</span></a>
    <a href="{{ route('admin.contacts.index') }}" class="card link-item-no-collapse"><i class="fa fa-envelope"></i><span>رسائل التواصل</span></a>
    <a href="{{ route('admin.settings.edit') }}" class="card link-item-no-collapse"><i class="fa fa-cogs"></i><span>الاعدادات</span></a> --}}
    <a href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();" class="card link-item-no-collapse">
                <i class="fas fa-sign-out-alt"></i><span>تسجيل الخروج</span></a>
    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</collapse>
