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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('district/{id}', 'HomeController@district')->name('district');
Route::get('subDistrict/{id_province}/{id_district}', 'HomeController@subDistrict')->name('subDistrict');

Route::prefix('admin')->group(function (){
    Route::get('added-instance','AdminController@added_instance')->name('indexAddedInstance');
    Route::post('addedInstance','AdminController@addedInstance')->name('addedInstance');
});
Route::prefix('instance')->group(function (){
    Route::get('instance-data','InstanceController@instance_data')->name('indexInstanceData');
    Route::post('added-instance-data', 'InstanceController@addedInstanceData')->name('addedInstanceData');
});
Route::prefix('user')->group(function (){
    Route::get('report-form','UserController@report_form')->name('indexReportForm');
    Route::post('added-report-data', 'UserController@addedReportData')->name('addedReportData');
});
Route::get('auth/google', 'Auth\Socialite\GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\Socialite\GoogleController@handleGoogleCallback');
