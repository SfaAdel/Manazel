<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', ' عدادات')
<!-- Start Content Section -->
@section('content')
  <!-- Start Card -->
  <div class="card main-card">
    @if (auth('admin')->user()->role == 'super_admin' || auth('admin')->user()->role == 'data_entry')
      <!-- Start Card Header -->
      <div class="card-header is-justify-content-space-between">
          <a href="{{ route('admin.counters.create') }}" class="button is-success">
        <span class="icon is-small">
          <i class="fa fa-plus-circle"></i>
        </span>
              <span>اضافة عداد جديد</span>
          </a>
      </div><!-- End Card Header -->
    @endif

      <div class="center">
        @include('admin.partials.search_result', ['data' => $counters])
    </div>

    @if (!$counters->isEmpty())
    <!-- Start Card Content -->
    <div class="card-content">
        <div class="table-container">
            <table class="table is-fullwidth" id="categories">
                <thead>
                    <tr>
                        <th>العنوان </th>
                        <th> الرقم</th>
                        <th>الصورة</th>
                        @if (auth('admin')->user()->role == 'super_admin' || auth('admin')->user()->role == 'data_entry')
                        <th>الاجراءات</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($counters as $counter)
                        <tr>
                            <td>{{ $counter->title }}</td>
                            <td>{{ $counter->number }}</td>
                            @if ($counter->icon)
                            <td>
                                <img src="{{ asset('images/counters/' . $counter->icon) }}" class="icon rounded-circle" alt="icon">
                            </td>
                        @endif

                        @if (auth('admin')->user()->role == 'super_admin' || auth('admin')->user()->role == 'data_entry')
                        <td>
                            <div class="buttons has-addons">
                                <a class="button is-info" href="{{ route('admin.counters.edit', $counter->id) }}">
                                    تعديل
                                </a>
                                <a class="modal-open button is-danger" status-name="تأكيد الحذف"  traget-modal=".delete-modal" data_id="{{ $counter->id }}" data_name="{{ $counter->title }}" data-url="{{ route('admin.counters.destroy', $counter->id) }}">حذف</a>

                            </div>
                        </td>
                        @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div><!-- End Card Content -->
    @endif


    <!-- Start Card Footer -->
    <div class="center d-flex justify-center align-content-center m-4">
        <div class="card-footer with-pagination ">
            {{ $counters->links() }}
        </div>
    </div>
    <!-- End Card Footer -->
    </div>
    @include('admin.partials.deleteModal')
@endsection
<!-- End Content Section -->
