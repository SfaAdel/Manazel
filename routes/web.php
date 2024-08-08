<?php

use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ClickController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\GeneralRequestController;
use App\Http\Controllers\Front\AuthController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\SmsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProviderFormController;
use App\Http\Controllers\Front\OTPController;
use App\Http\Controllers\Front\VerifyMobileController;
use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\SitemapGenerator;

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


///////////////
// Route::get('register', [AuthController::class, 'registerForm'])->name('register');
// Route::post('register', [AuthController::class, 'register']);
// Route::get('verify', [AuthController::class, 'verifyForm'])->name('verify_code');
// Route::get('login', [AuthController::class, 'loginForm'])->name('login');
// Route::post('login', [AuthController::class, 'login']);
// Route::post('verify-code', [AuthController::class, 'verify'])->name('verify');
////////////////////

Route::get('register', [AuthController::class, 'registerForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::get('verify', [AuthController::class, 'verifyForm'])->name('verify_code');
Route::post('verify-code', [AuthController::class, 'verify'])->name('verify');
Route::get('login', [AuthController::class, 'loginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);

// Route::post('verifyy', [VerifyMobileController::class, '__invoke'])->name('verify');

Route::post('logout', [AuthController::class, 'logout'])->name('logout');
// Route::get('/send',  [HomeController::class, 'send'])->name('send');


// Route::get('verification', [AuthController::class, 'verificationForm'])->name('verification.form');
// Route::post('/send-verification-code', [SmsController::class, 'sendVerificationCode']);
// Route::post('verify', [SmsController::class, 'verifyCode'])->name('verify_code');


//any home routes

Route::post('login_success', [AuthController::class, 'login'])->name('login_success');
Route::middleware('auth:customer')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //any routes of orders

    Route::get('/customer-profile/edit', [CustomerController::class, 'edit'])->name('customer_edit');
    Route::post('/profile/edit', [CustomerController::class, 'update'])->name('customer.profile.update');

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/generate-sitemap', function () {
    SitemapGenerator::create('https://mnazel.net/')->writeToFile(public_path('sitemap.xml'));
});

Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::post('verify', [AuthController::class, 'verify'])->name('verify');


Route::get('/categories', [HomeController::class, 'all_categories'])->name('categories');

Route::get('/services/{slug}', [HomeController::class, 'service'])->name('services');
Route::get('/service-details/{slug}', [HomeController::class, 'service_details'])->name('service_details');
Route::get('/sub-service-details/{slug}', [HomeController::class, 'sub_service_details'])->name('sub_service_details');
Route::post('sub_service/{slug}/review', [HomeController::class, 'submit_review'])->name('submit_review');

Route::post('/appointments', [AppointmentController::class, 'bookAppointment'])->name('book_appointment');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact_store');

Route::get('/provider-form', [HomeController::class, 'provider_form'])->name('provider_form');
Route::post('/provider-form', [ProviderFormController::class, 'store'])->name('provider_form_store');

Route::post('/general-request', [GeneralRequestController::class, 'store'])->name('general_request_store');


Route::post('/register-click', [ClickController::class, 'registerClick'])->name('register.click');

Route::get('/blogs/filter/tag/{slug}', [BlogController::class, 'filterByTag'])->name('blogs.filterByTag');

Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/blogs', [HomeController::class, 'blog'])->name('blogs');
Route::get('/blog-details/{slug}', [HomeController::class, 'blog_details'])->name('blog_details');
Route::get('/blogs/category/{slug?}', [HomeController::class, 'filterByCategory'])->name('blogs.filter');




// Route::get('/about', function () {
//     return view('front/about'); }) ->name('about');
// Route::get('/contact', function () {
//     return view('front/contact'); }) ->name('contact');

Route::get('/enroll', function () {
    return view('front/enroll');
})->name('enroll');

// Route::get('/blog', function () {
//     return view('front/blogs'); }) ->name('blogs');

Route::get('/cart', function () {
    return view('front/cart');
})->name('cart');

// Route::get('/blog-details', function () {
//     return view('front/blog_details'); }) ->name('blog_details');

Route::get('/general-order', function () {
    return view('front/general_order');
})->name('general_order');





// require __DIR__.'/auth.php';
