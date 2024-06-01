<?php

use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Front\AuthController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\SmsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

    // Route::get('register', [AuthController::class, 'registerForm'])->name('register');

    // Route::post('register', [AuthController::class, 'register'])->name('register_success');

    // Route::get('login', [AuthController::class, 'loginForm'])->name('login');

    // Route::post('verify', [AuthController::class, 'verifyCode'])->name('verify_code');

    Route::get('register', [AuthController::class, 'registerForm'])->name('register');
    Route::post('register', [AuthController::class, 'register']);
    Route::post('verify', [AuthController::class, 'verifyCode'])->name('verify_code');
    Route::get('login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    // Route::get('verification', [AuthController::class, 'verificationForm'])->name('verification.form');
    Route::post('/send-verification-code', [SmsController::class, 'sendVerificationCode']);
    Route::post('verify', [SmsController::class, 'verifyCode'])->name('verify_code');


//any home routes

    Route::post('login_success', [AuthController::class, 'login'])->name('login_success');
    Route::middleware('auth:customer')->group(function () {
        // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

//any routes of orders

        Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    });


    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::post('verify', [AuthController::class, 'verify'])->name('verify');

    Route::get('/services/{id}', [HomeController::class, 'service'])->name('services');
    Route::get('/service-details/{id}', [HomeController::class, 'service_details'])->name('service_details');
    Route::get('/sub-service-details/{id}', [HomeController::class, 'sub_service_details'])->name('sub_service_details');
    Route::post('sub_service/{id}/review', [HomeController::class, 'submit_review'])->name('submit_review');

    Route::post('/appointments', [AppointmentController::class, 'bookAppointment'])->name('book_appointment');
    Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
    Route::post('/contact', [ContactController::class, 'store'])->name('contact_store');

    Route::get('/about', [HomeController::class, 'about'])->name('about');
    Route::get('/blog', [HomeController::class, 'blog'])->name('blogs');
    Route::get('/blog-details', [HomeController::class, 'blog_details'])->name('blog_details');




// Route::get('/about', function () {
//     return view('front/about'); }) ->name('about');
// Route::get('/contact', function () {
//     return view('front/contact'); }) ->name('contact');

Route::get('/enroll', function () {
    return view('front/enroll'); }) ->name('enroll');

// Route::get('/blog', function () {
//     return view('front/blogs'); }) ->name('blogs');

Route::get('/cart', function () {
    return view('front/cart'); }) ->name('cart');

// Route::get('/blog-details', function () {
//     return view('front/blog_details'); }) ->name('blog_details');

Route::get('/general-order', function () {
    return view('front/general_order'); }) ->name('general_order');





// require __DIR__.'/auth.php';
