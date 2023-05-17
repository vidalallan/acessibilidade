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
    Route::get('/device/count','App\Http\Controllers\DeviceController@countDevice');
    Route::delete('/device/{id}','App\Http\Controllers\DeviceController@destroy');


    Route::post('/issue','App\Http\Controllers\IssueController@store');
    Route::get('/issue/count','App\Http\Controllers\IssueController@countIssue');
    Route::delete('/issue/{id}','App\Http\Controllers\IssueController@destroy');


    Route::get('/accessibility-problem','App\Http\Controllers\IssueController@index');
    Route::get('/problems-evaluated','App\Http\Controllers\IssueController@problemsEvaluated');
    Route::get('/problems-filter','App\Http\Controllers\IssueController@filterProblemsApi');
    Route::get('/problems-detailed-by-id/{id}','App\Http\Controllers\IssueController@detailedProblemById');


    Route::get('/problems-common','App\Http\Controllers\ProblemController@commonProblems');
    

    Route::get('/severity-level','App\Http\Controllers\SeverityLevelController@index');
    Route::post('/severity-level','App\Http\Controllers\SeverityLevelController@store');
    Route::get('/severity-level/list-problem','App\Http\Controllers\SeverityLevelController@listProblemByLevelSeverityApi');


    Route::get('/user','App\Http\Controllers\UserController@index');
    Route::delete('/user/{id}','App\Http\Controllers\UserController@destroy');
    Route::get('/user/count','App\Http\Controllers\UserController@countUser');
    Route::get('/user/filter','App\Http\Controllers\UserController@queryByEmail');



    Route::post('/assessment','App\Http\Controllers\AssessmentController@store');
    Route::get('/assessment/count','App\Http\Controllers\AssessmentController@countAssessment');


    Route::get('/pattern','App\Http\Controllers\PatternController@index');
    Route::post('/pattern','App\Http\Controllers\PatternController@store');

});





Route::get('/issue','App\Http\Controllers\IssueController@index');








Route::get('/assessment','App\Http\Controllers\AssessmentController@index');

Route::get('/assessment/{id}','App\Http\Controllers\AssessmentController@showIdIssue');
Route::get('/assessment/{id}/problem/{problem}','App\Http\Controllers\AssessmentController@showIdIssueProblem');
Route::get('/assessment-total-yn','App\Http\Controllers\AssessmentController@countYesNoIdIssue');
Route::get('/assessment-by-id-issue','App\Http\Controllers\AssessmentController@countYesNoByIdIssue');
Route::get('/assessment-by-id-device','App\Http\Controllers\AssessmentController@countYesNoByIdDevice');
Route::get('/assessment-by-device','App\Http\Controllers\AssessmentController@countYesNoByDevice');
Route::get('/assessment-by-device-model','App\Http\Controllers\AssessmentController@countYesNoByDeviceModel');


Route::post('/user','App\Http\Controllers\UserController@store');
Route::post('/login','App\Http\Controllers\LoginController@login');
Route::get('/logout','App\Http\Controllers\LoginController@logout');