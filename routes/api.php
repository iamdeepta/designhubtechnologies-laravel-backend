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
Route::get('homesection1GetSuper',[Homesection1Controller::class,'homesection1GetSuper']);
Route::post('homesection1Delete/{id}',[Homesection1Controller::class,'homesection1Delete']);
Route::post('homesection1Update/{id}',[Homesection1Controller::class,'homesection1Update']);
Route::post('homesection1Approve/{id}',[Homesection1Controller::class,'homesection1Approve']);
Route::post('homesection1Decline/{id}',[Homesection1Controller::class,'homesection1Decline']);
Route::post('homesection1UpdateImage1/{name?}',[Homesection1Controller::class,'homesection1UpdateImage1'])->where('name', '(.*)');
Route::post('homesection1UpdateImage2/{name?}',[Homesection1Controller::class,'homesection1UpdateImage2'])->where('name', '(.*)');
Route::post('homesection1UpdateImage3/{name?}',[Homesection1Controller::class,'homesection1UpdateImage3'])->where('name', '(.*)');
Route::post('homesection1UpdateImage4/{name?}',[Homesection1Controller::class,'homesection1UpdateImage4'])->where('name', '(.*)');

//Home section2
Route::post('homesection2Add',[Homesection2Controller::class,'homesection2Add']);
Route::get('homesection2Get',[Homesection2Controller::class,'homesection2Get']);
Route::get('homesection2GetSuper',[Homesection2Controller::class,'homesection2GetSuper']);
Route::get('homesection2Get3',[Homesection2Controller::class,'homesection2Get3']);
Route::post('homesection2Delete/{id}',[Homesection2Controller::class,'homesection2Delete']);
Route::post('homesection2Update/{id}',[Homesection2Controller::class,'homesection2Update']);
Route::post('homesection2Approve/{id}',[Homesection2Controller::class,'homesection2Approve']);
Route::post('homesection2Decline/{id}',[Homesection2Controller::class,'homesection2Decline']);
Route::post('homesection2UpdateImage/{name?}',[Homesection2Controller::class,'homesection2UpdateImage'])->where('name', '(.*)');

//Home section3
Route::post('homesection3Add',[Homesection3Controller::class,'homesection3Add']);
Route::get('homesection3Get',[Homesection3Controller::class,'homesection3Get']);
Route::get('homesection3GetSuper',[Homesection3Controller::class,'homesection3GetSuper']);
Route::post('homesection3Delete/{id}',[Homesection3Controller::class,'homesection3Delete']);
Route::post('homesection3Update/{id}',[Homesection3Controller::class,'homesection3Update']);
Route::post('homesection3Approve/{id}',[Homesection3Controller::class,'homesection3Approve']);
Route::post('homesection3Decline/{id}',[Homesection3Controller::class,'homesection3Decline']);
Route::post('homesection3UpdateImage/{name?}',[Homesection3Controller::class,'homesection3UpdateImage'])->where('name', '(.*)');

//Home section5
Route::post('homesection5Add',[Homesection5Controller::class,'homesection5Add']);
Route::get('homesection5Get',[Homesection5Controller::class,'homesection5Get']);
Route::get('homesection5GetSuper',[Homesection5Controller::class,'homesection5GetSuper']);
Route::post('homesection5Delete/{id}',[Homesection5Controller::class,'homesection5Delete']);
Route::post('homesection5Update/{id}',[Homesection5Controller::class,'homesection5Update']);
Route::post('homesection5Approve/{id}',[Homesection5Controller::class,'homesection5Approve']);
Route::post('homesection5Decline/{id}',[Homesection5Controller::class,'homesection5Decline']);

//Home section8
Route::post('homesection8Add',[Homesection8Controller::class,'homesection8Add']);
Route::get('homesection8Get',[Homesection8Controller::class,'homesection8Get']);
Route::get('homesection8GetSuper',[Homesection8Controller::class,'homesection8GetSuper']);
Route::post('homesection8Delete/{id}',[Homesection8Controller::class,'homesection8Delete']);
Route::post('homesection8Update/{id}',[Homesection8Controller::class,'homesection8Update']);
Route::post('homesection8Approve/{id}',[Homesection8Controller::class,'homesection8Approve']);
Route::post('homesection8Decline/{id}',[Homesection8Controller::class,'homesection8Decline']);

