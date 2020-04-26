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

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('cekrole');
Route::get('/homeUser', 'HomeController@indexUser')->name('homeUser');
Route::get('district/{id}', 'HomeController@district')->name('district');
Route::get('subDistrict/{id_province}/{id_district}', 'HomeController@subDistrict')->name('subDistrict');

Route::prefix('admin')->group(function (){
    Route::get('added-instance','AdminController@added_instance')->name('indexAddedInstance');
    Route::post('addedInstance','AdminController@addedInstance')->name('addedInstance');
    Route::get('report-verification','AdminController@report_verification')->name('indexReportVerification');
    Route::get('report-details/{id}','AdminController@report_details')->name('reportDetails');
    Route::get('accept/{id}','AdminController@accept')->name('accept');
    Route::post('reject','AdminController@reject')->name('reject');
});
Route::prefix('instance')->group(function (){
    Route::get('instance-data','InstanceController@instance_data')->name('indexInstanceData');
    Route::post('added-instance-data', 'InstanceController@addedInstanceData')->name('addedInstanceData');
    Route::get('report-data','InstanceController@report_data')->name('indexReportData');
    Route::get('report-details-instance/{id}','InstanceController@report_details_instance')->name('reportDetailsInstance');
    Route::post('response','InstanceController@response')->name('response');
    Route::get('delete-response/{id}/{id_report}','InstanceController@delete_response')->name('deleteResponse');
});
Route::prefix('user')->group(function (){
    Route::get('report-form','UserController@report_form')->name('indexReportForm');
    Route::post('added-report-data', 'UserController@addedReportData')->name('addedReportData');
    Route::get('my-report','UserController@my_report')->name('indexMyReport');
    Route::get('report-details-user/{id}','UserController@report_detail_user')->name('indexReportDetailUser');
    Route::post('added-report-comment', 'UserController@addedReportComment')->name('addedReportComment');
    Route::get('done-report-user/{id}','UserController@done_report_user')->name('doneReportUser');
    Route::get('delete-report/{id}','UserController@delete_report')->name('deleteReport');
    Route::get('delete-comment/{id}/{id_report}','UserController@delete_comment')->name('deleteComment');
    Route::post('response-user', 'UserController@response_user')->name('responseUser');
    Route::get('delete-response-user/{id}/{id_report}','UserController@delete_response_user')->name('deleteResponseUser');
    Route::get('support/{id}','UserController@support')->name('support');
    Route::get('export','UserController@export')->name('export');

});
Route::prefix('api')->group(function (){
    Route::get('report-api','BukaLaporApiController@report_api')->name('reportApi');
    Route::post('create-report-api','BukaLaporApiController@create_report_api')->name('createReportApi');
});
Route::get('auth/google', 'Auth\Socialite\GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\Socialite\GoogleController@handleGoogleCallback');
