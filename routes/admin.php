<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



// Route::group(['namespace' => 'Admin', 'prefix' => 'dashboard', 'as' => 'admin.', 'middleware' => ['dashboard']], function () {
//     Route::name('dashboard')->get('/', 'HomeController@index');
//     // Collages
//     Route::resource('collages', 'CollagesController', ['except' => 'show']);
//     // Departments
//     Route::resource('departments', 'DepartmentsController', ['except' => 'show']);
//     // Admin Departments
//     Route::resource('admin_departments', 'AdminDepartmentsController', ['except' => 'show']);
//     // Admins
//     Route::resource('admins', 'AdminsController', ['except' => 'show']);
//     // Staff
//     Route::resource('staff_members', 'StaffMembersController');
//     // Supervisors
//     Route::resource('supervisors', 'SupervisorsController');
//     // E-Books
//     Route::resource('e_books', 'EBooksController');
//     Route::patch('e_books/{e_book}/approved', 'EBooksController@approved')->name('e_books.approved');
//     // Books
//     Route::resource('books', 'BooksController');
//     Route::patch('books/{book}/published', 'BooksController@published')->name('books.published');
//     Route::post('books/{book}/returned', 'BooksController@returned')->name('books.returned');
//     Route::get('books/{book}/log', 'BooksController@log')->name('books.log');
//     Route::get('student_books', 'BooksController@students')->name('books.students');
//     // Services
//     Route::resource('services', 'ServicesController', ['except' => 'show']);
//     // Service Layers
//     Route::resource('services.service_layers', 'ServiceLayersController');
//     Route::post('service_layers/{service_layer}/attachments', 'ServiceLayerAttachmentsController@store')
//          ->name('layer_attachments.store');
//     Route::delete('/service_layer_attachments/{service_layer_attachment}', 'ServiceLayerAttachmentsController@destroy')
//          ->name('layer_attachments.destroy');

//     Route::resource('medical_departments', 'MedicalDepartmentController');
//     Route::resource('medical_reservations', 'MedicalReservationController');
//     Route::get('medical_reservations/{medical_reservation}/reserve', 'MedicalReservationController@reserve')
//          ->name('medical_reservations.reserve');

//     // Articles
//     Route::resource('posts', 'PostsController');
//     Route::name('get_collages')->get('get_collages', 'PostsController@collagesList');

//     Route::post('posts/{post}/photos', 'ImagesController@store')->name('store_photo');
//     Route::delete('photos/{photo}', 'ImagesController@destroy')->name('destroy_photo');
//     // Contacts
//     Route::resource('contacts', 'ContactsController', ['only' => ['index', 'show', 'destroy']]);
//     /* ====== About =======*/
//     Route::name('abouts.edit')->get('abouts/edit', 'AboutsController@edit');
//     Route::name('abouts.update')->patch('abouts/edit', 'AboutsController@update');
//     /* ====== Settings =======*/
//     Route::name('settings.edit')->get('settings/edit', 'SettingsController@edit');
//     Route::name('settings.update')->patch('settings/edit', 'SettingsController@update');
//     // Literacy
//     Route::resource('literacies', 'LiteraciesController', ['only' => ['index', 'show']]);
//     // Select Routes
//     Route::name('get_years')->get('get_years/{collage_id}', 'BooksController@yearsList');
//     Route::name('get_departments')->get('get_departments/{collage_id}', 'BooksController@departmentsList');
//     Route::name('get_students')->get('get_students/{department_id}/{year_id}', 'BooksController@studentsList');
// });


// Route::group(['namespace' => 'Admin'], function () {
//     Route::get('dashboard_login', 'AuthController@loginForm')->name('login_form');
//     Route::post('dashboard_logged', 'AuthController@login')->name('admin_logged');
//     Route::post('dashboard_logout', 'AuthController@logout')->name('admin_logout');
// });

// Route::get('/dashboard', function () {
//     return view('admin.index'); })->name('dashboard');
//    (' Route::get('/', function () {
//         return viewwelcome');
//     });

    Route::get('/dashboard', function () {
        return view('admin.index');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    require __DIR__.'/auth.php';
