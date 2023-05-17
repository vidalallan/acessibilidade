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

Route::get('dispositivos/{idDevice}/editar','App\Http\Controllers\DeviceController@edit')->middleware(['only.admin']);
Route::get('/dispositivos','App\Http\Controllers\DeviceController@indexView')->middleware(['only.admin']);
Route::post('/dispositivos','App\Http\Controllers\DeviceController@storeView')->middleware(Authenticate::class);
Route::get('/dispositivos/{idDevice}','App\Http\Controllers\DeviceController@destroyView')->middleware(['only.admin']);
Route::post('/dispositivo/update/{id}','App\Http\Controllers\DeviceController@update')->middleware(['only.admin']);

Route::get('/usuarios/{id}/editar','App\Http\Controllers\UserController@edit')->middleware(['only.admin']);
Route::get('/usuarios','App\Http\Controllers\UserController@indexView')->middleware(['only.admin']);
Route::get('/usuarios/{id}','App\Http\Controllers\UserController@destroyView')->middleware(['only.admin']);
Route::post('/usuario/update/{id}','App\Http\Controllers\UserController@update')->middleware(['only.admin']);
Route::post('/usuario/adicionar','App\Http\Controllers\UserController@storeViewPanel')->middleware(['only.admin']);
Route::get('/alterar-senha','App\Http\Controllers\UserController@showUserById')->middleware(Authenticate::class);
Route::post('/change-password/{id}','App\Http\Controllers\UserController@changePassById')->middleware(Authenticate::class);

Route::get('/padroes','App\Http\Controllers\PatternController@indexView')->middleware(['only.admin']);
Route::post('/padroes','App\Http\Controllers\PatternController@storeView')->middleware(['only.admin']);
Route::get('/padroes/{idPattern}','App\Http\Controllers\PatternController@destroyView')->middleware(['only.admin']);

Route::get('/problemas','App\Http\Controllers\IssueController@indexView')->middleware(Authenticate::class);
Route::post('/problemas','App\Http\Controllers\IssueController@storeView')->middleware(Authenticate::class);
Route::get('/problemas/{idIssue}','App\Http\Controllers\IssueController@destroyView')->middleware(Authenticate::class);
Route::get('/problemas-avaliados','App\Http\Controllers\IssueController@indexAvaliacoesView')->middleware(Authenticate::class);
Route::get('/problemas-pesquisar','App\Http\Controllers\IssueController@researchProblems')->middleware(Authenticate::class);
Route::get('/problemas-por-usuario','App\Http\Controllers\IssueController@researchProblemsByUser')->middleware(Authenticate::class);
Route::get('/query-filter','App\Http\Controllers\IssueController@queryFilter')->middleware(Authenticate::class);
Route::get('/problemas-filtrar','App\Http\Controllers\IssueController@filterProblems')->middleware(Authenticate::class);
Route::get('/problemas-filtrar-por-user','App\Http\Controllers\IssueController@filterProblemsByUser')->middleware(Authenticate::class);
Route::get('/problemas-adicionar','App\Http\Controllers\IssueController@indexView2');
Route::get('/problema-detalhado/{idIssue}','App\Http\Controllers\IssueController@queryQuestionsPanelbyParameter')->name('problema-detalhado')->middleware(Authenticate::class);
Route::get('/problemas/{id}/editar','App\Http\Controllers\IssueController@edit')->middleware(Authenticate::class);
Route::post('/problemas/update/{id}','App\Http\Controllers\IssueController@update')->middleware(Authenticate::class);
Route::get('/severity-level/list-problem','App\Http\Controllers\SeverityLevelController@listProblemByLevelSeverityApi')->middleware(Authenticate::class);
Route::get('/problemas-frequentes','App\Http\Controllers\ProblemController@commonProblemsView');
Route::get('/download-csv', 'App\Http\Controllers\IssueController@download')->name('download.csv')->middleware(Authenticate::class);


Route::get('/dashboard','App\Http\Controllers\IssueController@indexViewDashboard')->middleware(Authenticate::class);
Route::get('/description','App\Http\Controllers\IssueController@getDescriptionProblem')->middleware(Authenticate::class);

Route::get('/avaliacoes','App\Http\Controllers\AssessmentController@indexView')->middleware(Authenticate::class);
Route::get('/avaliacoes/{idAssessment}','App\Http\Controllers\AssessmentController@destroyView')->middleware(Authenticate::class);
Route::post('/avaliar-problema','App\Http\Controllers\AssessmentController@storeViewProblemDetail')->middleware(Authenticate::class);
Route::get('/avaliacoes/{id}/editar','App\Http\Controllers\AssessmentController@edit')->middleware(Authenticate::class);
Route::post('/avaliacoes/update/{id}','App\Http\Controllers\AssessmentController@update')->middleware(Authenticate::class);

Route::get('/niveis-gravidade','App\Http\Controllers\SeverityLevelController@indexView')->middleware(['only.admin']);
Route::get('/nivel-gravidade/{id}','App\Http\Controllers\SeverityLevelController@destroyView')->middleware(['only.admin']);
Route::post('/nivel-gravidade','App\Http\Controllers\SeverityLevelController@storeView')->middleware(['only.admin']);
Route::get('/nivel-gravidade/{id}/editar','App\Http\Controllers\SeverityLevelController@edit')->middleware(['only.admin']);
Route::post('/nivel-gravidade/update/{id}','App\Http\Controllers\SeverityLevelController@update')->middleware(['only.admin']);

Route::get('/relatorio-nivel-gravidade','App\Http\Controllers\SeverityLevelController@listProblemByLevelSeverity')->middleware(Authenticate::class);


Route::get('/inscrever-usuario', function () {
    return view('sign-up');
});

Route::post('/criar-usuario','App\Http\Controllers\UserController@storeView');

Route::get('/login', function () {
    return view('sign-in');
});

Route::post('/login','App\Http\Controllers\LoginController@loginView')->name('login');
Route::get('/logout','App\Http\Controllers\LoginController@logoutView');

Route::get('/consultar-questoes','App\Http\Controllers\IssueController@queryQuestionsWithOutParameter');
Route::get('/questao-detalhada/{idIssue}','App\Http\Controllers\IssueController@queryQuestionsbyParameter');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/tables', function () {
    return view('panel.tables');
});

Route::get('/todas-avaliacoes-sn','App\Http\Controllers\AssessmentController@countYesNoIdIssueView');



