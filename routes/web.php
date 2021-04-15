<?php

use Illuminate\Support\Facades\Route;
use Spatie\Permission\Contracts\Role;

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
Route::get('/blogs', 'FrontController@blog');
Route::get('/single-blog/{id}', 'FrontController@singleBlog');
Route::get('/events', 'FrontController@event');
Route::get('/event-details/{id}', 'FrontController@eventDetails');
Route::get('/about-us', 'FrontController@about_us');
Route::get('/contact-us', 'FrontController@contact_us');
Route::post('/contact-us/form', 'FrontController@contactStore');
Route::post('/contact-us', 'FrontController@inquirySubmit')->name('inquiry.submnit');
Route::get('/cp-treatment', 'FrontController@about_cp');
Route::get('/media', 'FrontController@media');
Route::get('/testimonials', 'FrontController@testimonials');
Route::get('/appointment', 'FrontController@appointment');
Route::post('/appointment-submit', 'FrontController@appointmentSubmit')->name('appointment.submnit');
Route::get('/addmissions','FrontController@addmission');
Route::get('/notice','FrontController@notice');
Route::get('/notice-details/{id}', 'FrontController@noticeDetails');
Route::get('/department/{type}', 'ContentController@department');


Route::get('inner-page', function () {

    return view('inner-page','FrontController@appointmentSubmit');

});

Auth::routes(['register'=>false]);

Route::group(['middleware' => ['auth'],'prefix'=>'admin','namespace'=>'Admin'], function () {
    Route::get('dashboard', 'DashboardController@dashboard');
    Route::resource('testimonials', 'TestimonialController');
    Route::resource('inquiries', 'InquiryController');
    Route::resource('appointments', 'AppointmentController');
    Route::resource('galleries', 'GalleryController');
    Route::resource('successful-treatments', 'SuccessfulTreatmentController');
    Route::resource('media', 'MediaController');
    Route::resource('page-contents', 'PageContentController');
    Route::resource('blogs', 'BlogController');
    Route::resource('contacts', 'ContactController');
    Route::resource('abouts', 'AboutController');
    Route::resource('events', 'EventController');
    Route::resource('admissions', 'AdmissionController');
    Route::resource('notice', 'NoticeController');
    Route::resource('social-links', 'SocialLinkController');
    Route::resource('albums', 'AlbumController');
    Route::resource('advertisements', 'AdvertisementController');
});


