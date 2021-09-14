<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Homesection1;

class Homesection1Controller extends Controller
{
    function homesection1Add(Request $req){
        
        $homesection1 = new Homesection1;
        $homesection1->homesection1_title = $req->input('title');
        $homesection1->homesection1_description = $req->input('description');
        if($req->input('category')!=''){
        $homesection1->homesection1_category = $req->input('category');
        }
        if($req->file('image1')!=''){
        $homesection1->homesection1_image1 = $req->file('image1')->store('homesection1');
        }else{
            return response([
                'error'=>"Please select image1"
            ]);
        }

        if($req->file('image2')!=''){
        $homesection1->homesection1_image2 = $req->file('image2')->store('homesection1');
        }
        if($req->file('image3')!=''){
        $homesection1->homesection1_image3 = $req->file('image3')->store('homesection1');
        }
        if($req->file('image4')!=''){
        $homesection1->homesection1_image4 = $req->file('image4')->store('homesection1');
        }
        $homesection1->homesection1_status = 0;
        $homesection1->homesection1_date = date("Y-m-d");



        if($req->input('title')!='' && $req->input('description')!='' && $req->file('image1')!=''){
            $homesection1->save();
            return response([
                'success'=>"Added Successfully"
            ]);
        }else{
            return response([
                'error'=>"Please enter title and description"
            ]);
        }
        
    }

    function homesection1Get(){

        $result = Homesection1::where('homesection1_status',0)->orderBy('homesection1_id','desc')->first(); 
        if($result==true){
            return response()->json($result);
        }else{
            return response()->json(["error"=>"Data not found"]);
        }
    }

    function homesection1Update($id, Request $req){

        $homesection1 = Homesection1::where('homesection1_id',$id)->first();
        $homesection1->homesection1_title = $req->input('title_up');
        $homesection1->homesection1_description = $req->input('description_up');
        //if($req->input('category')!=''){
        $homesection1->homesection1_category = $req->input('category_up');
        //}

        if($homesection1->homesection1_title!='' || $homesection1->homesection1_description!=''){
            $homesection1->save();
            return response([
                'success'=>"Updated Successfully"
            ]);
        }else{
            return response([
                'error'=>"Please enter title and description"
            ]);
        }
    }

    function homesection1Delete($id, Request $req){

        $homesection1 = Homesection1::find($id);
        $homesection1->homesection1_status = 1;
        
        
            $homesection1->save();

            return response([
                'success'=>"Deleted Successfully"
            ]);
        
    }
}
