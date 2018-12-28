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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::post('/login', [
	'uses' => 'Auth\LoginController@login', 
	'as' => 'login'
]);

Route::get('/labhome', 'HomeController@index')->name('labhome')
	->middleware('verified');

Route::get('/admin', 'HomeController@admin')->middleware('admin');




//Admin
Route::get('/booking','BookingController@index')->name('booking');
Route::get('/patient','PatientController@index')->name('patient');
Route::get('/lab','LabController@index')->name('lab');
Route::get('/medtech','MedtechController@index')->name('medtech');


Route::get('/service', 'ServiceController@index')->name('service');



Route::post('/addMedtech', 'MedtechController@addMedtech')->name('addMedtech');
Route::post('/editMedtech', 'MedtechController@editMedtech');
Route::get('/deleteMedtech/{medtech_id}', 'MedtechController@deleteMedtech')->name('deleteMedtech');
Route::get('/deleteBook/{id}', 'BookingController@deleteBook')->name('deleteBook');


Route::get('/logoutR', 'ViewsController@logoutR')->name('logoutR');


Route::post('/addPatient', 'PatientController@addPatient');

Route::post('/addBooking', 'BookingController@addBooking');
Route::post('/deleteLab', 'LabController@deleteLab');



Route::get('/labmedtech', 'MedtechController@lcmedtech')->name('labmedtech');
Route::post('/addLCMedtech', 'MedtechController@addLCMedtech');
Route::post('/editLCMedtech', 'MedtechController@editLCMedtech');
Route::post('/deleteLCMedtech', 'MedtechController@deleteLCMedtech');

Route::get('/labbooking', 'BookingController@lcbooking')->name('labbooking');
Route::post('/addLCBooking', 'BookingController@addLCBooking');


Route::get('/confirm/{id}', 'BookingController@confirm');
Route::get('/cancel/{id}', 'BookingController@cancel');
Route::post('/assignMedtech', 'BookingController@assignMedtech');
Route::post('/deliver', 'BookingController@deliver');
Route::get('/deliverunpaid', 'BookingController@deliverunpaid');
Route::get('/invoice/{id}', 'BookingController@showInvoice');


Route::get('/complete/{id}', 'BookingController@complete');

Route::get('/labservices', 'ServiceController@lcService')->name('labservice');
Route::post('/addLCService', 'ServiceController@addLCService')->name('addLCService');
Route::post('/editLCService', 'ServiceController@editLCService')->name('editLCService');
Route::post('/deleteLCService', 'ServiceController@deleteLCService')->name('deleteService');

Route::get('/pages/bookdetails/{id}', 'BookingController@bookdetails');
Route::get('/pages/details/{id}', 'BookingController@details');
Route::get('/pages/rebook/{id}', 'BookingController@rebook');
Route::get('/pages/process/{id}', 'BookingController@showProcess');
Route::get('/pages/deliver/{id}', 'BookingController@showPay');
Route::get('/pages/upload/{id}','BookingController@showUpload');
Route::get('/pages/pending', 'BookingController@showPending');
Route::get('/pages/processing', 'BookingController@showProc');
Route::get('/pages/delv', 'BookingController@showDelv');
Route::get('/pages/comp', 'BookingController@showComp');
Route::get('/pages/canc', 'BookingController@showCanc');

Route::get('/adminp/comp', 'BookingController@adminpComp');
Route::get('/adminp/cancel', 'BookingController@adminpCanc');
Route::get('/adminp/pending', 'BookingController@adminpPend');


Route::get('/labearnings', 'SaleController@sales');




