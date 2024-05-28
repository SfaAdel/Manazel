<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'فرق العمل')
<!-- Start Content Section -->
@section('content')
  <!-- Start Card -->
  <div class="card main-card">
      <!-- Start Card Header -->
      <div class="card-header is-justify-content-space-between">
          <a href="{{ route('admin.why_us.create') }}" class="button is-success">
        <span class="icon is-small">
          <i class="fa fa-plus-circle"></i>
        </span>
              <span>اضافة سؤال جديد عن من نحن</span>
          </a>
      </div><!-- End Card Header -->
    <!-- Start Card Content -->
    <div class="card-content">
        <div class="table-container">
            <table class="table is-fullwidth" id="categories">
                <thead>
                    <tr>
                        <th>السؤال </th>
                        <th> الاجابة</th>
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
                                <a class="button is-info" href="{{ route('admin.why_us.edit', $whyUsQuestion->id) }}" >
                                    تعديل
                                </a>
                                <a class="modal-open button is-danger" status-name="تأكيد الحذف"  traget-modal=".delete-modal" data_id="{{ $whyUs->id }}" data_name="{{ $whyUs->question }}" data-url="{{ route('admin.titles.destroy', $whyUs->id) }}">حذف</a>

                            </div>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div><!-- End Card Content -->
    <!-- Start Card Footer -->
    <div class="card-footer with-pagination">
        {{-- {{ $departments->links('vendor.pagination.bulma') }} --}}
    </div><!-- End Card Footer -->
  </div><!-- End Card -->
  @include('admin.partials.deleteModal')

@endsection
<!-- End Content Section -->
