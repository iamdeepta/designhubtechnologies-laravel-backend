<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aboutsection2;

class Aboutsection2Controller extends Controller
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


    function aboutsection2Add(Request $req){
        
        $aboutsection2 = new Aboutsection2;
        $aboutsection2->aboutsection2_title = $req->input('title');
        
        $aboutsection2->aboutsection2_description = $req->input('description');
        
        
        if($req->file('image')!=''){
        //$aboutsection2->aboutsection2_image = $req->file('image')->store('homesection1');
        $aboutsection2->aboutsection2_image = $req->file('image')->store('homesection_others');
        $aboutsection2->aboutsection2_image = $req->file('image')->hashName();
        $image_name = pathinfo($aboutsection2->aboutsection2_image, PATHINFO_FILENAME);
        $image_extension = pathinfo($aboutsection2->aboutsection2_image, PATHINFO_EXTENSION);

        $new_image_name = 'homesection1/'.$image_name.'.webp';

        if($image_extension=='PNG' || $image_extension=='png'){
            Aboutsection2Controller::png_to_webp($aboutsection2->aboutsection2_image,$new_image_name);
            $aboutsection2->aboutsection2_image = $new_image_name;
            
        }elseif($image_extension=='JPG' || $image_extension=='jpg' || $image_extension=='JPEG' || $image_extension=='jpeg'){
            Aboutsection2Controller::jpg_to_webp($aboutsection2->aboutsection2_image,$new_image_name);
            $aboutsection2->aboutsection2_image = $new_image_name;
            
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

        $aboutsection2->aboutsection2_status = 0;
        $aboutsection2->aboutsection2_date = date("Y-m-d");


        if($req->input('title')!='' && $req->input('description')!='' && $req->file('image')!=''){
            $aboutsection2->save();
            return response([
                'success'=>"Added Successfully"
            ]);
        }else{
            return response([
                'error'=>"Please fill up all the fields"
            ]);
        }
        
    }


    function aboutsection2Get(){

        $result = Aboutsection2::where('aboutsection2_status',0)->orderBy('aboutsection2_id','desc')->first(); 
        if($result==true){
            return response()->json($result);
        }else{
            return response()->json(["error"=>"Data not found"]);
        }
    }


    function aboutsection2Update($id, Request $req){

        $aboutsection2 = Aboutsection2::where('aboutsection2_id',$id)->first();
        $aboutsection2->aboutsection2_title = $req->input('title_up');
        $aboutsection2->aboutsection2_description = $req->input('description_up');
        

        if($aboutsection2->aboutsection2_title!='' && $aboutsection2->aboutsection2_description!=''){
            $aboutsection2->save();
            return response([
                'success'=>"Updated Successfully"
            ]);
        }else{
            return response([
                'error'=>"Please enter title and description"
            ]);
        }
    }


    //update image
    function aboutsection2UpdateImage($name, Request $req){

        $aboutsection2 = Aboutsection2::where('aboutsection2_image',$name)->first();

        if($req->file('image_up')!=''){

            //delete existing image uploaded before updating from homesection1
        if(file_exists(base_path() .'/storage/app/'.$aboutsection2->aboutsection2_image)) {
                @unlink(base_path() .'/storage/app/'.$aboutsection2->aboutsection2_image);
            }
        
        $aboutsection2->aboutsection2_image = $req->file('image_up')->store('homesection_others');
        $aboutsection2->aboutsection2_image = $req->file('image_up')->hashName();
        $image_name = pathinfo($aboutsection2->aboutsection2_image, PATHINFO_FILENAME);
        $image_extension = pathinfo($aboutsection2->aboutsection2_image, PATHINFO_EXTENSION);

        $new_image_name = 'homesection1/'.$image_name.'.webp';

        if($image_extension=='PNG' || $image_extension=='png'){
            Aboutsection2Controller::png_to_webp($aboutsection2->aboutsection2_image,$new_image_name);
            $aboutsection2->aboutsection2_image = $new_image_name;
            
        }elseif($image_extension=='JPG' || $image_extension=='jpg' || $image_extension=='JPEG' || $image_extension=='jpeg'){
            Aboutsection2Controller::jpg_to_webp($aboutsection2->aboutsection2_image,$new_image_name);
            $aboutsection2->aboutsection2_image = $new_image_name;
            
        }else{
            return response([
                'error'=>"Please select jpg or png image"
            ]);
        }
        
        //delete pic from another folder
            if(file_exists(base_path() .'/storage/app/homesection_others/'.$req->file('image_up')->hashName())) {
                @unlink(base_path() .'/storage/app/homesection_others/'.$req->file('image_up')->hashName());
            }

            $aboutsection2->save();
            return response([
                'success'=>"Image Updated Successfully"
            ]);

        }else{
            return response([
                'error'=>"Please select an image"
            ]);
        }
    }


    function aboutsection2Delete($id, Request $req){

        $aboutsection2 = Aboutsection2::find($id);
        $aboutsection2->aboutsection2_status = 1;
        
        
            $aboutsection2->save();

            return response([
                'success'=>"Deleted Successfully"
            ]);
        
    }
}
