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

Route::apiResources([
    'polls' => \App\Http\Controllers\API\PollsController::class,
]);

Route::apiResource('types', \App\Http\Controllers\API\PollTypesController::class, [
    'parameters' => [
        'types' => 'poll_types'
    ]
]);

Route::apiResource('questions', \App\Http\Controllers\API\PollQuestionsController::class, [
    'parameters' => [
        'questions' => 'poll_questions'
    ]
]);

Route::apiResource('results', \App\Http\Controllers\API\PollResultsController::class, [
    'parameters' => [
        'results' => 'poll_results'
    ]
]);
