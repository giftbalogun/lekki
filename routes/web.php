<?php

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
Route::group(['middleware' => 'optimizeHtml'], function () {

    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');

    Route::get('select-tutor', 'TutorController@showTutors')->name('select-tutor');

    Route::get('become-tutor', 'TutorController@showBecomeTutor')->name('become-tutor');

    Route::post('become-tutor', 'TutorController@becomeTutor')->name('become-tutor.post');

    Route::get('select-lesson/{tutor?}', 'LessonController@showSelectLesson')->name('select-lesson');

    Route::get('client-details/{package?}', 'UserController@showGetClientDetails')->name('client-details.show');



    Route::post('get-state-lgas', 'LocationController@getStateLgas')->name('state.lgas');

    Route::post('get-package-price', 'PackageController@getPackagePricing')->name('package.price');
});
Route::get('checkout', 'PaymentController@showCheckout')->name('checkout');
Route::post('payment', 'PaymentController@packagePaymentRedirectToGateway')->name('package.payment');
Route::get('payment-callback', 'PaymentController@paymentCallback')->name('paystack.callback.route');
Route::get('test', 'PackageController@getPackagePricing');

Route::group(['prefix' => 'admin'], function () {
    Route::get('dashboard', 'AdministratorController@showDashboard')->name('admin.dashboard');
    Route::get('tutors', 'AdministratorController@showManageTutors')->name('admin.tutors.show');
    Route::get('users', 'AdministratorController@showManageUsers')->name('admin.users.show');
    Route::post('tutors/{tutor?}', 'AdministratorController@accept')->name('admin.tutors.accept');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
