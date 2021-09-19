<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Homesection7Main;


class Homesection7MainController extends Controller
{


    //add data
    function homesection7MainAdd(Request $req){
        
        $homesection7Main = new Homesection7Main;
        $homesection7Main->homesection7_main_title = $req->input('main_title_faq');
        $homesection7Main->homesection7_main_description = $req->input('main_description_faq');
        

        $homesection7Main->homesection7_main_status = 0;
        $homesection7Main->homesection7_main_date = date("Y-m-d");


        if($req->input('main_title_faq')!='' && $req->input('main_description_faq')!=''){
            $homesection7Main->save();
            return response([
                'success'=>"Added Successfully"
            ]);
        }else{
            return response([
                'error'=>"Please fill up all the fields"
            ]);
        }
        
    }


    function homesection7MainGet(){

        $result = Homesection7Main::where('homesection7_main_status',0)->orderBy('homesection7_main_id','desc')->get(); 
        if($result==true){
            return response()->json($result);
        }else{
            return response()->json(["error"=>"Data not found"]);
        }
    }


    function homesection7MainUpdate($id, Request $req){

        $homesection7Main = Homesection7Main::where('homesection7_main_id',$id)->first();
        $homesection7Main->homesection7_main_title = $req->input('main_title_up_faq');
        $homesection7Main->homesection7_main_description = $req->input('main_description_up_faq');
        

        if($homesection7Main->homesection7_main_title!='' && $homesection7Main->homesection7_main_description!=''){
            $homesection7Main->save();
            return response([
                'success'=>"Updated Successfully"
            ]);
        }else{
            return response([
                'error'=>"Don't leave any field empty"
            ]);
        }
    }



    function homesection7MainDelete($id, Request $req){

        $homesection7Main = Homesection7Main::find($id);
        $homesection7Main->homesection7_main_status = 1;
        
        
            $homesection7Main->save();

            return response([
                'success'=>"Deleted Successfully"
            ]);
        
    }
}
