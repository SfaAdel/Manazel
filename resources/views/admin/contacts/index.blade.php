@extends('admin.layouts.app')

@section('page.title', 'قائمة الرسائل')

@section('content')

    <div class="card main-card">
        <div class="card-header">
            <div>
                <span class="icon is-small">
                  <i class="fa fa-envelope"></i>
                </span>
                <span>رسائل التواصل</span>
            </div>
        </div>

        <div class="center">
            @include('admin.partials.search_result', ['data' => $contacts])
        </div>

        @if (!$contacts->isEmpty())
        <div class="card-content">
            <div class="table-container">
                <table class="table is-fullwidth">
                    <thead>
                    <tr>
                        <th>اسم المرسل</th>
                        <th> البريد الإلكتروني</th>
                        <th> عنوان الرسالة</th>
                        <th>الاجراءات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contacts as $contact)
                        <tr>
                            <td>{{ $contact->name }}</td>
                            <td><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></td>
                            <td>{{$contact->title}}</td>
                            <td>
                                <div class="buttons has-addons">
                                    <a class="button is-info" href="{{ route('admin.contacts.show', $contact->id) }}"> عرض </a>
                                    <span class="modal-open button is-danger" traget-modal=".delete-modal" data_id="{{ $contact->id }}" data_name="{{ $contact->name }}" data-url="{{ route('admin.contacts.destroy', $contact->id) }}">مسح</span>
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
            {{ $contacts->links() }}
        </div>
    </div>
    <!-- End Card Footer -->
    </div>
    @include('admin.partials.deleteModal')
@endsection


