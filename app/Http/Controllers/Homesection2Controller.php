<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Homesection2;

class Homesection2Controller extends Controller
{
    function homesection2Add(Request $req){
        
        $homesection2 = new Homesection2;
        $homesection2->homesection2_main_title = $req->input('main_title');
        $homesection2->homesection2_title = $req->input('title');
        $homesection2->homesection2_description = $req->input('description');
        $homesection2->homesection2_category = $req->input('category');
        
        if($req->file('image')!=''){
        $homesection2->homesection2_image = $req->file('image')->store('homesection1');
        }else{
            return response([
                'error'=>"Please select an image"
            ]);
        }

        $homesection2->homesection2_status = 0;
        $homesection2->homesection2_date = date("Y-m-d");


        if($req->input('main_title')!='' && $req->input('title')!='' && $req->input('description')!='' && $req->input('category')!='' && $req->file('image')!=''){
            $homesection2->save();
            return response([
                'success'=>"Added Successfully"
            ]);
        }else{
            return response([
                'error'=>"Please fill up all the fields"
            ]);
        }
        
    }


    function homesection2Get(){

        $result = Homesection2::where('homesection2_status',0)->orderBy('homesection2_id','desc')->get(); 
        if($result==true){
            return response()->json($result);
        }else{
            return response()->json(["error"=>"Data not found"]);
        }
    }


    function homesection2Update($id, Request $req){

        $homesection2 = Homesection2::where('homesection2_id',$id)->first();
        $homesection2->homesection2_main_title = $req->input('main_title_up');
        $homesection2->homesection2_title = $req->input('title_up');
        $homesection2->homesection2_description = $req->input('description_up');
        //if($req->input('category')!=''){
        $homesection2->homesection2_category = $req->input('category_up');
        //}

        if($homesection2->homesection2_main_title!='' && $homesection2->homesection2_main_title!='' && $homesection2->homesection2_description!='' && $homesection2->homesection2_category!=''){
            $homesection2->save();
            return response([
                'success'=>"Updated Successfully"
            ]);
        }else{
            return response([
                'error'=>"Don't leave any field empty"
            ]);
        }
    }

    function homesection2Delete($id, Request $req){

        $homesection2 = Homesection2::find($id);
        $homesection2->homesection2_status = 1;
        
        
            $homesection2->save();

            return response([
                'success'=>"Deleted Successfully"
            ]);
        
    }
}
