<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aboutsection1;

class Aboutsection1Controller extends Controller
{
    function aboutsection1Add(Request $req){
        
        $aboutsection1 = new Aboutsection1;
        $aboutsection1->aboutsection1_title = $req->input('title');
        $aboutsection1->aboutsection1_description = $req->input('description');

        $aboutsection1->aboutsection1_status = 0;
        $aboutsection1->aboutsection1_date = date("Y-m-d");


        if($req->input('title')!='' && $req->input('description')!=''){
            $aboutsection1->save();
            return response([
                'success'=>"Added Successfully"
            ]);
        }else{
            return response([
                'error'=>"Please enter title and description"
            ]);
        }
        
    }


    function aboutsection1Get(){

        $result = Aboutsection1::where('aboutsection1_status',0)->orderBy('aboutsection1_id','desc')->first(); 
        if($result==true){
            return response()->json($result);
        }else{
            return response()->json(["error"=>"Data not found"]);
        }
    }


    function aboutsection1Update($id, Request $req){

        $aboutsection1 = Aboutsection1::where('aboutsection1_id',$id)->first();
        $aboutsection1->aboutsection1_title = $req->input('title_up');
        $aboutsection1->aboutsection1_description = $req->input('description_up');

        if($aboutsection1->aboutsection1_title!='' && $aboutsection1->aboutsection1_description!=''){
            $aboutsection1->save();
            return response([
                'success'=>"Updated Successfully"
            ]);
        }else{
            return response([
                'error'=>"Please enter title and description"
            ]);
        }
        
    }


    function aboutsection1Delete($id, Request $req){

        $aboutsection1 = Aboutsection1::find($id);
        $aboutsection1->aboutsection1_status = 1;
        
        
            $aboutsection1->save();

            return response([
                'success'=>"Deleted Successfully"
            ]);
        
    }
}
