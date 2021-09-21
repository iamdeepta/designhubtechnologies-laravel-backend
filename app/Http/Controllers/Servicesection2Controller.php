<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Servicesection2;

class Servicesection2Controller extends Controller
{
    function servicesection2Add(Request $req){
        
        $servicesection2 = new Servicesection2;
        $servicesection2->servicesection2_title = $req->input('title');
        $servicesection2->servicesection2_description = $req->input('description');
        $servicesection2->servicesection2_list = $req->input('list');

        $servicesection2->servicesection2_status = 0;
        $servicesection2->servicesection2_date = date("Y-m-d");


        if($req->input('title')!='' && $req->input('description')!=''){
            $servicesection2->save();
            return response([
                'success'=>"Added Successfully"
            ]);
        }else{
            return response([
                'error'=>"Please fill up all the fields"
            ]);
        }
        
    }


    function servicesection2Get(){

        $result = Servicesection2::where('servicesection2_status',0)->orderBy('servicesection2_id','desc')->first(); 
        if($result==true){
            return response()->json($result);
        }else{
            return response()->json(["error"=>"Data not found"]);
        }
    }


    function servicesection2Update($id, Request $req){

        $servicesection2 = Servicesection2::where('servicesection2_id',$id)->first();
        $servicesection2->servicesection2_title = $req->input('title_up');
        $servicesection2->servicesection2_description = $req->input('description_up');
        $servicesection2->servicesection2_list = $req->input('list_up');

        if($servicesection2->servicesection2_title!='' && $servicesection2->servicesection2_description!=''){
            $servicesection2->save();
            return response([
                'success'=>"Updated Successfully"
            ]);
        }else{
            return response([
                'error'=>"Please fill up all the fields"
            ]);
        }
        
    }


    function servicesection2Delete($id, Request $req){

        $servicesection2 = Servicesection2::find($id);
        $servicesection2->servicesection2_status = 1;
        
        
            $servicesection2->save();

            return response([
                'success'=>"Deleted Successfully"
            ]);
        
    }
}
