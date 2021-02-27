<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'FrontController@home');
Route::get('/about-us', 'FrontController@about_us');
Route::get('/contact-us', 'FrontController@contact_us');
Route::post('/contact-us', 'FrontController@inquirySubmit')->name('inquiry.submnit');
Route::get('/cp-treatment', 'FrontController@about_cp');
Route::get('/media', 'FrontController@media');
Route::get('/testimonials', 'FrontController@testimonials');
Route::get('/appointment', 'FrontController@appointment');
Route::post('/appointment-submit', 'FrontController@appointmentSubmit')->name('appointment.submnit');

Route::get('inner-page', function () {

    return view('inner-page');

});

Auth::routes();

Route::group(['middleware' => ['auth'],'prefix'=>'admin','namespace'=>'Admin'], function () {
    Route::get('dashboard', 'DashboardController@dashboard');
    Route::resource('testimonials', 'TestimonialController');
    Route::resource('inquiries', 'InquiryController');
    Route::resource('appointments', 'AppointmentController');
    Route::resource('galleries', 'GalleryController');
    Route::resource('successful-treatments', 'SuccessfulTreatmentController');
    Route::resource('media', 'MediaController');
    Route::resource('page-contents', 'PageContentController');
});


