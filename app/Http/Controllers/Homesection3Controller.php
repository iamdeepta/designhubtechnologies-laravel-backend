<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Homesection3;

class Homesection3Controller extends Controller
{
    function homesection3Add(Request $req){
        
        $homesection3 = new Homesection3;
        $homesection3->homesection3_title = $req->input('title');
        
        $homesection3->homesection3_description = $req->input('description');
        $homesection3->homesection3_category = $req->input('category');
        
        if($req->file('image')!=''){
        $homesection3->homesection3_image = $req->file('image')->store('homesection3');
        }else{
            return response([
                'error'=>"Please select an image"
            ]);
        }

        $homesection3->homesection3_status = 0;
        $homesection3->homesection3_date = date("Y-m-d");


        if($req->input('title')!='' && $req->input('description')!='' && $req->input('category')!='' && $req->file('image')!=''){
            $homesection3->save();
            return response([
                'success'=>"Added Successfully"
            ]);
        }else{
            return response([
                'error'=>"Please fill up all the fields"
            ]);
        }
        
    }


    function homesection3Get(){

        $result = Homesection3::where('homesection3_status',0)->orderBy('homesection3_id','desc')->first(); 
        if($result==true){
            return response()->json($result);
        }else{
            return response()->json(["error"=>"Data not found"]);
        }
    }


    function homesection3Update($id, Request $req){

        $homesection3 = Homesection3::where('homesection3_id',$id)->first();
        $homesection3->homesection3_title = $req->input('title_up');
        $homesection3->homesection3_description = $req->input('description_up');
        //if($req->input('category')!=''){
        $homesection3->homesection3_category = $req->input('category_up');
        //}

        if($homesection3->homesection3_title!='' && $homesection3->homesection3_description!=''){
            $homesection3->save();
            return response([
                'success'=>"Updated Successfully"
            ]);
        }else{
            return response([
                'error'=>"Please enter title and description"
            ]);
        }
    }


    function homesection3Delete($id, Request $req){

        $homesection3 = Homesection3::find($id);
        $homesection3->homesection3_status = 1;
        
        
            $homesection3->save();

            return response([
                'success'=>"Deleted Successfully"
            ]);
        
    }
}
