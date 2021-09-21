<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Servicesdetailssection2;

class Servicesdetailssection2Controller extends Controller
{
    function servicesdetailssection2Add(Request $req){
        
        $servicesdetailssection2 = new Servicesdetailssection2;
        $servicesdetailssection2->servicesdetailssection2_title = $req->input('title');
    

        $servicesdetailssection2->servicesdetailssection2_status = 0;
        $servicesdetailssection2->servicesdetailssection2_date = date("Y-m-d");


        if($req->input('title')!=''){
            $servicesdetailssection2->save();
            return response([
                'success'=>"Added Successfully"
            ]);
        }else{
            return response([
                'error'=>"Please enter title"
            ]);
        }
        
    }


    function servicesdetailssection2Get(){

        $result = Servicesdetailssection2::where('servicesdetailssection2_status',0)->orderBy('servicesdetailssection2_id','desc')->first(); 
        if($result==true){
            return response()->json($result);
        }else{
            return response()->json(["error"=>"Data not found"]);
        }
    }


    function servicesdetailssection2Update($id, Request $req){

        $servicesdetailssection2 = Servicesdetailssection2::where('servicesdetailssection2_id',$id)->first();
        $servicesdetailssection2->servicesdetailssection2_title = $req->input('title_up');
       

        if($servicesdetailssection2->servicesdetailssection2_title!=''){
            $servicesdetailssection2->save();
            return response([
                'success'=>"Updated Successfully"
            ]);
        }else{
            return response([
                'error'=>"Please enter title"
            ]);
        }
        
    }


    function servicesdetailssection2Delete($id, Request $req){

        $servicesdetailssection2 = Servicesdetailssection2::find($id);
        $servicesdetailssection2->servicesdetailssection2_status = 1;
        
        
            $servicesdetailssection2->save();

            return response([
                'success'=>"Deleted Successfully"
            ]);
        
    }
}
