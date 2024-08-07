<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'فرق العمل')
<!-- Start Content Section -->
@section('content')
  <!-- Start Card -->
  <div class="card main-card">
      <!-- Start Card Header -->
      @if (auth('admin')->user()->role == 'super_admin' || auth('admin')->user()->role == 'data_entry')

      <div class="card-header is-justify-content-space-between">
          <a href="{{ route('admin.teams.create') }}" class="button is-success">
        <span class="icon is-small">
          <i class="fa fa-plus-circle"></i>
        </span>
              <span>اضافة فريق عمل جديد</span>
          </a>
      </div><!-- End Card Header -->
@endif
    <!-- Start Card Content -->
    <div class="card-content">
        <div class="table-container">
            <table class="table is-fullwidth" id="categories">
                <thead>
                    <tr>
                        <th>الاسم </th>
                        <th> الوصف</th>
                        <th>الصورة</th>
                        @if (auth('admin')->user()->role == 'super_admin' || auth('admin')->user()->role == 'data_entry')
                        <th>الاجراءات</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teams as $team)
                        <tr>
                            <td>{{ $team->name }}</td>
                            <td>{{ $team->description }}</td>
                            @if ($team->icon)
                            <td>
                                <img src="{{ asset('images/teams/' . $team->icon) }}" class="icon rounded-circle" alt="icon">
                            </td>
                        @endif

                        @if (auth('admin')->user()->role == 'super_admin' || auth('admin')->user()->role == 'data_entry')
                        <td>
                            <div class="buttons has-addons">
                                <a class="button is-info" href="{{ route('admin.teams.edit', $team->id) }}">
                                    تعديل
                                </a>
                            </div>
                        </td>
                        @endif
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
@endsection
<!-- End Content Section -->
