<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\QuestionController;
use App\Http\Controllers\Api\V1\SurveyController;

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


Route::middleware('auth:sanctum')
    ->namespace('Api\\V1')
    ->group(function () {

        //Login.
        Route::post('login', [AuthController::class, 'signin'])->name('login');

        //Survey.
        Route::get('users/me/surveys', [SurveyController::class, 'index'])->name('survey.index');
        Route::get('users/me/surveys/{survey}', [SurveyController::class, 'show'])->name('survey.show');
        Route::post('users/me/surveys', [SurveyController::class, 'store'])->name('survey.store');
        Route::patch('users/me/surveys/{survey}', [SurveyController::class, 'update'])->name('survey.update');
        Route::delete('users/me/surveys/{survey}', [SurveyController::class, 'destroy'])->name('survey.delete');
        //Questions.
        Route::post('surveys/{survey}/questions', [QuestionController::class, 'store'])->name('question.store');
        Route::patch('surveys/{survey}/questions/{question}', [QuestionController::class, 'update'])->name('question.update');
        Route::delete('surveys/{survey}/questions/{question}', [QuestionController::class, 'destroy'])->name('question.destroy');

    //I just need to make some changes to test the git branching etc
    
    
    });