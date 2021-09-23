<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aboutsection2Main;


class Aboutsection2MainController extends Controller
{


    //add data
    function aboutsection2MainAdd(Request $req){
        
        $aboutsection2Main = new Aboutsection2Main;
        $aboutsection2Main->aboutsection2_main_title = $req->input('main_title_faq');
        

        $aboutsection2Main->aboutsection2_main_status = 7;
        $aboutsection2Main->aboutsection2_main_date = date("Y-m-d");


        if($req->input('main_title_faq')!=''){
            $aboutsection2Main->save();
            return response([
                'success'=>"Request sent. Wait for approval."
            ]);
        }else{
            return response([
                'error'=>"Please fill up all the fields"
            ]);
        }
        
    }


    function aboutsection2MainGet(){

        $result = Aboutsection2Main::where('aboutsection2_main_status',0)->orderBy('aboutsection2_main_id','desc')->get(); 
        if($result==true){
            return response()->json($result);
        }else{
            return response()->json(["error"=>"Data not found"]);
        }
    }

    function aboutsection2MainGetSuper(){

        $result = Aboutsection2Main::where('aboutsection2_main_status',7)->orderBy('aboutsection2_main_id','desc')->get(); 
        if($result==true){
            return response()->json($result);
        }else{
            return response()->json(["error"=>"Data not found"]);
        }
    }


    function aboutsection2MainUpdate($id, Request $req){

        $aboutsection2Main = Aboutsection2Main::where('aboutsection2_main_id',$id)->first();
        $aboutsection2Main->aboutsection2_main_title = $req->input('main_title_up_faq');
        

        if($aboutsection2Main->aboutsection2_main_title!=''){
            $aboutsection2Main->save();
            return response([
                'success'=>"Updated Successfully"
            ]);
        }else{
            return response([
                'error'=>"Don't leave any field empty"
            ]);
        }
    }



    function aboutsection2MainDelete($id, Request $req){

        $aboutsection2Main = Aboutsection2Main::find($id);
        $aboutsection2Main->aboutsection2_main_status = 1;
        
        
            $aboutsection2Main->save();

            return response([
                'success'=>"Deleted Successfully"
            ]);
        
    }

    function aboutsection2MainApprove($id, Request $req){

        $aboutsection2Main = Aboutsection2Main::find($id);
        $aboutsection2Main->aboutsection2_main_status = 0;
        
        
            $aboutsection2Main->save();

            return response([
                'success'=>"Approved Successfully"
            ]);
        
    }

    function aboutsection2MainDecline($id, Request $req){

        $aboutsection2Main = Aboutsection2Main::find($id);
        $aboutsection2Main->aboutsection2_main_status = 2;
        
        
            $aboutsection2Main->save();

            return response([
                'success'=>"Declined Successfully"
            ]);
        
    }
}
