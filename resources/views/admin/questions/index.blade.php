<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'الاسئلة ')
<!-- Start Content Section -->
@section('content')
  <!-- Start Card -->
  <div class="card main-card">

    @if (auth('admin')->user()->role == 'super_admin' || auth('admin')->user()->role == 'data_entry')
      <!-- Start Card Header -->
      <div class="card-header is-justify-content-space-between">
          <a href="{{ route('admin.questions.create') }}" class="button is-success">
        <span class="icon is-small">
          <i class="fa fa-plus-circle"></i>
        </span>
              <span>اضافة سؤال جديد</span>
          </a>
      </div><!-- End Card Header -->
    @endif

      <div class="center">
        @include('admin.partials.search_result', ['data' => $questions])
    </div>

    @if (!$questions->isEmpty())
      <!-- Start Card Content -->
    <div class="card-content">
        <div class="table-container">
            <table class="table is-fullwidth" id="categories">
                <thead>
                    <tr>
                        <th>السؤال </th>
                        <th> الاجابة</th>
                        @if (auth('admin')->user()->role == 'super_admin' || auth('admin')->user()->role == 'data_entry')
                        <th>الاجراءات</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($questions as $question)
                        <tr>
                            <td>{{ $question->question }}</td>
                            <td>{{ $question->answer }}</td>
                            @if (auth('admin')->user()->role == 'super_admin' || auth('admin')->user()->role == 'data_entry')
                            <td>
                                <div class="buttons has-addons">
                                    <a class="button is-info" href="{{ route('admin.questions.edit', $question->id) }}">
                                        تعديل
                                    </a>
                                    <a class="modal-open button is-danger" status-name="تأكيد الحذف"  traget-modal=".delete-modal" data_id="{{ $question->id }}" data_name="{{ $question->question }}" data-url="{{ route('admin.questions.destroy', $question->id) }}">حذف</a>

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
            {{ $questions->links() }}
        </div>
    </div>
    <!-- End Card Footer -->
    </div>
    @include('admin.partials.deleteModal')
@endsection
