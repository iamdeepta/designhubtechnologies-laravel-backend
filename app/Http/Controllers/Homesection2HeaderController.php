<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Homesection2Header;

class Homesection2HeaderController extends Controller
{



    function homesection2HeaderAdd(Request $req){
        
        $homesection2_header = new homesection2Header;
        $homesection2_header->homesection2_header_title = $req->input('title');
        $homesection2_header->homesection2_header_category = $req->input('category');

        $homesection2_header->homesection2_header_status = 7;
        $homesection2_header->homesection2_header_date = date("Y-m-d");


        if($req->input('title')!='' && $req->input('category')!=''){
            $homesection2_header->save();
            return response([
                'success'=>"Request sent. Wait for approval."
            ]);
        }else{
            return response([
                'error'=>"Please fill up all the fields"
            ]);
        }
        
    }


    function homesection2HeaderGet(){

        $result = Homesection2Header::where('homesection2_header_status',0)->orderBy('homesection2_header_id','desc')->first(); 
        if($result==true){
            return response()->json($result);
        }else{
            return response()->json(["error"=>"Data not found"]);
        }
    }

    function homesection2HeaderGetSuper(){

        $result = Homesection2Header::where('homesection2_header_status',7)->orderBy('homesection2_header_id','desc')->first(); 
        if($result==true){
            return response()->json($result);
        }else{
            return response()->json(["error"=>"Data not found"]);
        }
    }


    function homesection2HeaderUpdate($id, Request $req){

        $homesection2_header = Homesection2Header::where('homesection2_header_id',$id)->first();
        $homesection2_header->homesection2_header_title = $req->input('title_up');
        $homesection2_header->homesection2_header_category = $req->input('category_up');

        if($homesection2_header->homesection2_header_title!='' && $homesection2_header->homesection2_header_category!=''){
            $homesection2_header->save();
            return response([
                'success'=>"Updated Successfully"
            ]);
        }else{
            return response([
                'error'=>"Please fill up all the fields"
            ]);
        }
    }



    function homesection2HeaderDelete($id, Request $req){

        $homesection2_header = Homesection2Header::find($id);
        $homesection2_header->homesection2_header_status = 1;
        
        
            $homesection2_header->save();

            return response([
                'success'=>"Deleted Successfully"
            ]);
        
    }

    function homesection2HeaderApprove($id, Request $req){

        $homesection2_header = Homesection2Header::find($id);
        $homesection2_header->homesection2_header_status = 0;
        
        
            $homesection2_header->save();

            return response([
                'success'=>"Approved Successfully"
            ]);
        
    }


    function homesection2HeaderDecline($id, Request $req){

        $homesection2_header = Homesection2Header::find($id);
        $homesection2_header->homesection2_header_status = 2;
        
        
            $homesection2_header->save();

            return response([
                'success'=>"Declined Successfully"
            ]);
        
    }
}
