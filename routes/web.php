<?php

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

Route::get('/', function () {
    return view('front.index'); }) ->name('home');

Route::get('/services', function () {
    return view('front/services'); }) ->name('services');


Route::get('/service-details', function () {
    return view('front/service_details'); }) ->name('service_details');

Route::get('/about', function () {
    return view('front/about'); }) ->name('about');

Route::get('/contact', function () {
    return view('front/contact'); }) ->name('contact');

Route::get('/enroll', function () {
    return view('front/enroll'); }) ->name('enroll');

Route::get('/blog', function () {
    return view('front/blogs'); }) ->name('blogs');

Route::get('/cart', function () {
    return view('front/cart'); }) ->name('cart');

Route::get('/blog-details', function () {
    return view('front/blog_details'); }) ->name('blog_details');

Route::get('/general-order', function () {
    return view('front/general_order'); }) ->name('general_order');

Route::get('/sub-service-details', function () {
    return view('front/sub_service_details'); }) ->name('sub_service_details');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
