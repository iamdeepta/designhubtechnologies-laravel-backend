<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Homesection7;

class Homesection7Controller extends Controller
{



    function homesection7Add(Request $req){
        
        $homesection7 = new Homesection7;
        $homesection7->homesection7_title = $req->input('title');
        $homesection7->homesection7_description = $req->input('description');
        $homesection7->homesection7_number1_title = $req->input('number1_title');
        $homesection7->homesection7_number1 = $req->input('number1');
        $homesection7->homesection7_number2_title = $req->input('number2_title');
        $homesection7->homesection7_number2 = $req->input('number2');
        $homesection7->homesection7_number3_title = $req->input('number3_title');
        $homesection7->homesection7_number3 = $req->input('number3');

        $homesection7->homesection7_status = 7;
        $homesection7->homesection7_date = date("Y-m-d");


        if($req->input('title')!='' && $req->input('description')!=''){
            $homesection7->save();
            return response([
                'success'=>"Request sent. Wait for approval."
            ]);
        }else{
            return response([
                'error'=>"Please fill up all the fields"
            ]);
        }
        
    }


    function homesection7Get(){

        $result = Homesection7::where('homesection7_status',0)->orderBy('homesection7_id','desc')->first(); 
        if($result==true){
            return response()->json($result);
        }else{
            return response()->json(["error"=>"Data not found"]);
        }
    }

    function homesection7GetSuper(){

        $result = Homesection7::where('homesection7_status',7)->orderBy('homesection7_id','desc')->first(); 
        if($result==true){
            return response()->json($result);
        }else{
            return response()->json(["error"=>"Data not found"]);
        }
    }


    function homesection7Update($id, Request $req){

        $homesection7 = Homesection7::where('homesection7_id',$id)->first();
        $homesection7->homesection7_title = $req->input('title_up');
        $homesection7->homesection7_description = $req->input('description_up');
        $homesection7->homesection7_number1_title = $req->input('number1_title_up');
        $homesection7->homesection7_number1 = $req->input('number1_up');
        $homesection7->homesection7_number2_title = $req->input('number2_title_up');
        $homesection7->homesection7_number2 = $req->input('number2_up');
        $homesection7->homesection7_number3_title = $req->input('number3_title_up');
        $homesection7->homesection7_number3 = $req->input('number3_up');

        if($homesection7->homesection7_title!='' && $homesection7->homesection7_description!=''){
            $homesection7->save();
            return response([
                'success'=>"Updated Successfully"
            ]);
        }else{
            return response([
                'error'=>"Please enter title and description"
            ]);
        }
    }



    function homesection7Delete($id, Request $req){

        $homesection7 = Homesection7::find($id);
        $homesection7->homesection7_status = 1;
        
        
            $homesection7->save();

            return response([
                'success'=>"Deleted Successfully"
            ]);
        
    }

    function homesection7Approve($id, Request $req){

        $homesection7 = Homesection7::find($id);
        $homesection7->homesection7_status = 0;
        
        
            $homesection7->save();

            return response([
                'success'=>"Approved Successfully"
            ]);
        
    }

    function homesection7Decline($id, Request $req){

        $homesection7 = Homesection7::find($id);
        $homesection7->homesection7_status = 2;
        
        
            $homesection7->save();

            return response([
                'success'=>"Declined Successfully"
            ]);
        
    }
}
