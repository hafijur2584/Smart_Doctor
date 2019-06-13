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


Route::get('pdf-test','User\HomeController@pdf');


Auth::routes();

Route::get('/', 'User\HomeController@index')->name('homepage');
Route::get('/hospitals', 'User\HospitalController@index')->name('hospitals');
Route::get('/hospital/detail/{slug}', 'User\HospitalController@hospital')->name('hospital_detail');
Route::get('/doctor/profile/{id}', 'User\HospitalController@doctor')->name('doctor_profile');
Route::get('/doctor', 'User\DoctorController@index')->name('doctor');
Route::get('/search_disease', 'User\HospitalController@disease')->name('search_disease');
Route::get('/contact', 'User\HospitalController@contact')->name('contact');
Route::get('/WeAre', 'User\TeamController@index')->name('team');
Route::get('/doctor/appointment/{id}', 'User\AppointmentController@index')->name('appointment');
Route::post('/find-disease', 'User\HospitalController@findDisease');
//Route::post('/appointment', 'User\AppointmentController@store')->name('appointment.store');


Route::post('/login/custom', [

    'uses' => 'LoginController@login',
    'as' => 'login.custom'
    ]);
Route::group(['middleware' => 'auth'],function (){

    Route::get('/admin',function (){
        return view('admin/dashboard');
    })->name('admin');
});
Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('disease/set-symptom/{id}', 'Admin\SetSymptomController@index')->name('setsymptom');
    Route::get('disease/set-symptom/delete/{id}', 'Admin\SetSymptomController@deleteSymptom')->name('deletesymptom');
    Route::post('disease/set-symptom/update/{id}', 'Admin\SetSymptomController@updateSymptom')->name('updatesymptom');

    Route::resource('hospitals','Admin\HospitalController');
    Route::resource('team','Admin\TeamController');
    Route::resource('doctor','Admin\DoctorController');
    Route::resource('disease','Admin\DiseaseController');
    Route::resource('symptom','Admin\SymptomController');
    Route::resource('work','Admin\WorkController');
    Route::resource('medicine','Admin\MedicineController');
    Route::resource('appointment','Admin\AppointmentController');
});
