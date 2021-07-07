<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\QuestionOptionController;
use App\Http\Controllers\ResponseAnswerController;

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

Route::get('/survey/new', [SurveyController::class, 'create'])->name('survey.new');
Route::post('/survey/create', [SurveyController::class, 'store'])->name('survey.create');
Route::get('/survey/show', [SurveyController::class, 'index'])->name('survey.index');
Route::get('/survey/{survey}/edit', [SurveyController::class, 'edit'])->name('survey.edit');
Route::post('/survey/{survey}/update', [SurveyController::class, 'update'])->name('survey.update');
Route::delete('/survey/{survey}/delete', [SurveyController::class, 'destroy'])->name('survey.delete');
Route::get('/survey/show/{survey}', [SurveyController::class, 'show'])->name('survey.show');

Route::get('/survey/{survey}/question/create', [QuestionController::class, 'create'])->name('question.create');
Route::post('/survey/{survey}/question/', [QuestionController::class, 'store'])->name('question.store');
Route::get('/survey/{survey}/question/{question}/edit', [QuestionController::class, 'edit'])->name('question.edit');
Route::post('/survey/{survey}/question/{question}/update', [QuestionController::class, 'update'])->name('question.update');

Route::get('/survey/{survey}/question/{question}/options', [QuestionOptionController::class, 'options'])->name('options');
Route::post('/survey/{survey}/question/{question}',[QuestionOptionController::class, 'store'])->name('option.store');
Route::get('/survey/{survey}/question/{question}/options/edit', [QuestionOptionController::class, 'edit'])->name('option.edit');
Route::get('survey/{survey}/question/{question}/options/update', [QuestionOptionController::class, 'update'])->name('option.update');
Route::delete('/survey/{survey}/question/{question}/delete', [QuestionController::class, 'destroy'])->name('question.delete');

Route::get('/survey/{survey}/{surveyTitle}', [ResponseAnswerController::class, 'show'])->name('response.show');
Route::post('/survey/{survey}/response/{surveyTitle}', [ResponseAnswerController::class, 'store'])->name('response.store');