//Home section6
Route::post('homesection6Add',[Homesection6Controller::class,'homesection6Add']);
Route::get('homesection6Get',[Homesection6Controller::class,'homesection6Get']);
Route::get('homesection6GetSuper',[Homesection6Controller::class,'homesection6GetSuper']);
Route::post('homesection6Delete/{id}',[Homesection6Controller::class,'homesection6Delete']);
Route::post('homesection6Update/{id}',[Homesection6Controller::class,'homesection6Update']);
Route::post('homesection6Approve/{id}',[Homesection6Controller::class,'homesection6Approve']);
Route::post('homesection6Decline/{id}',[Homesection6Controller::class,'homesection6Decline']);

//Home section6 main
Route::post('homesection6MainAdd',[Homesection6MainController::class,'homesection6MainAdd']);
Route::get('homesection6MainGet',[Homesection6MainController::class,'homesection6MainGet']);
Route::get('homesection6MainGetSuper',[Homesection6MainController::class,'homesection6MainGetSuper']);
Route::post('homesection6MainDelete/{id}',[Homesection6MainController::class,'homesection6MainDelete']);
Route::post('homesection6MainUpdate/{id}',[Homesection6MainController::class,'homesection6MainUpdate']);
Route::post('homesection6MainApprove/{id}',[Homesection6MainController::class,'homesection6MainApprove']);
Route::post('homesection6MainDecline/{id}',[Homesection6MainController::class,'homesection6MainDecline']);
Route::post('homesection6MainUpdateImage/{name?}',[Homesection6MainController::class,'homesection6MainUpdateImage'])->where('name', '(.*)');

//Home section7
Route::post('homesection7Add',[Homesection7Controller::class,'homesection7Add']);
Route::get('homesection7Get',[Homesection7Controller::class,'homesection7Get']);
Route::get('homesection7GetSuper',[Homesection7Controller::class,'homesection7GetSuper']);
Route::post('homesection7Delete/{id}',[Homesection7Controller::class,'homesection7Delete']);
Route::post('homesection7Update/{id}',[Homesection7Controller::class,'homesection7Update']);
Route::post('homesection7Approve/{id}',[Homesection7Controller::class,'homesection7Approve']);
Route::post('homesection7Decline/{id}',[Homesection7Controller::class,'homesection7Decline']);

//Home section7 main
Route::post('homesection7MainAdd',[Homesection7MainController::class,'homesection7MainAdd']);
Route::get('homesection7MainGet',[Homesection7MainController::class,'homesection7MainGet']);
Route::get('homesection7MainGetSuper',[Homesection7MainController::class,'homesection7MainGetSuper']);
Route::post('homesection7MainDelete/{id}',[Homesection7MainController::class,'homesection7MainDelete']);
Route::post('homesection7MainUpdate/{id}',[Homesection7MainController::class,'homesection7MainUpdate']);
Route::post('homesection7MainApprove/{id}',[Homesection7MainController::class,'homesection7MainApprove']);
Route::post('homesection7MainDecline/{id}',[Homesection7MainController::class,'homesection7MainDecline']);

//Home section4
Route::post('homesection4Add',[Homesection4Controller::class,'homesection4Add']);
Route::get('homesection4Get',[Homesection4Controller::class,'homesection4Get']);
Route::get('homesection4GetSuper',[Homesection4Controller::class,'homesection4GetSuper']);
Route::post('homesection4Delete/{id}',[Homesection4Controller::class,'homesection4Delete']);
Route::post('homesection4Approve/{id}',[Homesection4Controller::class,'homesection4Approve']);
Route::post('homesection4Decline/{id}',[Homesection4Controller::class,'homesection4Decline']);
Route::post('homesection4Update/{id}',[Homesection4Controller::class,'homesection4Update']);

