<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseDetailsController;
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

// Route::get('/test','ApiController@index');
Route::get('/test/{name}',[ApiController::class, 'index']);
Route::post('/form',[ApiController::class, 'create']);
Route::get('/show',[ApiController::class, 'show']);

Route::get('/test2/{name}',[CourseController::class, 'index']);
Route::post('/form2',[CourseController::class, 'store']);
Route::get('/show2',[CourseController::class, 'create']);
Route::delete('/user/delete3/{id}',[CourseController::class, 'destroy']);

Route::get('/test3/{name}',[UserController::class, 'index']);
Route::post('/form3',[UserController::class, 'store']);
Route::get('/show3',[UserController::class, 'create']);
Route::put('/update/{id}',[UserController::class, 'update']);
Route::delete('/delete3/{id}',[UserController::class, 'destroy']);

Route::get('/test4/{name}',[CourseDetailsController::class, 'index']);
Route::post('/form4',[CourseDetailsController::class, 'store']);
Route::get('/show4',[CourseDetailsController::class, 'create']);
Route::delete('/delete4/{id}',[CourseDetailsController::class, 'destroy']);