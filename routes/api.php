<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\questionController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\ServiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\User;

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
Route::middleware('loginauth')->group(function(){

Route::post('/banner',[BannerController::class,'store']);
Route::get('/banner',[BannerController::class,'index']);
Route::get('/banner/{id}',[BannerController::class,'show']);
Route::delete('/banner/{id}',[BannerController::class,'destroy']);


Route::post('/section',[SectionController::class,'store']);
Route::get('/section',[SectionController::class,'index']);
Route::get('/section/{id}',[SectionController::class,'show']);
Route::delete('/section/{id}',[SectionController::class,'destroy']);


Route::post('/service',[ServiceController::class,'store']);
Route::get('/service',[ServiceController::class,'index']);
Route::get('/service/{id}',[ServiceController::class,'show']);
Route::delete('/service/{id}',[ServiceController::class,'destroy']);


Route::post('/cat',[CategoryController::class,'store']);
Route::get('/cat',[CategoryController::class,'index']);
Route::get('/cat/{id}',[CategoryController::class,'show']);
Route::delete('/cat/{id}',[CategoryController::class,'destroy']);


Route::post('/question',[questionController::class,'store']);
Route::get('/question',[questionController::class,'index']);
Route::get('/question/{id}',[questionController::class,'show']);
Route::delete('/question/{id}',[questionController::class,'destroy']);


});
Route::middleware('editorauth')->group(function(){
    Route::put('/question/{id}',[questionController::class,'update']);
    Route::put('/cat/{id}',[CategoryController::class,'update']);
    Route::put('/service/{id}',[ServiceController::class,'update']);
    Route::put('/section/{id}',[SectionController::class,'update']);
    Route::put('/banner/{id}',[BannerController::class,'update']);
});
# when trying to run an api.php we have to take the api token and place in a header named Autharization
Route::post('/signup',[LoginController::class,'Signup']);
Route::post('/login',[LoginController::class,'Login']);
Route::get('/getsections',[SectionController::class,'section']);
Route::get('getservices',[ServicesController::class,'services']);
Route::get('/getcat',[CategoryController::class,'display']);
Route::get('/getusers',[LoginController::class,'displayUser']);

Route::post('/files',[FileController::class,'store']);
Route::post('/privatefiles',[FileController::class,'privateStore']);

Route::middleware('validate')->group(function(){
    Route::get('/privateImages',[FileController::class,'getPrivateImages']);
});
