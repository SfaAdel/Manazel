@extends('admin.layouts.app')

@section('page.title', 'قائمة الطلبات الخارجية')

@section('content')

    <div class="card main-card">
        <div class="card-header">
            <div>
                <span class="icon is-small">
                  <i class="fa fa-envelope"></i>
                </span>
                <span>الطلبات الخارجية</span>
            </div>
        </div>
        <div class="row justify-content-end mr-4">
            <form action="{{ route('admin.general_requests.index') }}" method="get">
                <div class="field has-addons search-input">
                    <div class="control">
                        <input type="text" class="input" name="search" value="{{ isset($search) ? $search : '' }}"
                            placeholder="بحث ...">
                    </div>
                    <div class="control">
                        <button class="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="center">
            @include('admin.partials.search_result', ['search' => $search, 'data' => $generalRequests])
        </div>

        @php
        $statusTranslations = [
            'canceled' => 'ملغي',
            'pending' => 'قيد الانتظار',
            'completed' => 'مكتمل',
        ];
        @endphp

        @if (!$generalRequests->isEmpty())
        <div class="card-content">
            <div class="table-container">
                <table class="table is-fullwidth">
                    <thead>
                    <tr>
                        <th>اسم المرسل</th>
                        <th> رقم الهاتف </th>
                        <th> اسم الخدمة </th>
                        <th> حالة الطلب </th>
                        <th> السعر </th>
                        <th> ملاحظات  </th>
                        <th>الاجراءات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($generalRequests as $generalRequest)
                        <tr>
                            <td>{{ $generalRequest->name }}</td>
                            <td><a href="tel:{{ $generalRequest->phone }}">{{ $generalRequest->phone }}</a></td>
                            <td>{{$generalRequest->subService->name}}</td>
                            <td>{{ $statusTranslations[$generalRequest->status] }}</td>
                            <td>{{ $generalRequest->price ?? '--' }}</td>
                            <td>{{ $generalRequest->notes ?? '--' }}</td>
                            <td>
                                <div class="buttons has-addons">
                                    <a class="button is-info" href="{{ route('admin.general_requests.show', $generalRequest->id) }}"> عرض </a>
                                    @if (auth('admin')->user()->role == 'super_admin')
                                    <span class="modal-open button is-danger" traget-modal=".delete-modal" data_id="{{ $generalRequest->id }}" data_name=" طلب {{ $generalRequest->name }}" data-url="{{ route('admin.general_requests.destroy', $generalRequest->id) }}">مسح</span>
                                    @endif
                                </div>
                            </td>
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
            {{ $generalRequests->links() }}
        </div>
    </div>
    <!-- End Card Footer -->
    </div>
    @include('admin.partials.deleteModal')
@endsection


