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
use App\Http\Controllers\Aboutsection1Controller;
use App\Http\Controllers\Aboutsection1MainController;
use App\Http\Controllers\Aboutsection2Controller;
use App\Http\Controllers\Aboutsection2MainController;
use App\Http\Controllers\Servicesection1Controller;
use App\Http\Controllers\Servicesection1MainController;
use App\Http\Controllers\Servicesection2Controller;
use App\Http\Controllers\Servicesdetailssection1Controller;
use App\Http\Controllers\Servicesdetailssection2Controller;
use App\Http\Controllers\Servicesdetailssection2MainController;
use App\Http\Controllers\BlogsectionController;

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
Route::get('homesection2Get3',[Homesection2Controller::class,'homesection2Get3']);
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

//About section1
Route::post('aboutsection1Add',[Aboutsection1Controller::class,'aboutsection1Add']);
Route::get('aboutsection1Get',[Aboutsection1Controller::class,'aboutsection1Get']);
Route::post('aboutsection1Delete/{id}',[Aboutsection1Controller::class,'aboutsection1Delete']);
Route::post('aboutsection1Update/{id}',[Aboutsection1Controller::class,'aboutsection1Update']);

//About section1 Main
Route::post('aboutsection1MainAdd',[Aboutsection1MainController::class,'aboutsection1MainAdd']);
Route::get('aboutsection1MainGet',[Aboutsection1MainController::class,'aboutsection1MainGet']);
Route::post('aboutsection1MainDelete/{id}',[Aboutsection1MainController::class,'aboutsection1MainDelete']);
Route::post('aboutsection1MainUpdate/{id}',[Aboutsection1MainController::class,'aboutsection1MainUpdate']);
Route::post('aboutsection1MainUpdateImage/{name?}',[Aboutsection1MainController::class,'aboutsection1MainUpdateImage'])->where('name', '(.*)');

//About section2
Route::post('aboutsection2Add',[Aboutsection2Controller::class,'aboutsection2Add']);
Route::get('aboutsection2Get',[Aboutsection2Controller::class,'aboutsection2Get']);
Route::post('aboutsection2Delete/{id}',[Aboutsection2Controller::class,'aboutsection2Delete']);
Route::post('aboutsection2Update/{id}',[Aboutsection2Controller::class,'aboutsection2Update']);
Route::post('aboutsection2UpdateImage/{name?}',[Aboutsection2Controller::class,'aboutsection2UpdateImage'])->where('name', '(.*)');

//About section2 main list
Route::post('aboutsection2MainAdd',[Aboutsection2MainController::class,'aboutsection2MainAdd']);
Route::get('aboutsection2MainGet',[Aboutsection2MainController::class,'aboutsection2MainGet']);
Route::post('aboutsection2MainDelete/{id}',[Aboutsection2MainController::class,'aboutsection2MainDelete']);
Route::post('aboutsection2MainUpdate/{id}',[Aboutsection2MainController::class,'aboutsection2MainUpdate']);

//Service section1
Route::post('servicesection1Add',[Servicesection1Controller::class,'servicesection1Add']);
Route::get('servicesection1Get',[Servicesection1Controller::class,'servicesection1Get']);
Route::post('servicesection1Delete/{id}',[Servicesection1Controller::class,'servicesection1Delete']);
Route::post('servicesection1Update/{id}',[Servicesection1Controller::class,'servicesection1Update']);

//Service section1 main
Route::post('servicesection1MainAdd',[Servicesection1MainController::class,'servicesection1MainAdd']);
Route::get('servicesection1MainGet',[Servicesection1MainController::class,'servicesection1MainGet']);
Route::post('servicesection1MainDelete/{id}',[Servicesection1MainController::class,'servicesection1MainDelete']);
Route::post('servicesection1MainUpdate/{id}',[Servicesection1MainController::class,'servicesection1MainUpdate']);
Route::post('servicesection1MainUpdateImage/{name?}',[Servicesection1MainController::class,'servicesection1MainUpdateImage'])->where('name', '(.*)');

//Service section2
Route::post('servicesection2Add',[Servicesection2Controller::class,'servicesection2Add']);
Route::get('servicesection2Get',[Servicesection2Controller::class,'servicesection2Get']);
Route::post('servicesection2Delete/{id}',[Servicesection2Controller::class,'servicesection2Delete']);
Route::post('servicesection2Update/{id}',[Servicesection2Controller::class,'servicesection2Update']);

//Services Details section1
Route::post('servicesdetailssection1Add',[Servicesdetailssection1Controller::class,'servicesdetailssection1Add']);
Route::get('servicesdetailssection1Get',[Servicesdetailssection1Controller::class,'servicesdetailssection1Get']);
Route::post('servicesdetailssection1Delete/{id}',[Servicesdetailssection1Controller::class,'servicesdetailssection1Delete']);
Route::post('servicesdetailssection1Update/{id}',[Servicesdetailssection1Controller::class,'servicesdetailssection1Update']);
Route::post('servicesdetailssection1UpdateImage/{name?}',[Servicesdetailssection1Controller::class,'servicesdetailssection1UpdateImage'])->where('name', '(.*)');

//Services Details section2
Route::post('servicesdetailssection2Add',[Servicesdetailssection2Controller::class,'servicesdetailssection2Add']);
Route::get('servicesdetailssection2Get',[Servicesdetailssection2Controller::class,'servicesdetailssection2Get']);
Route::post('servicesdetailssection2Delete/{id}',[Servicesdetailssection2Controller::class,'servicesdetailssection2Delete']);
Route::post('servicesdetailssection2Update/{id}',[Servicesdetailssection2Controller::class,'servicesdetailssection2Update']);

//Services Details section2 main list
Route::post('servicesdetailssection2MainAdd',[Servicesdetailssection2MainController::class,'servicesdetailssection2MainAdd']);
Route::get('servicesdetailssection2MainGet',[Servicesdetailssection2MainController::class,'servicesdetailssection2MainGet']);
Route::post('servicesdetailssection2MainDelete/{id}',[Servicesdetailssection2MainController::class,'servicesdetailssection2MainDelete']);
Route::post('servicesdetailssection2MainUpdate/{id}',[Servicesdetailssection2MainController::class,'servicesdetailssection2MainUpdate']);

//Blog section
Route::post('blogsectionAdd',[BlogsectionController::class,'blogsectionAdd']);
Route::get('blogsectionGet',[BlogsectionController::class,'blogsectionGet']);
Route::get('blogsectionGet3',[BlogsectionController::class,'blogsectionGet3']);
Route::post('blogsectionDelete/{id}',[BlogsectionController::class,'blogsectionDelete']);
Route::post('blogsectionUpdate/{id}',[BlogsectionController::class,'blogsectionUpdate']);
Route::post('blogsectionUpdateIcon/{name?}',[BlogsectionController::class,'blogsectionUpdateIcon'])->where('name', '(.*)');
Route::post('blogsectionUpdateImage1/{name?}',[BlogsectionController::class,'blogsectionUpdateImage1'])->where('name', '(.*)');
Route::post('blogsectionUpdateImage2/{name?}',[BlogsectionController::class,'blogsectionUpdateImage2'])->where('name', '(.*)');
Route::post('blogsectionUpdateImage3/{name?}',[BlogsectionController::class,'blogsectionUpdateImage3'])->where('name', '(.*)');