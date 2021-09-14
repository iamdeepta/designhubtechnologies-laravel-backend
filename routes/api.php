<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Homesection1Controller;

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

//Admin
Route::post('login',[AdminController::class,'login']);

//Home Section1
Route::post('homesection1Add',[Homesection1Controller::class,'homesection1Add']);
Route::get('homesection1Get',[Homesection1Controller::class,'homesection1Get']);
Route::post('homesection1Delete/{id}',[Homesection1Controller::class,'homesection1Delete']);
Route::post('homesection1Update/{id}',[Homesection1Controller::class,'homesection1Update']);