//Home section4 main
Route::post('homesection4MainAdd',[Homesection4MainController::class,'homesection4MainAdd']);
Route::get('homesection4MainGet',[Homesection4MainController::class,'homesection4MainGet']);
Route::get('homesection4MainGetSuper',[Homesection4MainController::class,'homesection4MainGetSuper']);
Route::post('homesection4MainDelete/{id}',[Homesection4MainController::class,'homesection4MainDelete']);
Route::post('homesection4MainUpdate/{id}',[Homesection4MainController::class,'homesection4MainUpdate']);
Route::post('homesection4MainApprove/{id}',[Homesection4MainController::class,'homesection4MainApprove']);
Route::post('homesection4MainDecline/{id}',[Homesection4MainController::class,'homesection4MainDecline']);
Route::post('homesection4MainUpdateIcon/{name?}',[Homesection4MainController::class,'homesection4MainUpdateIcon'])->where('name', '(.*)');
Route::post('homesection4MainUpdateImage1/{name?}',[Homesection4MainController::class,'homesection4MainUpdateImage1'])->where('name', '(.*)');
Route::post('homesection4MainUpdateImage2/{name?}',[Homesection4MainController::class,'homesection4MainUpdateImage2'])->where('name', '(.*)');
Route::post('homesection4MainUpdateImage3/{name?}',[Homesection4MainController::class,'homesection4MainUpdateImage3'])->where('name', '(.*)');

//About section1
Route::post('aboutsection1Add',[Aboutsection1Controller::class,'aboutsection1Add']);
Route::get('aboutsection1Get',[Aboutsection1Controller::class,'aboutsection1Get']);
Route::get('aboutsection1GetSuper',[Aboutsection1Controller::class,'aboutsection1GetSuper']);
Route::post('aboutsection1Delete/{id}',[Aboutsection1Controller::class,'aboutsection1Delete']);
Route::post('aboutsection1Update/{id}',[Aboutsection1Controller::class,'aboutsection1Update']);
Route::post('aboutsection1Approve/{id}',[Aboutsection1Controller::class,'aboutsection1Approve']);
Route::post('aboutsection1Decline/{id}',[Aboutsection1Controller::class,'aboutsection1Decline']);

//About section1 Main
Route::post('aboutsection1MainAdd',[Aboutsection1MainController::class,'aboutsection1MainAdd']);
Route::get('aboutsection1MainGet',[Aboutsection1MainController::class,'aboutsection1MainGet']);
Route::get('aboutsection1MainGetSuper',[Aboutsection1MainController::class,'aboutsection1MainGetSuper']);
Route::post('aboutsection1MainDelete/{id}',[Aboutsection1MainController::class,'aboutsection1MainDelete']);
Route::post('aboutsection1MainUpdate/{id}',[Aboutsection1MainController::class,'aboutsection1MainUpdate']);
Route::post('aboutsection1MainApprove/{id}',[Aboutsection1MainController::class,'aboutsection1MainApprove']);
Route::post('aboutsection1MainDecline/{id}',[Aboutsection1MainController::class,'aboutsection1MainDecline']);
Route::post('aboutsection1MainUpdateImage/{name?}',[Aboutsection1MainController::class,'aboutsection1MainUpdateImage'])->where('name', '(.*)');

//About section2
Route::post('aboutsection2Add',[Aboutsection2Controller::class,'aboutsection2Add']);
Route::get('aboutsection2Get',[Aboutsection2Controller::class,'aboutsection2Get']);
Route::get('aboutsection2GetSuper',[Aboutsection2Controller::class,'aboutsection2GetSuper']);
Route::post('aboutsection2Delete/{id}',[Aboutsection2Controller::class,'aboutsection2Delete']);
Route::post('aboutsection2Update/{id}',[Aboutsection2Controller::class,'aboutsection2Update']);
Route::post('aboutsection2Approve/{id}',[Aboutsection2Controller::class,'aboutsection2Approve']);
Route::post('aboutsection2Decline/{id}',[Aboutsection2Controller::class,'aboutsection2Decline']);
Route::post('aboutsection2UpdateImage/{name?}',[Aboutsection2Controller::class,'aboutsection2UpdateImage'])->where('name', '(.*)');

