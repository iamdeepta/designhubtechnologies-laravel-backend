<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Homesection4;

class Homesection4Controller extends Controller
{



    function homesection4Add(Request $req){
        
        $homesection4 = new Homesection4;
        $homesection4->homesection4_title = $req->input('title');
        $homesection4->homesection4_description = $req->input('description');
        $homesection4->homesection4_category = $req->input('category');

        $homesection4->homesection4_status = 7;
        $homesection4->homesection4_date = date("Y-m-d");


        if($req->input('title')!='' && $req->input('description')!='' && $req->input('category')!=''){
            $homesection4->save();
            return response([
                'success'=>"Request sent. Wait for approval."
            ]);
        }else{
            return response([
                'error'=>"Please fill up all the fields"
            ]);
        }
        
    }


    function homesection4Get(){

        $result = Homesection4::where('homesection4_status',0)->orderBy('homesection4_id','desc')->first(); 
        if($result==true){
            return response()->json($result);
        }else{
            return response()->json(["error"=>"Data not found"]);
        }
    }

    function homesection4GetSuper(){

        $result = Homesection4::where('homesection4_status',7)->orderBy('homesection4_id','desc')->first(); 
        if($result==true){
            return response()->json($result);
        }else{
            return response()->json(["error"=>"Data not found"]);
        }
    }


    function homesection4Update($id, Request $req){

        $homesection4 = Homesection4::where('homesection4_id',$id)->first();
        $homesection4->homesection4_title = $req->input('title_up');
        $homesection4->homesection4_description = $req->input('description_up');
        $homesection4->homesection4_category = $req->input('category_up');

        if($homesection4->homesection4_title!='' && $homesection4->homesection4_description!='' && $homesection4->homesection4_category!=''){
            $homesection4->save();
            return response([
                'success'=>"Updated Successfully"
            ]);
        }else{
            return response([
                'error'=>"Please fill up all the fields"
            ]);
        }
    }



    function homesection4Delete($id, Request $req){

        $homesection4 = Homesection4::find($id);
        $homesection4->homesection4_status = 1;
        
        
            $homesection4->save();

            return response([
                'success'=>"Deleted Successfully"
            ]);
        
    }

    function homesection4Approve($id, Request $req){

        $homesection4 = Homesection4::find($id);
        $homesection4->homesection4_status = 0;
        
        
            $homesection4->save();

            return response([
                'success'=>"Approved Successfully"
            ]);
        
    }


    function homesection4Decline($id, Request $req){

        $homesection4 = Homesection4::find($id);
        $homesection4->homesection4_status = 2;
        
        
            $homesection4->save();

            return response([
                'success'=>"Declined Successfully"
            ]);
        
    }
}
