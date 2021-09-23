<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Homesection6Main;


class Homesection6MainController extends Controller
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
    function homesection6MainAdd(Request $req){
        
        $homesection6Main = new Homesection6Main;
        $homesection6Main->homesection6_main_title = $req->input('main_title');
        $homesection6Main->homesection6_main_description = $req->input('main_description');
        
        
        if($req->file('main_image')!=''){
        $homesection6Main->homesection6_main_image = $req->file('main_image')->store('homesection_others');
        $homesection6Main->homesection6_main_image = $req->file('main_image')->hashName();
        $image_name = pathinfo($homesection6Main->homesection6_main_image, PATHINFO_FILENAME);
        $image_extension = pathinfo($homesection6Main->homesection6_main_image, PATHINFO_EXTENSION);

        $new_image_name = 'homesection1/'.$image_name.'.webp';

        if($image_extension=='PNG' || $image_extension=='png'){
            Homesection6MainController::png_to_webp($homesection6Main->homesection6_main_image,$new_image_name);
            $homesection6Main->homesection6_main_image = $new_image_name;
            
        }elseif($image_extension=='JPG' || $image_extension=='jpg' || $image_extension=='JPEG' || $image_extension=='jpeg'){
            Homesection6MainController::jpg_to_webp($homesection6Main->homesection6_main_image,$new_image_name);
            $homesection6Main->homesection6_main_image = $new_image_name;
            
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

        $homesection6Main->homesection6_main_status = 7;
        $homesection6Main->homesection6_main_date = date("Y-m-d");


        if($req->input('main_title')!='' && $req->input('main_description')!='' && $req->file('main_image')!=''){
            $homesection6Main->save();
            return response([
                'success'=>"Request sent. Wait for approval."
            ]);
        }else{
            return response([
                'error'=>"Please fill up all the fields"
            ]);
        }
        
    }


    function homesection6MainGet(){

        $result = Homesection6Main::where('homesection6_main_status',0)->orderBy('homesection6_main_id','desc')->get(); 
        if($result==true){
            return response()->json($result);
        }else{
            return response()->json(["error"=>"Data not found"]);
        }
    }

    function homesection6MainGetSuper(){

        $result = Homesection6Main::where('homesection6_main_status',7)->orderBy('homesection6_main_id','desc')->get(); 
        if($result==true){
            return response()->json($result);
        }else{
            return response()->json(["error"=>"Data not found"]);
        }
    }


    function homesection6MainUpdate($id, Request $req){

        $homesection6Main = Homesection6Main::where('homesection6_main_id',$id)->first();
        $homesection6Main->homesection6_main_title = $req->input('main_title_up');
        $homesection6Main->homesection6_main_description = $req->input('main_description_up');
        

        if($homesection6Main->homesection6_main_title!='' && $homesection6Main->homesection6_main_description!=''){
            $homesection6Main->save();
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
    function homesection6MainUpdateImage($name, Request $req){

        $homesection6Main = Homesection6Main::where('homesection6_main_image',$name)->first();

        if($req->file('main_image_up')!=''){

            //delete existing image uploaded before updating from homesection1
        if(file_exists(base_path() .'/storage/app/'.$homesection6Main->homesection6_main_image)) {
                @unlink(base_path() .'/storage/app/'.$homesection6Main->homesection6_main_image);
            }
        
        $homesection6Main->homesection6_main_image = $req->file('main_image_up')->store('homesection_others');
        $homesection6Main->homesection6_main_image = $req->file('main_image_up')->hashName();
        $image_name = pathinfo($homesection6Main->homesection6_main_image, PATHINFO_FILENAME);
        $image_extension = pathinfo($homesection6Main->homesection6_main_image, PATHINFO_EXTENSION);

        $new_image_name = 'homesection1/'.$image_name.'.webp';

        if($image_extension=='PNG' || $image_extension=='png'){
            Homesection6MainController::png_to_webp($homesection6Main->homesection6_main_image,$new_image_name);
            $homesection6Main->homesection6_main_image = $new_image_name;
            
        }elseif($image_extension=='JPG' || $image_extension=='jpg' || $image_extension=='JPEG' || $image_extension=='jpeg'){
            Homesection6MainController::jpg_to_webp($homesection6Main->homesection6_main_image,$new_image_name);
            $homesection6Main->homesection6_main_image = $new_image_name;
            
        }else{
            return response([
                'error'=>"Please select jpg or png image"
            ]);
        }
        
        //delete pic from another folder
            if(file_exists(base_path() .'/storage/app/homesection_others/'.$req->file('main_image_up')->hashName())) {
                @unlink(base_path() .'/storage/app/homesection_others/'.$req->file('main_image_up')->hashName());
            }

            $homesection6Main->save();
            return response([
                'success'=>"Image Updated Successfully"
            ]);

        }else{
            return response([
                'error'=>"Please select an image"
            ]);
        }
    }


    function homesection6MainDelete($id, Request $req){

        $homesection6Main = Homesection6Main::find($id);
        $homesection6Main->homesection6_main_status = 1;
        
        
            $homesection6Main->save();

            return response([
                'success'=>"Deleted Successfully"
            ]);
        
    }

    function homesection6MainApprove($id, Request $req){

        $homesection6Main = Homesection6Main::find($id);
        $homesection6Main->homesection6_main_status = 0;
        
        
            $homesection6Main->save();

            return response([
                'success'=>"Approved Successfully"
            ]);
        
    }

    function homesection6MainDecline($id, Request $req){

        $homesection6Main = Homesection6Main::find($id);
        $homesection6Main->homesection6_main_status = 2;
        
        
            $homesection6Main->save();

            return response([
                'success'=>"Declined Successfully"
            ]);
        
    }
}