//About section2 main list
Route::post('aboutsection2MainAdd',[Aboutsection2MainController::class,'aboutsection2MainAdd']);
Route::get('aboutsection2MainGet',[Aboutsection2MainController::class,'aboutsection2MainGet']);
Route::get('aboutsection2MainGetSuper',[Aboutsection2MainController::class,'aboutsection2MainGetSuper']);
Route::post('aboutsection2MainDelete/{id}',[Aboutsection2MainController::class,'aboutsection2MainDelete']);
Route::post('aboutsection2MainUpdate/{id}',[Aboutsection2MainController::class,'aboutsection2MainUpdate']);
Route::post('aboutsection2MainApprove/{id}',[Aboutsection2MainController::class,'aboutsection2MainApprove']);
Route::post('aboutsection2MainDecline/{id}',[Aboutsection2MainController::class,'aboutsection2MainDecline']);

//Service section1
Route::post('servicesection1Add',[Servicesection1Controller::class,'servicesection1Add']);
Route::get('servicesection1Get',[Servicesection1Controller::class,'servicesection1Get']);
Route::get('servicesection1GetSuper',[Servicesection1Controller::class,'servicesection1GetSuper']);
Route::post('servicesection1Delete/{id}',[Servicesection1Controller::class,'servicesection1Delete']);
Route::post('servicesection1Update/{id}',[Servicesection1Controller::class,'servicesection1Update']);
Route::post('servicesection1Approve/{id}',[Servicesection1Controller::class,'servicesection1Approve']);
Route::post('servicesection1Decline/{id}',[Servicesection1Controller::class,'servicesection1Decline']);

//Service section1 main
Route::post('servicesection1MainAdd',[Servicesection1MainController::class,'servicesection1MainAdd']);
Route::get('servicesection1MainGet',[Servicesection1MainController::class,'servicesection1MainGet']);
Route::get('servicesection1MainGetSuper',[Servicesection1MainController::class,'servicesection1MainGetSuper']);
Route::post('servicesection1MainDelete/{id}',[Servicesection1MainController::class,'servicesection1MainDelete']);
Route::post('servicesection1MainUpdate/{id}',[Servicesection1MainController::class,'servicesection1MainUpdate']);
Route::post('servicesection1MainApprove/{id}',[Servicesection1MainController::class,'servicesection1MainApprove']);
Route::post('servicesection1MainDecline/{id}',[Servicesection1MainController::class,'servicesection1MainDecline']);
Route::post('servicesection1MainUpdateImage/{name?}',[Servicesection1MainController::class,'servicesection1MainUpdateImage'])->where('name', '(.*)');

//Service section2
Route::post('servicesection2Add',[Servicesection2Controller::class,'servicesection2Add']);
Route::get('servicesection2Get',[Servicesection2Controller::class,'servicesection2Get']);
Route::get('servicesection2GetSuper',[Servicesection2Controller::class,'servicesection2GetSuper']);
Route::post('servicesection2Delete/{id}',[Servicesection2Controller::class,'servicesection2Delete']);
Route::post('servicesection2Update/{id}',[Servicesection2Controller::class,'servicesection2Update']);
Route::post('servicesection2Approve/{id}',[Servicesection2Controller::class,'servicesection2Approve']);
Route::post('servicesection2Decline/{id}',[Servicesection2Controller::class,'servicesection2Decline']);

