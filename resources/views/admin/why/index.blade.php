<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'من نحن')
<!-- Start Content Section -->
@section('content')
  <!-- Start Card -->
  <div class="card main-card">
      <!-- Start Card Header -->
      <div class="card-header is-justify-content-space-between">
          <a href="{{ route('admin.why.create') }}" class="button is-success">
        <span class="icon is-small">
          <i class="fa fa-plus-circle"></i>
        </span>
              <span>اضافة معلومة جديدة عن من نحن</span>
          </a>
      </div><!-- End Card Header -->
      <div class="center">
        @include('admin.partials.search_result', ['data' => $whyUsQuestions])
    </div>

    @if (!$whyUsQuestions->isEmpty())
    <!-- Start Card Content -->
    <div class="card-content">
        <div class="table-container">
            <table class="table is-fullwidth" id="categories">
                <thead>
                    <tr>
                        <th>العنوان </th>
                        <th> المحتوي</th>
                        <th>الاجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($whyUsQuestions as $whyUsQuestion)
                        <tr>
                            <td>{{ $whyUsQuestion->question }}</td>
                            <td>{{ $whyUsQuestion->answer }}</td>
                        <td>
                            <div class="buttons has-addons">
                                <a class="button is-info" href="{{ route('admin.why.edit', $whyUsQuestion->id) }}" >
                                    تعديل
                                </a>
                                <a class="modal-open button is-danger" status-name="تأكيد الحذف"  traget-modal=".delete-modal" data_id="{{ $whyUsQuestion->id }}" data_name="{{ $whyUsQuestion->question }}" data-url="{{ route('admin.why.destroy', $whyUsQuestion->id) }}">حذف</a>

                            </div>
                        </td>
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
            {{ $whyUsQuestions->links() }}
        </div>
    </div>
    <!-- End Card Footer -->
    </div>
    @include('admin.partials.deleteModal')
@endsection
<!-- End Content Section -->
