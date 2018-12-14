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
Route::get('/', function (){
    return view('auth/login');
});

Auth::routes();


Route::post('/login', [
	'uses' => 'LoginController@login', 
	'as' => 'login'
]);

Route::group(['middleware' => 'auth'], function(){
	Route::get('/home', function(){
		return view ('home');
	})->name('home');

	Route::get('/lclabhome', 'ViewsController@lclabhome')->name('lclabhome');

	Route::get('/mmglabhome', 'ViewsController@mmglabhome')->name('mmglabhome');

	Route::get('/ludacslabhome', 'ViewsController@ludacslabhome')->name('ludacslabhome');
});


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


Route::get('/home', 'ViewsController@home')->name('home');
Route::get('/logoutR', 'ViewsController@logoutR')->name('logoutR');


Route::post('/addPatient', 'PatientController@addPatient');

Route::post('/addBooking', 'BookingController@addBooking');
Route::get('/deleteLab/{id}', 'LabController@deleteLab');




//LC
Route::get('/lclabmedtech', 'MedtechController@lcmedtech')->name('lclabmedtech');
Route::post('/addLCMedtech', 'MedtechController@addLCMedtech');
Route::post('/editLCMedtech', 'MedtechController@editLCMedtech');
Route::post('/deleteLCMedtech', 'MedtechController@deleteLCMedtech');

Route::get('/lclabbooking', 'BookingController@lcbooking')->name('lcbooking');
Route::post('/addLCBooking', 'BookingController@addLCBooking');


Route::post('/confirm', 'BookingController@confirm');
Route::post('/assignMedtech', 'BookingController@assignMedtech');
Route::post('/deliver', 'BookingController@deliver');
Route::get('/deliverunpaid', 'BookingController@deliverunpaid');
Route::get('/invoice/{id}', 'BookingController@showInvoice');
Route::get('/process/{id}', 'BookingController@showProcess');
Route::get('/upload/{id}','BookingController@showUpload');
Route::get('/complete/{id}', 'BookingController@complete');

Route::get('/lclabservices', 'ServiceController@lcService')->name('lcservice');
Route::post('/addLCService', 'ServiceController@addLCService')->name('addLCService');
Route::post('/editLCService', 'ServiceController@editLCService')->name('editLCService');
Route::post('/deleteLCService', 'ServiceController@deleteLCService')->name('deleteService');



