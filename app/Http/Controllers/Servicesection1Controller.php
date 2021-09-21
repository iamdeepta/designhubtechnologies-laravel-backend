<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Servicesection1;

class Servicesection1Controller extends Controller
{
    function servicesection1Add(Request $req){
        
        $servicesection1 = new Servicesection1;
        $servicesection1->servicesection1_title = $req->input('title');
        $servicesection1->servicesection1_description = $req->input('description');

        $servicesection1->servicesection1_status = 0;
        $servicesection1->servicesection1_date = date("Y-m-d");


        if($req->input('title')!='' && $req->input('description')!=''){
            $servicesection1->save();
            return response([
                'success'=>"Added Successfully"
            ]);
        }else{
            return response([
                'error'=>"Please enter title and description"
            ]);
        }
        
    }


    function servicesection1Get(){

        $result = Servicesection1::where('servicesection1_status',0)->orderBy('servicesection1_id','desc')->first(); 
        if($result==true){
            return response()->json($result);
        }else{
            return response()->json(["error"=>"Data not found"]);
        }
    }


    function servicesection1Update($id, Request $req){

        $servicesection1 = Servicesection1::where('servicesection1_id',$id)->first();
        $servicesection1->servicesection1_title = $req->input('title_up');
        $servicesection1->servicesection1_description = $req->input('description_up');

        if($servicesection1->servicesection1_title!='' && $servicesection1->servicesection1_description!=''){
            $servicesection1->save();
            return response([
                'success'=>"Updated Successfully"
            ]);
        }else{
            return response([
                'error'=>"Please enter title and description"
            ]);
        }
        
    }


    function servicesection1Delete($id, Request $req){

        $servicesection1 = Servicesection1::find($id);
        $servicesection1->servicesection1_status = 1;
        
        
            $servicesection1->save();

            return response([
                'success'=>"Deleted Successfully"
            ]);
        
    }
}
