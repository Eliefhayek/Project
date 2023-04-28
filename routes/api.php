<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\questionController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\ServiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/banner',[BannerController::class,'store']);
Route::get('/banner',[BannerController::class,'index']);
Route::get('/banner/{id}',[BannerController::class,'show']);
Route::delete('/banner/{id}',[BannerController::class,'destroy']);
Route::put('/banner/{id}',[BannerController::class,'update']);

Route::post('/section',[SectionController::class,'store']);
Route::get('/section',[SectionController::class,'index']);
Route::get('/section/{id}',[SectionController::class,'show']);
Route::delete('/section/{id}',[SectionController::class,'destroy']);
Route::put('/section/{id}',[SectionController::class,'update']);

Route::post('/service',[ServiceController::class,'store']);
Route::get('/service',[ServiceController::class,'index']);
Route::get('/service/{id}',[ServiceController::class,'show']);
Route::delete('/service/{id}',[ServiceController::class,'destroy']);
Route::put('/service/{id}',[ServiceController::class,'update']);

Route::post('/cat',[CategoryController::class,'store']);
Route::get('/cat',[CategoryController::class,'index']);
Route::get('/cat/{id}',[CategoryController::class,'show']);
Route::delete('/cat/{id}',[CategoryController::class,'destroy']);
Route::put('/cat/{id}',[CategoryController::class,'update']);

Route::post('/question',[questionController::class,'store']);
Route::get('/question',[questionController::class,'index']);
Route::get('/question/{id}',[questionController::class,'show']);
Route::delete('/question/{id}',[questionController::class,'destroy']);
Route::put('/question/{id}',[questionController::class,'update']);

