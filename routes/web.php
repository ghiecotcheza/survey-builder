<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SurveyController;



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

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/survey/create', [SurveyController::class, 'create']);
Route::post('/survey/create', [SurveyController::class, 'store']);
Route::get('/survey/show/{survey}', [SurveyController::class, 'show'])->name('survey.show');

Route::get('/survey/{id}/question/create', [QuestionController::class, 'create'] );
Route::post('/survey/{id}/question', [QuestionController::class, 'store'] );




