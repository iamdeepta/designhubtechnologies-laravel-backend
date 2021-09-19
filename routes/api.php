<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Homesection1Controller;
use App\Http\Controllers\Homesection2Controller;
use App\Http\Controllers\Homesection3Controller;
use App\Http\Controllers\Homesection5Controller;
use App\Http\Controllers\Homesection8Controller;
use App\Http\Controllers\Homesection6Controller;
use App\Http\Controllers\Homesection6MainController;
use App\Http\Controllers\Homesection7Controller;
use App\Http\Controllers\Homesection7MainController;
use App\Http\Controllers\Homesection4Controller;
use App\Http\Controllers\Homesection4MainController;

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
Route::post('homesection1UpdateImage1/{name?}',[Homesection1Controller::class,'homesection1UpdateImage1'])->where('name', '(.*)');
Route::post('homesection1UpdateImage2/{name?}',[Homesection1Controller::class,'homesection1UpdateImage2'])->where('name', '(.*)');
Route::post('homesection1UpdateImage3/{name?}',[Homesection1Controller::class,'homesection1UpdateImage3'])->where('name', '(.*)');
Route::post('homesection1UpdateImage4/{name?}',[Homesection1Controller::class,'homesection1UpdateImage4'])->where('name', '(.*)');

//Home section2
Route::post('homesection2Add',[Homesection2Controller::class,'homesection2Add']);
Route::get('homesection2Get',[Homesection2Controller::class,'homesection2Get']);
Route::post('homesection2Delete/{id}',[Homesection2Controller::class,'homesection2Delete']);
Route::post('homesection2Update/{id}',[Homesection2Controller::class,'homesection2Update']);
Route::post('homesection2UpdateImage/{name?}',[Homesection2Controller::class,'homesection2UpdateImage'])->where('name', '(.*)');

//Home section3
Route::post('homesection3Add',[Homesection3Controller::class,'homesection3Add']);
Route::get('homesection3Get',[Homesection3Controller::class,'homesection3Get']);
Route::post('homesection3Delete/{id}',[Homesection3Controller::class,'homesection3Delete']);
Route::post('homesection3Update/{id}',[Homesection3Controller::class,'homesection3Update']);
Route::post('homesection3UpdateImage/{name?}',[Homesection3Controller::class,'homesection3UpdateImage'])->where('name', '(.*)');

//Home section5
Route::post('homesection5Add',[Homesection5Controller::class,'homesection5Add']);
Route::get('homesection5Get',[Homesection5Controller::class,'homesection5Get']);
Route::post('homesection5Delete/{id}',[Homesection5Controller::class,'homesection5Delete']);
Route::post('homesection5Update/{id}',[Homesection5Controller::class,'homesection5Update']);

//Home section8
Route::post('homesection8Add',[Homesection8Controller::class,'homesection8Add']);
Route::get('homesection8Get',[Homesection8Controller::class,'homesection8Get']);
Route::post('homesection8Delete/{id}',[Homesection8Controller::class,'homesection8Delete']);
Route::post('homesection8Update/{id}',[Homesection8Controller::class,'homesection8Update']);

//Home section6
Route::post('homesection6Add',[Homesection6Controller::class,'homesection6Add']);
Route::get('homesection6Get',[Homesection6Controller::class,'homesection6Get']);
Route::post('homesection6Delete/{id}',[Homesection6Controller::class,'homesection6Delete']);
Route::post('homesection6Update/{id}',[Homesection6Controller::class,'homesection6Update']);

//Home section6 main
Route::post('homesection6MainAdd',[Homesection6MainController::class,'homesection6MainAdd']);
Route::get('homesection6MainGet',[Homesection6MainController::class,'homesection6MainGet']);
Route::post('homesection6MainDelete/{id}',[Homesection6MainController::class,'homesection6MainDelete']);
Route::post('homesection6MainUpdate/{id}',[Homesection6MainController::class,'homesection6MainUpdate']);
Route::post('homesection6MainUpdateImage/{name?}',[Homesection6MainController::class,'homesection6MainUpdateImage'])->where('name', '(.*)');

//Home section7
Route::post('homesection7Add',[Homesection7Controller::class,'homesection7Add']);
Route::get('homesection7Get',[Homesection7Controller::class,'homesection7Get']);
Route::post('homesection7Delete/{id}',[Homesection7Controller::class,'homesection7Delete']);
Route::post('homesection7Update/{id}',[Homesection7Controller::class,'homesection7Update']);

//Home section7 main
Route::post('homesection7MainAdd',[Homesection7MainController::class,'homesection7MainAdd']);
Route::get('homesection7MainGet',[Homesection7MainController::class,'homesection7MainGet']);
Route::post('homesection7MainDelete/{id}',[Homesection7MainController::class,'homesection7MainDelete']);
Route::post('homesection7MainUpdate/{id}',[Homesection7MainController::class,'homesection7MainUpdate']);

//Home section4
Route::post('homesection4Add',[Homesection4Controller::class,'homesection4Add']);
Route::get('homesection4Get',[Homesection4Controller::class,'homesection4Get']);
Route::post('homesection4Delete/{id}',[Homesection4Controller::class,'homesection4Delete']);
Route::post('homesection4Update/{id}',[Homesection4Controller::class,'homesection4Update']);

//Home section4 main
Route::post('homesection4MainAdd',[Homesection4MainController::class,'homesection4MainAdd']);
Route::get('homesection4MainGet',[Homesection4MainController::class,'homesection4MainGet']);
Route::post('homesection4MainDelete/{id}',[Homesection4MainController::class,'homesection4MainDelete']);
Route::post('homesection4MainUpdate/{id}',[Homesection4MainController::class,'homesection4MainUpdate']);
Route::post('homesection4MainUpdateIcon/{name?}',[Homesection4MainController::class,'homesection4MainUpdateIcon'])->where('name', '(.*)');
Route::post('homesection4MainUpdateImage1/{name?}',[Homesection4MainController::class,'homesection4MainUpdateImage1'])->where('name', '(.*)');
Route::post('homesection4MainUpdateImage2/{name?}',[Homesection4MainController::class,'homesection4MainUpdateImage2'])->where('name', '(.*)');
Route::post('homesection4MainUpdateImage3/{name?}',[Homesection4MainController::class,'homesection4MainUpdateImage3'])->where('name', '(.*)');