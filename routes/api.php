<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function(){

    Route::get('/device','App\Http\Controllers\DeviceController@index');
    Route::post('/device','App\Http\Controllers\DeviceController@store');
    Route::get('/count/device','App\Http\Controllers\DeviceController@countDevice');
    Route::delete('/device/{id}','App\Http\Controllers\DeviceController@destroy');

});


Route::get('/pattern','App\Http\Controllers\PatternController@index');
Route::post('/pattern','App\Http\Controllers\PatternController@store');


Route::get('/issue','App\Http\Controllers\IssueController@index');
Route::post('/issue','App\Http\Controllers\IssueController@store');
Route::get('/count/issue','App\Http\Controllers\IssueController@countIssue');

Route::get('/assessment','App\Http\Controllers\AssessmentController@index');
Route::post('/assessment','App\Http\Controllers\AssessmentController@store');
Route::get('/assessment/{id}','App\Http\Controllers\AssessmentController@showIdIssue');
Route::get('/assessment/{id}/problem/{problem}','App\Http\Controllers\AssessmentController@showIdIssueProblem');
Route::get('/assessment-total-yn','App\Http\Controllers\AssessmentController@countYesNoIdIssue');
Route::get('/assessment-by-id-issue','App\Http\Controllers\AssessmentController@countYesNoByIdIssue');
Route::get('/assessment-by-id-device','App\Http\Controllers\AssessmentController@countYesNoByIdDevice');
Route::get('/assessment-by-device','App\Http\Controllers\AssessmentController@countYesNoByDevice');
Route::get('/assessment-by-device-model','App\Http\Controllers\AssessmentController@countYesNoByDeviceModel');

Route::get('/user','App\Http\Controllers\UserController@index');
Route::post('/user','App\Http\Controllers\UserController@store');

Route::post('/login','App\Http\Controllers\LoginController@login');
Route::get('/logout','App\Http\Controllers\LoginController@logout');
    
 