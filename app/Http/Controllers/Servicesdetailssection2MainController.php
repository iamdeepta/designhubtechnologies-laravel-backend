<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Servicesdetailssection2Main;


class Servicesdetailssection2MainController extends Controller
{


    //add data
    function servicesdetailssection2MainAdd(Request $req){
        
        $servicesdetailssection2Main = new Servicesdetailssection2Main;
        $servicesdetailssection2Main->servicesdetailssection2_main_title = $req->input('main_title_faq');
        

        $servicesdetailssection2Main->servicesdetailssection2_main_status = 7;
        $servicesdetailssection2Main->servicesdetailssection2_main_date = date("Y-m-d");


        if($req->input('main_title_faq')!=''){
            $servicesdetailssection2Main->save();
            return response([
                'success'=>"Request sent. Wait for approval."
            ]);
        }else{
            return response([
                'error'=>"Please fill up all the fields"
            ]);
        }
        
    }


    function servicesdetailssection2MainGet(){

        $result = Servicesdetailssection2Main::where('servicesdetailssection2_main_status',0)->orderBy('servicesdetailssection2_main_id','asc')->get(); 
        if($result==true){
            return response()->json($result);
        }else{
            return response()->json(["error"=>"Data not found"]);
        }
    }


    function servicesdetailssection2MainGetSuper(){

        $result = Servicesdetailssection2Main::where('servicesdetailssection2_main_status',7)->orderBy('servicesdetailssection2_main_id','asc')->get(); 
        if($result==true){
            return response()->json($result);
        }else{
            return response()->json(["error"=>"Data not found"]);
        }
    }


    function servicesdetailssection2MainUpdate($id, Request $req){

        $servicesdetailssection2Main = Servicesdetailssection2Main::where('servicesdetailssection2_main_id',$id)->first();
        $servicesdetailssection2Main->servicesdetailssection2_main_title = $req->input('main_title_up_faq');
        

        if($servicesdetailssection2Main->servicesdetailssection2_main_title!=''){
            $servicesdetailssection2Main->save();
            return response([
                'success'=>"Updated Successfully"
            ]);
        }else{
            return response([
                'error'=>"Don't leave any field empty"
            ]);
        }
    }



    function servicesdetailssection2MainDelete($id, Request $req){

        $servicesdetailssection2Main = Servicesdetailssection2Main::find($id);
        $servicesdetailssection2Main->servicesdetailssection2_main_status = 1;
        
        
            $servicesdetailssection2Main->save();

            return response([
                'success'=>"Deleted Successfully"
            ]);
        
    }


    function servicesdetailssection2MainApprove($id, Request $req){

        $servicesdetailssection2Main = Servicesdetailssection2Main::find($id);
        $servicesdetailssection2Main->servicesdetailssection2_main_status = 0;
        
        
            $servicesdetailssection2Main->save();

            return response([
                'success'=>"Approved Successfully"
            ]);
        
    }


    function servicesdetailssection2MainDecline($id, Request $req){

        $servicesdetailssection2Main = Servicesdetailssection2Main::find($id);
        $servicesdetailssection2Main->servicesdetailssection2_main_status = 2;
        
        
            $servicesdetailssection2Main->save();

            return response([
                'success'=>"Declined Successfully"
            ]);
        
    }
}
