<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aboutsection1Main;


class Aboutsection1MainController extends Controller
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
    function aboutsection1MainAdd(Request $req){
        
        $aboutsection1Main = new Aboutsection1Main;
        $aboutsection1Main->aboutsection1_main_title = $req->input('main_title');
        $aboutsection1Main->aboutsection1_main_description = $req->input('main_description');
        
        
        if($req->file('main_image')!=''){
        $aboutsection1Main->aboutsection1_main_image = $req->file('main_image')->store('homesection_others');
        $aboutsection1Main->aboutsection1_main_image = $req->file('main_image')->hashName();
        $image_name = pathinfo($aboutsection1Main->aboutsection1_main_image, PATHINFO_FILENAME);
        $image_extension = pathinfo($aboutsection1Main->aboutsection1_main_image, PATHINFO_EXTENSION);

        $new_image_name = 'homesection1/'.$image_name.'.webp';

        if($image_extension=='PNG' || $image_extension=='png'){
            Aboutsection1MainController::png_to_webp($aboutsection1Main->aboutsection1_main_image,$new_image_name);
            $aboutsection1Main->aboutsection1_main_image = $new_image_name;
            
        }elseif($image_extension=='JPG' || $image_extension=='jpg' || $image_extension=='JPEG' || $image_extension=='jpeg'){
            Aboutsection1MainController::jpg_to_webp($aboutsection1Main->aboutsection1_main_image,$new_image_name);
            $aboutsection1Main->aboutsection1_main_image = $new_image_name;
            
        }else{
            return response([
                'error'=>"Please select jpg or png image"
            ]);
        }
        
        //delete pic from another folder
            if(file_exists(base_path() .'/storage/app/homesection_others/'.$req->file('main_image')->hashName())) {
                @unlink(base_path() .'/storage/app/homesection_others/'.$req->file('main_image')->hashName());
            }
        
        }else{
            return response([
                'error'=>"Please select an image"
            ]);
        }

        $aboutsection1Main->aboutsection1_main_status = 0;
        $aboutsection1Main->aboutsection1_main_date = date("Y-m-d");


        if($req->input('main_title')!='' && $req->input('main_description')!='' && $req->file('main_image')!=''){
            $aboutsection1Main->save();
            return response([
                'success'=>"Added Successfully"
            ]);
        }else{
            return response([
                'error'=>"Please fill up all the fields"
            ]);
        }
        
    }


    function aboutsection1MainGet(){

        $result = Aboutsection1Main::where('aboutsection1_main_status',0)->orderBy('aboutsection1_main_id','desc')->get(); 
        if($result==true){
            return response()->json($result);
        }else{
            return response()->json(["error"=>"Data not found"]);
        }
    }


    function aboutsection1MainUpdate($id, Request $req){

        $aboutsection1Main = Aboutsection1Main::where('aboutsection1_main_id',$id)->first();
        $aboutsection1Main->aboutsection1_main_title = $req->input('main_title_up');
        $aboutsection1Main->aboutsection1_main_description = $req->input('main_description_up');
        

        if($aboutsection1Main->aboutsection1_main_title!='' && $aboutsection1Main->aboutsection1_main_description!=''){
            $aboutsection1Main->save();
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
    function aboutsection1MainUpdateImage($name, Request $req){

        $aboutsection1Main = Aboutsection1Main::where('aboutsection1_main_image',$name)->first();

        if($req->file('main_image_up')!=''){

            //delete existing image uploaded before updating from homesection1
        if(file_exists(base_path() .'/storage/app/'.$aboutsection1Main->aboutsection1_main_image)) {
                @unlink(base_path() .'/storage/app/'.$aboutsection1Main->aboutsection1_main_image);
            }
        
        $aboutsection1Main->aboutsection1_main_image = $req->file('main_image_up')->store('homesection_others');
        $aboutsection1Main->aboutsection1_main_image = $req->file('main_image_up')->hashName();
        $image_name = pathinfo($aboutsection1Main->aboutsection1_main_image, PATHINFO_FILENAME);
        $image_extension = pathinfo($aboutsection1Main->aboutsection1_main_image, PATHINFO_EXTENSION);

        $new_image_name = 'homesection1/'.$image_name.'.webp';

        if($image_extension=='PNG' || $image_extension=='png'){
            Aboutsection1MainController::png_to_webp($aboutsection1Main->aboutsection1_main_image,$new_image_name);
            $aboutsection1Main->aboutsection1_main_image = $new_image_name;
            
        }elseif($image_extension=='JPG' || $image_extension=='jpg' || $image_extension=='JPEG' || $image_extension=='jpeg'){
            Aboutsection1MainController::jpg_to_webp($aboutsection1Main->aboutsection1_main_image,$new_image_name);
            $aboutsection1Main->aboutsection1_main_image = $new_image_name;
            
        }else{
            return response([
                'error'=>"Please select jpg or png image"
            ]);
        }
        
        //delete pic from another folder
            if(file_exists(base_path() .'/storage/app/homesection_others/'.$req->file('main_image_up')->hashName())) {
                @unlink(base_path() .'/storage/app/homesection_others/'.$req->file('main_image_up')->hashName());
            }

            $aboutsection1Main->save();
            return response([
                'success'=>"Image Updated Successfully"
            ]);

        }else{
            return response([
                'error'=>"Please select an image"
            ]);
        }
    }


    function aboutsection1MainDelete($id, Request $req){

        $aboutsection1Main = Aboutsection1Main::find($id);
        $aboutsection1Main->aboutsection1_main_status = 1;
        
        
            $aboutsection1Main->save();

            return response([
                'success'=>"Deleted Successfully"
            ]);
        
    }
}
