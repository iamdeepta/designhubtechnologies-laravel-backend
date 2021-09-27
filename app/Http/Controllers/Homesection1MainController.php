<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Homesection1Main;


class Homesection1MainController extends Controller
{


    //add data
    function homesection1MainAdd(Request $req){
        
        $homesection1Main = new Homesection1Main;
        $homesection1Main->homesection1_main_title = $req->input('main_title_faq');
        

        $homesection1Main->homesection1_main_status = 7;
        $homesection1Main->homesection1_main_date = date("Y-m-d");


        if($req->input('main_title_faq')!=''){
            $homesection1Main->save();
            return response([
                'success'=>"Request sent. Wait for approval."
            ]);
        }else{
            return response([
                'error'=>"Please fill up all the fields"
            ]);
        }
        
    }


    function homesection1MainGet(){

        $result = Homesection1Main::where('homesection1_main_status',0)->orderBy('homesection1_main_id','asc')->get(); 
        if($result==true){
            return response()->json($result);
        }else{
            return response()->json(["error"=>"Data not found"]);
        }
    }

    function homesection1MainGetSuper(){

        $result = Homesection1Main::where('homesection1_main_status',7)->orderBy('homesection1_main_id','asc')->get(); 
        if($result==true){
            return response()->json($result);
        }else{
            return response()->json(["error"=>"Data not found"]);
        }
    }




    function homesection1MainUpdate($id, Request $req){

        $homesection1Main = Homesection1Main::where('homesection1_main_id',$id)->first();
        $homesection1Main->homesection1_main_title = $req->input('main_title_up_faq');
        

        if($homesection1Main->homesection1_main_title!=''){
            $homesection1Main->save();
            return response([
                'success'=>"Updated Successfully"
            ]);
        }else{
            return response([
                'error'=>"Don't leave any field empty"
            ]);
        }
    }



    function homesection1MainDelete($id, Request $req){

        $homesection1Main = Homesection1Main::find($id);
        $homesection1Main->homesection1_main_status = 1;
        
        
            $homesection1Main->save();

            return response([
                'success'=>"Deleted Successfully"
            ]);
        
    }

    function homesection1MainApprove($id, Request $req){

        $homesection1Main = Homesection1Main::find($id);
        $homesection1Main->homesection1_main_status = 0;
        
        
            $homesection1Main->save();

            return response([
                'success'=>"Approved Successfully"
            ]);
        
    }

    function homesection1MainDecline($id, Request $req){

        $homesection1Main = Homesection1Main::find($id);
        $homesection1Main->homesection1_main_status = 2;
        
        
            $homesection1Main->save();

            return response([
                'success'=>"Declined Successfully"
            ]);
        
    }
}
