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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});

Route::post('login', [AuthController::class, 'signin'])->name('login');



Route::middleware('auth:sanctum')
    ->namespace('Api\\V1')
    ->group(function() {
        Route::get('users/me/surveys', [SurveyController::class, 'index'])->name('survey.index');
        Route::get('users/me/surveys/{survey}', [SurveyController::class, 'show'])->name('survey.show');
        Route::post('users/me/surveys', [SurveyController::class, 'store'])->name('survey.store');
        Route::patch('users/me/surveys/{survey}', [SurveyController::class, 'update'])->name('survey.update');
        Route::delete('users/me/surveys/{survey}', [SurveyController::class, 'destroy'])->name('survey.destroy');

        Route::post('surveys/{survey}/questions',[QuestionController::class, 'create'])->name('create.question');

    });


// Route::prefix('surveys')->group(function(){
//     Route::apiResource('', SurveyController::class);
// });
