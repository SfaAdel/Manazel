@extends('admin.layouts.app')

@section('page.title', 'قائمة طلبات الانضمام كمزود خدمة')

@section('content')

    <div class="card main-card">
        <div class="card-header">
            <div>
                <span class="icon is-small">
                  <i class="fa fa-bell"></i>
                </span>
                <span>طلبات الانضمام كمزود خدمة</span>
            </div>
        </div>

        <div class="center">
            @include('admin.partials.search_result', ['data' => $providerForms])
        </div>

        @if (!$providerForms->isEmpty())
        <div class="card-content">
            <div class="table-container">
                <table class="table is-fullwidth">
                    <thead>
                    <tr>
                        <th>الاسم </th>
                        <th> القسم الذي يود الانضمام اليه </th>
                        <th> رقم الهاتف </th>
                        @if (auth('admin')->user()->role == 'super_admin')
                        <th>الاجراءات</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($providerForms as $providerForm)
                        <tr>
                            <td>{{ $providerForm->name }}</td>
                            <td>{{ $providerForm->category }}</td>

                            <td><a href="tel:{{ $providerForm->phone }}">{{ $providerForm->phone }}</a></td>
                            @if (auth('admin')->user()->role == 'super_admin')
                            <td>
                                <div class="buttons has-addons">
                                    <a class="button is-info" href="{{ route('admin.provider_form.show', $providerForm->id) }}"> عرض </a>
                                    <span class="modal-open button is-danger" traget-modal=".delete-modal" data_id="{{ $providerForm->id }}" data_name="{{ $providerForm->name }}" data-url="{{ route('admin.provider_form.destroy', $providerForm->id) }}">مسح</span>
                                </div>
                            </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif

    <!-- Start Card Footer -->
    <div class="center d-flex justify-center align-content-center m-4">
        <div class="card-footer with-pagination ">
            {{ $providerForms->links() }}
        </div>
    </div>
    <!-- End Card Footer -->
    </div>
    @include('admin.partials.deleteModal')
@endsection


