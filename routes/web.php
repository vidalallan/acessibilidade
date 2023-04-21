<?php

use Illuminate\Support\Facades\Route;

use App\Http\Middleware\Authenticate;

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



Route::get('/dashboard', function () {
    return view('panel.dashboard');
})->middleware(Authenticate::class);

Route::get('dispositivos/{idDevice}/editar','App\Http\Controllers\DeviceController@edit')->middleware(Authenticate::class);
Route::get('/dispositivos','App\Http\Controllers\DeviceController@indexView')->middleware(Authenticate::class);
Route::post('/dispositivos','App\Http\Controllers\DeviceController@storeView')->middleware(Authenticate::class);
Route::get('/dispositivos/{idDevice}','App\Http\Controllers\DeviceController@destroyView')->middleware(Authenticate::class);

Route::get('/usuarios/{id}/editar','App\Http\Controllers\UserController@edit')->middleware(Authenticate::class);
Route::get('/usuarios','App\Http\Controllers\UserController@indexView')->middleware(Authenticate::class);
Route::get('/usuarios/{id}','App\Http\Controllers\UserController@destroyView')->middleware(Authenticate::class);

Route::get('/padroes','App\Http\Controllers\PatternController@indexView')->middleware(Authenticate::class);
Route::post('/padroes','App\Http\Controllers\PatternController@storeView')->middleware(Authenticate::class);
Route::get('/padroes/{idPattern}','App\Http\Controllers\PatternController@destroyView')->middleware(Authenticate::class);

Route::get('/problemas','App\Http\Controllers\IssueController@indexView')->middleware(Authenticate::class);

Route::post('/problemas','App\Http\Controllers\IssueController@storeView')->middleware(Authenticate::class);
Route::get('/problemas/{idIssue}','App\Http\Controllers\IssueController@destroyView')->middleware(Authenticate::class);
Route::get('/problemas-avaliados','App\Http\Controllers\IssueController@indexAvaliacoesView')->middleware(Authenticate::class);
Route::get('/query-filter','App\Http\Controllers\IssueController@queryFilter')->middleware(Authenticate::class);

Route::get('/dashboard','App\Http\Controllers\IssueController@indexViewDashboard')->middleware(Authenticate::class);

Route::get('/problemas-adicionar','App\Http\Controllers\IssueController@indexView2');

Route::get('/avaliacoes','App\Http\Controllers\AssessmentController@indexView')->middleware(Authenticate::class);
Route::get('/avaliacoes/{idAssessment}','App\Http\Controllers\AssessmentController@destroyView')->middleware(Authenticate::class);
Route::post('/avaliar-problema','App\Http\Controllers\AssessmentController@storeViewProblemDetail')->middleware(Authenticate::class);
Route::get('/problema-detalhado/{idIssue}','App\Http\Controllers\IssueController@queryQuestionsPanelbyParameter')->name('problema-detalhado')->middleware(Authenticate::class);



Route::get('/inscrever-usuario', function () {
    return view('sign-up');
});

Route::post('/criar-usuario','App\Http\Controllers\UserController@storeView');

Route::get('/login', function () {
    return view('sign-in');
});

Route::post('/login','App\Http\Controllers\LoginController@loginView')->name('login');
Route::get('/logout','App\Http\Controllers\LoginController@logoutView');

Route::get('/questions','App\Http\Controllers\IssueController@indexView2');

Route::get('/consultar-questoes','App\Http\Controllers\IssueController@queryQuestionsWithOutParameter');
Route::get('/questao-detalhada/{idIssue}','App\Http\Controllers\IssueController@queryQuestionsbyParameter');
//Route::get('/questao-detalhada/{idIssue}','App\Http\Controllers\AssessmentController@queryAssessmentEvaluation');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/tables', function () {
    return view('panel.tables');
});


Route::get('/todas-avaliacoes-sn','App\Http\Controllers\AssessmentController@countYesNoIdIssueView');