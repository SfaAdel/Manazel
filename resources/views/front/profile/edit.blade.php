@extends('front/layouts.index')
@section('page.title', 'تعديل البيانات الشخصية')

@section('content')

    <section id="hero" class="hero section background-blur"
        style="background-image: url('{{ asset('images/website/background.png') }}');">
        <div class="container">
            <div class="row text-center">
                <div class="d-flex flex-column justify-content-center" data-aos="zoom-out">
                    <h1 class="my-3">مرحبا ، {{ $customer->name }}</h1>
                </div>
            </div>
        </div>
    </section>

    <br>
    <br>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">تعديل البيانات الشخصية</div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('customer.profile.update') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">الاسم</label>
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name', $customer->name) }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="phone">رقم الهاتف</label>
                                <input id="phone" type="text"
                                    class="form-control @error('phone') is-invalid @enderror" name="phone"
                                    value="{{ old('phone', $customer->phone) }}" required>
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="profile_img">الصورة الشخصية</label>
                                <input id="profile_img" type="file"
                                    class="form-control @error('profile_img') is-invalid @enderror" name="profile_img">
                                @error('profile_img')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    حفظ
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
<br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">تغيير كلمة المرور</div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <!-- Password Change Section -->
                        <form method="POST" action="{{ route('customer.profile.password') }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="password">كلمة المرور الحالية</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="current_password"
                                    required>
                                @error('current_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="new_password">كلمة المرور الجديدة</label>
                                <input id="new_password" type="password"
                                    class="form-control @error('new_password') is-invalid @enderror" name="new_password"
                                    required>
                                @error('new_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="new_password_confirmation">تأكيد كلمة المرور الجديدة</label>
                                <input id="new_password_confirmation" type="password" class="form-control"
                                    name="new_password_confirmation" required>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-secondary">
                                    تغيير كلمة المرور
                                </button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
<br>
<!-- Delete Account Section -->
{{-- <form method="POST" action="{{ route('customer.profile.delete') }}"
onsubmit="return confirm('هل أنت متأكد من حذف الحساب؟');">
@csrf
@method('DELETE')

<div class="form-group">
    <button type="submit" class="btn btn-danger" class="modal-open button is-danger" status-name="تأكيد الحذف"  traget-modal=".delete-modal">
        حذف الحساب
    </button>
</div>
</form> --}}

@include('front.partials.deleteModal')

@endsection
