<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\FollowController;
use App\Http\Controllers\Api\TweetController;
use App\Http\Controllers\ReportController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login'])->middleware("throttle-api");

Route::group(['prefix' => 'tweets', 'middleware' => 'auth.api'], function () {

    Route::post('/create', [TweetController::class, 'create']);
});
Route::group(['prefix' => 'follow', 'middleware' => 'auth.api'], function () {
    Route::get('change/{id}', [FollowController::class, 'followChange']);
});

Route::get('report/download', [ReportController::class, 'download']);
