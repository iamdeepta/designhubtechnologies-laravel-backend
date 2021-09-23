<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Homesection5;

class Homesection5Controller extends Controller
{
    function homesection5Add(Request $req){
        
        $homesection5 = new Homesection5;
        $homesection5->homesection5_title = $req->input('title');
        
        

        $homesection5->homesection5_status = 7;
        $homesection5->homesection5_date = date("Y-m-d");


        if($req->input('title')!=''){
            $homesection5->save();
            return response([
                'success'=>"Request sent. Wait for approval."
            ]);
        }else{
            return response([
                'error'=>"Please enter title"
            ]);
        }
        
    }


    function homesection5Get(){

        $result = Homesection5::where('homesection5_status',0)->orderBy('homesection5_id','desc')->first(); 
        if($result==true){
            return response()->json($result);
        }else{
            return response()->json(["error"=>"Data not found"]);
        }
    }

    function homesection5GetSuper(){

        $result = Homesection5::where('homesection5_status',7)->orderBy('homesection5_id','desc')->first(); 
        if($result==true){
            return response()->json($result);
        }else{
            return response()->json(["error"=>"Data not found"]);
        }
    }


    function homesection5Update($id, Request $req){

        $homesection5 = Homesection5::where('homesection5_id',$id)->first();
        $homesection5->homesection5_title = $req->input('title_up');

        if($homesection5->homesection5_title!=''){
            $homesection5->save();
            return response([
                'success'=>"Updated Successfully"
            ]);
        }else{
            return response([
                'error'=>"Please enter title and description"
            ]);
        }
        
    }


    function homesection5Delete($id, Request $req){

        $homesection5 = Homesection5::find($id);
        $homesection5->homesection5_status = 1;
        
        
            $homesection5->save();

            return response([
                'success'=>"Deleted Successfully"
            ]);
        
    }

    function homesection5Approve($id, Request $req){

        $homesection5 = Homesection5::find($id);
        $homesection5->homesection5_status = 0;
        
        
            $homesection5->save();

            return response([
                'success'=>"Approved Successfully"
            ]);
        
    }

    function homesection5Decline($id, Request $req){

        $homesection5 = Homesection5::find($id);
        $homesection5->homesection5_status = 2;
        
        
            $homesection5->save();

            return response([
                'success'=>"Declined Successfully"
            ]);
        
    }
}
