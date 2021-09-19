<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Homesection6;

class Homesection6Controller extends Controller
{



    function homesection6Add(Request $req){
        
        $homesection6 = new Homesection6;
        $homesection6->homesection6_title = $req->input('title');
        $homesection6->homesection6_category = $req->input('category');

        $homesection6->homesection6_status = 0;
        $homesection6->homesection6_date = date("Y-m-d");


        if($req->input('title')!='' && $req->input('category')!=''){
            $homesection6->save();
            return response([
                'success'=>"Added Successfully"
            ]);
        }else{
            return response([
                'error'=>"Please fill up all the fields"
            ]);
        }
        
    }


    function homesection6Get(){

        $result = Homesection6::where('homesection6_status',0)->orderBy('homesection6_id','desc')->first(); 
        if($result==true){
            return response()->json($result);
        }else{
            return response()->json(["error"=>"Data not found"]);
        }
    }


    function homesection6Update($id, Request $req){

        $homesection6 = Homesection6::where('homesection6_id',$id)->first();
        $homesection6->homesection6_title = $req->input('title_up');
        $homesection6->homesection6_category = $req->input('category_up');

        if($homesection6->homesection6_title!='' && $homesection6->homesection6_category!=''){
            $homesection6->save();
            return response([
                'success'=>"Updated Successfully"
            ]);
        }else{
            return response([
                'error'=>"Please fill up all the fields"
            ]);
        }
    }



    function homesection6Delete($id, Request $req){

        $homesection6 = Homesection6::find($id);
        $homesection6->homesection6_status = 1;
        
        
            $homesection6->save();

            return response([
                'success'=>"Deleted Successfully"
            ]);
        
    }
}
