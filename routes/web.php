<?php

use App\Http\Controllers\AlternativeComparisonController;
use App\Http\Controllers\AlternativeController;
use App\Http\Controllers\CalculateController;
use App\Http\Controllers\CriteriaComparisonController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ValueWeightController;
use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Models\CriteriaComparison;
use App\Models\Question;

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
    // return view('home', [
    //     "title" => "E-Learning Readiness",
    //     "active" => 'scholarship acceptance'
    // ]);
    return view('scoring.home', [
        "title" => "E-Learning Readiness",
        "active" => 'scholarship acceptance'
    ]);
});

Route::get('/admin', function () {
    // return view('home', [
    //     "title" => "E-Learning Readiness",
    //     "active" => 'scholarship acceptance'
    // ]);
    return view('home', [
        "title" => "E-Learning Readiness",
        "active" => 'scholarship acceptance'
    ]);
});


// Route::get('/about', function () {
//     return view('about', [
//         "title" => "About",
//         "active" => 'about',
//     ]);
// });

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');;

Route::post('/register', [RegisterController::class, 'store']);

Route::match(['get', 'post'], '/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
// Route::post('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/respondents', [UserController::class, 'index'])->name('respondents')->middleware('auth');



// Route::get('/dashboard-user', function() {
//     return view('dashboardU.index');
// })->middleware('auth');



Route::resource('/alternative', AlternativeController::class);
Route::get('/alternative/delete/{id}', [AlternativeController::class, 'delete']);

Route::match(['get', 'post'], '/survey', [SurveyController::class, 'survey'])->name('survey')->middleware('guest');
// Route::post('/survey/start', [SurveyController::class, 'start'])->name('survey.start');
Route::match(['get', 'post'],'/survey/form', [SurveyController::class, 'form'])->name('survey.form');
Route::post('/survey/submit', [SurveyController::class, 'submit'])->name('survey.submit');
Route::get('/survey/summary', [SurveyController::class, 'summary'])->name('survey.summary');
// Route::get('/survey', [SurveyController::class, 'survey'])->name('survey')->middleware('guest');
// Route::post('/survey', [SurveyController::class, 'store'])->name('survey.store');







Route::resource('/question', QuestionController::class);
Route::get('/question/{id}', [QuestionController::class, 'get']);

Route::resource('/criteria', CriteriaController::class);
Route::get('/criteria/delete/{id}', [CriteriaController::class, 'delete']);

Route::resource('/value-weight', ValueWeightController::class);
Route::get('/value-weight/delete/{id}', [ValueWeightController::class, 'delete']);

Route::prefix('/calculate')->group(function () {

    Route::get('/criteria-comparison', [CriteriaComparisonController::class, 'index']);
    Route::post('/criteria-comparison', [CriteriaComparisonController::class, 'store'])->name('criteria-comparison.store');

    Route::get('/alternative-comparison', [AlternativeComparisonController::class, 'index']);
    Route::get('/alternative-comparison/{id}', [AlternativeComparisonController::class, 'show']);
    Route::post('/alternative-comparison', [AlternativeComparisonController::class, 'store'])->name('alternative-comparison.store');

    Route::get('/result', [CalculateController::class, 'index']);
//    Route::get('/result/download', [CalculateController::class, 'downloadPdf'])->name('calculate-download');
    Route::get('/result/print', [CalculateController::class, 'report'])->name('calculate-report');
    Route::get('/result/print/decree', [CalculateController::class, 'decree'])->name('decree');

});