//Services Details section1
Route::post('servicesdetailssection1Add',[Servicesdetailssection1Controller::class,'servicesdetailssection1Add']);
Route::get('servicesdetailssection1Get',[Servicesdetailssection1Controller::class,'servicesdetailssection1Get']);
Route::get('servicesdetailssection1GetSuper',[Servicesdetailssection1Controller::class,'servicesdetailssection1GetSuper']);
Route::post('servicesdetailssection1Delete/{id}',[Servicesdetailssection1Controller::class,'servicesdetailssection1Delete']);
Route::post('servicesdetailssection1Update/{id}',[Servicesdetailssection1Controller::class,'servicesdetailssection1Update']);
Route::post('servicesdetailssection1Approve/{id}',[Servicesdetailssection1Controller::class,'servicesdetailssection1Approve']);
Route::post('servicesdetailssection1Decline/{id}',[Servicesdetailssection1Controller::class,'servicesdetailssection1Decline']);
Route::post('servicesdetailssection1UpdateImage/{name?}',[Servicesdetailssection1Controller::class,'servicesdetailssection1UpdateImage'])->where('name', '(.*)');

//Services Details section2
Route::post('servicesdetailssection2Add',[Servicesdetailssection2Controller::class,'servicesdetailssection2Add']);
Route::get('servicesdetailssection2Get',[Servicesdetailssection2Controller::class,'servicesdetailssection2Get']);
Route::get('servicesdetailssection2GetSuper',[Servicesdetailssection2Controller::class,'servicesdetailssection2GetSuper']);
Route::post('servicesdetailssection2Delete/{id}',[Servicesdetailssection2Controller::class,'servicesdetailssection2Delete']);
Route::post('servicesdetailssection2Update/{id}',[Servicesdetailssection2Controller::class,'servicesdetailssection2Update']);
Route::post('servicesdetailssection2Approve/{id}',[Servicesdetailssection2Controller::class,'servicesdetailssection2Approve']);
Route::post('servicesdetailssection2Decline/{id}',[Servicesdetailssection2Controller::class,'servicesdetailssection2Decline']);

//Services Details section2 main list
Route::post('servicesdetailssection2MainAdd',[Servicesdetailssection2MainController::class,'servicesdetailssection2MainAdd']);
Route::get('servicesdetailssection2MainGet',[Servicesdetailssection2MainController::class,'servicesdetailssection2MainGet']);
Route::get('servicesdetailssection2MainGetSuper',[Servicesdetailssection2MainController::class,'servicesdetailssection2MainGetSuper']);
Route::post('servicesdetailssection2MainDelete/{id}',[Servicesdetailssection2MainController::class,'servicesdetailssection2MainDelete']);
Route::post('servicesdetailssection2MainUpdate/{id}',[Servicesdetailssection2MainController::class,'servicesdetailssection2MainUpdate']);
Route::post('servicesdetailssection2MainApprove/{id}',[Servicesdetailssection2MainController::class,'servicesdetailssection2MainApprove']);
Route::post('servicesdetailssection2MainDecline/{id}',[Servicesdetailssection2MainController::class,'servicesdetailssection2MainDecline']);

//Blog section
Route::post('blogsectionAdd',[BlogsectionController::class,'blogsectionAdd']);
Route::get('blogsectionGet',[BlogsectionController::class,'blogsectionGet']);
Route::get('blogsectionGetSuper',[BlogsectionController::class,'blogsectionGetSuper']);
Route::get('blogsectionGet3',[BlogsectionController::class,'blogsectionGet3']);
Route::post('blogsectionDelete/{id}',[BlogsectionController::class,'blogsectionDelete']);
Route::post('blogsectionUpdate/{id}',[BlogsectionController::class,'blogsectionUpdate']);
Route::post('blogsectionApprove/{id}',[BlogsectionController::class,'blogsectionApprove']);
Route::post('blogsectionDecline/{id}',[BlogsectionController::class,'blogsectionDecline']);
Route::post('blogsectionUpdateIcon/{name?}',[BlogsectionController::class,'blogsectionUpdateIcon'])->where('name', '(.*)');
Route::post('blogsectionUpdateImage1/{name?}',[BlogsectionController::class,'blogsectionUpdateImage1'])->where('name', '(.*)');
Route::post('blogsectionUpdateImage2/{name?}',[BlogsectionController::class,'blogsectionUpdateImage2'])->where('name', '(.*)');
Route::post('blogsectionUpdateImage3/{name?}',[BlogsectionController::class,'blogsectionUpdateImage3'])->where('name', '(.*)');