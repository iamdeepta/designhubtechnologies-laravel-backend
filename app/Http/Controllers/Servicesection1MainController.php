<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Servicesection1Main;


class Servicesection1MainController extends Controller
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
    function servicesection1MainAdd(Request $req){
        
        $servicesection1Main = new Servicesection1Main;
        $servicesection1Main->servicesection1_main_title = $req->input('main_title');
        $servicesection1Main->servicesection1_main_description = $req->input('main_description');
        
        
        if($req->file('main_image')!=''){
        $servicesection1Main->servicesection1_main_image = $req->file('main_image')->store('homesection_others');
        $servicesection1Main->servicesection1_main_image = $req->file('main_image')->hashName();
        $image_name = pathinfo($servicesection1Main->servicesection1_main_image, PATHINFO_FILENAME);
        $image_extension = pathinfo($servicesection1Main->servicesection1_main_image, PATHINFO_EXTENSION);

        $new_image_name = 'homesection1/'.$image_name.'.webp';

        if($image_extension=='PNG' || $image_extension=='png'){
            Servicesection1MainController::png_to_webp($servicesection1Main->servicesection1_main_image,$new_image_name);
            $servicesection1Main->servicesection1_main_image = $new_image_name;
            
        }elseif($image_extension=='JPG' || $image_extension=='jpg' || $image_extension=='JPEG' || $image_extension=='jpeg'){
            Servicesection1MainController::jpg_to_webp($servicesection1Main->servicesection1_main_image,$new_image_name);
            $servicesection1Main->servicesection1_main_image = $new_image_name;
            
        }else{
            return response([
                'error'=>"Please select jpg or png icon"
            ]);
        }
        
        //delete pic from another folder
            if(file_exists(base_path() .'/storage/app/homesection_others/'.$req->file('main_image')->hashName())) {
                @unlink(base_path() .'/storage/app/homesection_others/'.$req->file('main_image')->hashName());
            }
        
        }else{
            return response([
                'error'=>"Please select an icon"
            ]);
        }

        $servicesection1Main->servicesection1_main_status = 0;
        $servicesection1Main->servicesection1_main_date = date("Y-m-d");


        if($req->input('main_title')!='' && $req->input('main_description')!='' && $req->file('main_image')!=''){
            $servicesection1Main->save();
            return response([
                'success'=>"Added Successfully"
            ]);
        }else{
            return response([
                'error'=>"Please fill up all the fields"
            ]);
        }
        
    }


    function servicesection1MainGet(){

        $result = Servicesection1Main::where('servicesection1_main_status',0)->orderBy('servicesection1_main_id','desc')->get(); 
        if($result==true){
            return response()->json($result);
        }else{
            return response()->json(["error"=>"Data not found"]);
        }
    }


    function servicesection1MainUpdate($id, Request $req){

        $servicesection1Main = Servicesection1Main::where('servicesection1_main_id',$id)->first();
        $servicesection1Main->servicesection1_main_title = $req->input('main_title_up');
        $servicesection1Main->servicesection1_main_description = $req->input('main_description_up');
        

        if($servicesection1Main->servicesection1_main_title!='' && $servicesection1Main->servicesection1_main_description!=''){
            $servicesection1Main->save();
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
    function servicesection1MainUpdateImage($name, Request $req){

        $servicesection1Main = Servicesection1Main::where('servicesection1_main_image',$name)->first();

        if($req->file('main_image_up')!=''){

            //delete existing image uploaded before updating from homesection1
        if(file_exists(base_path() .'/storage/app/'.$servicesection1Main->servicesection1_main_image)) {
                @unlink(base_path() .'/storage/app/'.$servicesection1Main->servicesection1_main_image);
            }
        
        $servicesection1Main->servicesection1_main_image = $req->file('main_image_up')->store('homesection_others');
        $servicesection1Main->servicesection1_main_image = $req->file('main_image_up')->hashName();
        $image_name = pathinfo($servicesection1Main->servicesection1_main_image, PATHINFO_FILENAME);
        $image_extension = pathinfo($servicesection1Main->servicesection1_main_image, PATHINFO_EXTENSION);

        $new_image_name = 'homesection1/'.$image_name.'.webp';

        if($image_extension=='PNG' || $image_extension=='png'){
            Servicesection1MainController::png_to_webp($servicesection1Main->servicesection1_main_image,$new_image_name);
            $servicesection1Main->servicesection1_main_image = $new_image_name;
            
        }elseif($image_extension=='JPG' || $image_extension=='jpg' || $image_extension=='JPEG' || $image_extension=='jpeg'){
            Servicesection1MainController::jpg_to_webp($servicesection1Main->servicesection1_main_image,$new_image_name);
            $servicesection1Main->servicesection1_main_image = $new_image_name;
            
        }else{
            return response([
                'error'=>"Please select jpg or png icon"
            ]);
        }
        
        //delete pic from another folder
            if(file_exists(base_path() .'/storage/app/homesection_others/'.$req->file('main_image_up')->hashName())) {
                @unlink(base_path() .'/storage/app/homesection_others/'.$req->file('main_image_up')->hashName());
            }

            $servicesection1Main->save();
            return response([
                'success'=>"Icon Updated Successfully"
            ]);

        }else{
            return response([
                'error'=>"Please select an icon"
            ]);
        }
    }


    function servicesection1MainDelete($id, Request $req){

        $servicesection1Main = Servicesection1Main::find($id);
        $servicesection1Main->servicesection1_main_status = 1;
        
        
            $servicesection1Main->save();

            return response([
                'success'=>"Deleted Successfully"
            ]);
        
    }
}
