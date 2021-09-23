<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Homesection2;


class Homesection2Controller extends Controller
{

    //convert png or jpg to webp
    function png_to_webp($beforeLocation, $afterLocation){

        $imgLocationBefore = base_path() .'/storage/app/homesection_others/'.$beforeLocation;

        $imgLocationAfter = base_path() .'/storage/app/'.$afterLocation;

        $img = imagecreatefrompng($imgLocationBefore);
        imagepalettetotruecolor($img);
        imagealphablending($img, true);
        imagesavealpha($img, true);

        imagewebp($img, $imgLocationAfter, 80);

        imagedestroy($img);

    }
    function jpg_to_webp($beforeLocation, $afterLocation){

        $imgLocationBefore = base_path() .'/storage/app/homesection_others/'.$beforeLocation;

        $imgLocationAfter = base_path() .'/storage/app/'.$afterLocation;

        $img = imagecreatefromjpeg($imgLocationBefore);
        imagepalettetotruecolor($img);
        imagealphablending($img, true);
        imagesavealpha($img, true);

        imagewebp($img, $imgLocationAfter, 80);

        imagedestroy($img);

    } 

    //add data
    function homesection2Add(Request $req){
        
        $homesection2 = new Homesection2;
        //$homesection2->homesection2_main_title = $req->input('main_title');
        $homesection2->homesection2_title = $req->input('title');
        $homesection2->homesection2_description = $req->input('description');
        //$homesection2->homesection2_category = $req->input('category');
        
        if($req->file('image')!=''){
        $homesection2->homesection2_image = $req->file('image')->store('homesection_others');
        $homesection2->homesection2_image = $req->file('image')->hashName();
        $image_name = pathinfo($homesection2->homesection2_image, PATHINFO_FILENAME);
        $image_extension = pathinfo($homesection2->homesection2_image, PATHINFO_EXTENSION);

        $new_image_name = 'homesection1/'.$image_name.'.webp';

        if($image_extension=='PNG' || $image_extension=='png'){
            Homesection2Controller::png_to_webp($homesection2->homesection2_image,$new_image_name);
            $homesection2->homesection2_image = $new_image_name;
            
        }elseif($image_extension=='JPG' || $image_extension=='jpg' || $image_extension=='JPEG' || $image_extension=='jpeg'){
            Homesection2Controller::jpg_to_webp($homesection2->homesection2_image,$new_image_name);
            $homesection2->homesection2_image = $new_image_name;
            
        }else{
            return response([
                'error'=>"Please select jpg or png image"
            ]);
        }
        
        //delete pic from another folder
            if(file_exists(base_path() .'/storage/app/homesection_others/'.$req->file('image')->hashName())) {
                @unlink(base_path() .'/storage/app/homesection_others/'.$req->file('image')->hashName());
            }
        
        }else{
            return response([
                'error'=>"Please select an image"
            ]);
        }

        $homesection2->homesection2_status = 7;
        $homesection2->homesection2_date = date("Y-m-d");


        if($req->input('title')!='' && $req->input('description')!='' && $req->file('image')!=''){
            $homesection2->save();
            return response([
                'success'=>"Request sent. Please Wait for approval."
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

    function homesection2GetSuper(){

        $result = Homesection2::where('homesection2_status',7)->orderBy('homesection2_id','desc')->get(); 
        if($result==true){
            return response()->json($result);
        }else{
            return response()->json(["error"=>"Data not found"]);
        }
    }

    function homesection2Get3(){

        $result = Homesection2::where('homesection2_status',0)->orderBy('homesection2_id','desc')->take(3)->get(); 
        if($result==true){
            return response()->json($result);
        }else{
            return response()->json(["error"=>"Data not found"]);
        }
    }


    function homesection2Update($id, Request $req){

        $homesection2 = Homesection2::where('homesection2_id',$id)->first();
        //$homesection2->homesection2_main_title = $req->input('main_title_up');
        $homesection2->homesection2_title = $req->input('title_up');
        $homesection2->homesection2_description = $req->input('description_up');
        //if($req->input('category')!=''){
        //$homesection2->homesection2_category = $req->input('category_up');
        //}

        if($homesection2->homesection2_main_title!='' && $homesection2->homesection2_description!=''){
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


    //update image
    function homesection2UpdateImage($name, Request $req){

        $homesection2 = Homesection2::where('homesection2_image',$name)->first();

        if($req->file('image_up')!=''){

            //delete existing image uploaded before updating from homesection1
        if(file_exists(base_path() .'/storage/app/'.$homesection2->homesection2_image)) {
                @unlink(base_path() .'/storage/app/'.$homesection2->homesection2_image);
            }
        
        $homesection2->homesection2_image = $req->file('image_up')->store('homesection_others');
        $homesection2->homesection2_image = $req->file('image_up')->hashName();
        $image_name = pathinfo($homesection2->homesection2_image, PATHINFO_FILENAME);
        $image_extension = pathinfo($homesection2->homesection2_image, PATHINFO_EXTENSION);

        $new_image_name = 'homesection1/'.$image_name.'.webp';

        if($image_extension=='PNG' || $image_extension=='png'){
            Homesection2Controller::png_to_webp($homesection2->homesection2_image,$new_image_name);
            $homesection2->homesection2_image = $new_image_name;
            
        }elseif($image_extension=='JPG' || $image_extension=='jpg' || $image_extension=='JPEG' || $image_extension=='jpeg'){
            Homesection2Controller::jpg_to_webp($homesection2->homesection2_image,$new_image_name);
            $homesection2->homesection2_image = $new_image_name;
            
        }else{
            return response([
                'error'=>"Please select jpg or png image"
            ]);
        }
        
        //delete pic from another folder
            if(file_exists(base_path() .'/storage/app/homesection_others/'.$req->file('image_up')->hashName())) {
                @unlink(base_path() .'/storage/app/homesection_others/'.$req->file('image_up')->hashName());
            }

            $homesection2->save();
            return response([
                'success'=>"Image Updated Successfully"
            ]);

        }else{
            return response([
                'error'=>"Please select an image"
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

    function homesection2Approve($id, Request $req){

        $homesection2 = Homesection2::find($id);
        $homesection2->homesection2_status = 0;
        
        
            $homesection2->save();

            return response([
                'success'=>"Approved Successfully"
            ]);
        
    }

    function homesection2Decline($id, Request $req){

        $homesection2 = Homesection2::find($id);
        $homesection2->homesection2_status = 2;
        
        
            $homesection2->save();

            return response([
                'success'=>"Declined Successfully"
            ]);
        
    }
}
