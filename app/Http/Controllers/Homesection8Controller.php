<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Homesection8;

class Homesection8Controller extends Controller
{



    function homesection8Add(Request $req){
        
        $homesection8 = new Homesection8;
        $homesection8->homesection8_left_title1 = $req->input('left_title1');
        $homesection8->homesection8_left_title2 = $req->input('left_title2');
        $homesection8->homesection8_left_description = $req->input('left_description');

        $homesection8->homesection8_right_title1 = $req->input('right_title1');
        $homesection8->homesection8_right_title2 = $req->input('right_title2');
        $homesection8->homesection8_right_description = $req->input('right_description');
        

        $homesection8->homesection8_status = 7;
        $homesection8->homesection8_date = date("Y-m-d");


        if($req->input('left_title1')!='' && $req->input('left_description')!='' && $req->input('right_title1')!='' && $req->input('right_description')!=''){
            $homesection8->save();
            return response([
                'success'=>"Request sent. Wait for approval."
            ]);
        }else{
            return response([
                'error'=>"Please fill up all the fields"
            ]);
        }
        
    }


    function homesection8Get(){

        $result = Homesection8::where('homesection8_status',0)->orderBy('homesection8_id','desc')->first(); 
        if($result==true){
            return response()->json($result);
        }else{
            return response()->json(["error"=>"Data not found"]);
        }
    }

    function homesection8GetSuper(){

        $result = Homesection8::where('homesection8_status',7)->orderBy('homesection8_id','desc')->first(); 
        if($result==true){
            return response()->json($result);
        }else{
            return response()->json(["error"=>"Data not found"]);
        }
    }


    function homesection8Update($id, Request $req){

        $homesection8 = Homesection8::where('homesection8_id',$id)->first();
        $homesection8->homesection8_left_title1 = $req->input('left_title1_up');
        $homesection8->homesection8_left_title2 = $req->input('left_title2_up');
        $homesection8->homesection8_left_description = $req->input('left_description_up');

        $homesection8->homesection8_right_title1 = $req->input('right_title1_up');
        $homesection8->homesection8_right_title2 = $req->input('right_title2_up');
        $homesection8->homesection8_right_description = $req->input('right_description_up');

        if($homesection8->homesection8_left_title1!='' && $homesection8->homesection8_left_description!='' && $homesection8->homesection8_right_title1!='' && $homesection8->homesection8_right_description!=''){
            $homesection8->save();
            return response([
                'success'=>"Updated Successfully"
            ]);
        }else{
            return response([
                'error'=>"Please enter title and description"
            ]);
        }
    }



    function homesection8Delete($id, Request $req){

        $homesection8 = Homesection8::find($id);
        $homesection8->homesection8_status = 1;
        
        
            $homesection8->save();

            return response([
                'success'=>"Deleted Successfully"
            ]);
        
    }

    function homesection8Approve($id, Request $req){

        $homesection8 = Homesection8::find($id);
        $homesection8->homesection8_status = 0;
        
        
            $homesection8->save();

            return response([
                'success'=>"Approved Successfully"
            ]);
        
    }


    function homesection8Decline($id, Request $req){

        $homesection8 = Homesection8::find($id);
        $homesection8->homesection8_status = 2;
        
        
            $homesection8->save();

            return response([
                'success'=>"Declined Successfully"
            ]);
        
    }
}
