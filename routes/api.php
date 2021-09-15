<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Homesection1Controller;
use App\Http\Controllers\Homesection2Controller;
use App\Http\Controllers\Homesection3Controller;
use App\Http\Controllers\Homesection5Controller;

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

//Home section2
Route::post('homesection2Add',[Homesection2Controller::class,'homesection2Add']);
Route::get('homesection2Get',[Homesection2Controller::class,'homesection2Get']);
Route::post('homesection2Delete/{id}',[Homesection2Controller::class,'homesection2Delete']);
Route::post('homesection2Update/{id}',[Homesection2Controller::class,'homesection2Update']);

//Home section3
Route::post('homesection3Add',[Homesection3Controller::class,'homesection3Add']);
Route::get('homesection3Get',[Homesection3Controller::class,'homesection3Get']);
Route::post('homesection3Delete/{id}',[Homesection3Controller::class,'homesection3Delete']);
Route::post('homesection3Update/{id}',[Homesection3Controller::class,'homesection3Update']);

//Home section5
Route::post('homesection5Add',[Homesection5Controller::class,'homesection5Add']);
Route::get('homesection5Get',[Homesection5Controller::class,'homesection5Get']);
Route::post('homesection5Delete/{id}',[Homesection5Controller::class,'homesection5Delete']);
Route::post('homesection5Update/{id}',[Homesection5Controller::class,'homesection5Update']);