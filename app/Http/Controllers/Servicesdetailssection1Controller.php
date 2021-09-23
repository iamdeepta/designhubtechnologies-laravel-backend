<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Servicesdetailssection1;

class Servicesdetailssection1Controller extends Controller
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


    function servicesdetailssection1Add(Request $req){
        
        $servicesdetailssection1 = new Servicesdetailssection1;
        $servicesdetailssection1->servicesdetailssection1_title1 = $req->input('title1');
        $servicesdetailssection1->servicesdetailssection1_description1 = $req->input('description1');
        $servicesdetailssection1->servicesdetailssection1_title2 = $req->input('title2');
        $servicesdetailssection1->servicesdetailssection1_description2 = $req->input('description2');
        $servicesdetailssection1->servicesdetailssection1_list = $req->input('list');
        $servicesdetailssection1->servicesdetailssection1_title3 = $req->input('title3');
        $servicesdetailssection1->servicesdetailssection1_description3 = $req->input('description3');
        
        
        
        if($req->file('image')!=''){
        //$servicesdetailssection1->servicesdetailssection1_image = $req->file('image')->store('homesection1');
        $servicesdetailssection1->servicesdetailssection1_image = $req->file('image')->store('homesection_others');
        $servicesdetailssection1->servicesdetailssection1_image = $req->file('image')->hashName();
        $image_name = pathinfo($servicesdetailssection1->servicesdetailssection1_image, PATHINFO_FILENAME);
        $image_extension = pathinfo($servicesdetailssection1->servicesdetailssection1_image, PATHINFO_EXTENSION);

        $new_image_name = 'homesection1/'.$image_name.'.webp';

        if($image_extension=='PNG' || $image_extension=='png'){
            Servicesdetailssection1Controller::png_to_webp($servicesdetailssection1->servicesdetailssection1_image,$new_image_name);
            $servicesdetailssection1->servicesdetailssection1_image = $new_image_name;
            
        }elseif($image_extension=='JPG' || $image_extension=='jpg' || $image_extension=='JPEG' || $image_extension=='jpeg'){
            Servicesdetailssection1Controller::jpg_to_webp($servicesdetailssection1->servicesdetailssection1_image,$new_image_name);
            $servicesdetailssection1->servicesdetailssection1_image = $new_image_name;
            
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

        $servicesdetailssection1->servicesdetailssection1_status = 7;
        $servicesdetailssection1->servicesdetailssection1_date = date("Y-m-d");


        if($req->input('title1')!='' && $req->input('description1')!='' && $req->input('title2')!='' && $req->input('description2')!='' && $req->file('image')!=''){
            $servicesdetailssection1->save();
            return response([
                'success'=>"Request sent. Wait for approval."
            ]);
        }else{
            return response([
                'error'=>"Please fill up all the fields"
            ]);
        }
        
    }


    function servicesdetailssection1Get(){

        $result = Servicesdetailssection1::where('servicesdetailssection1_status',0)->orderBy('servicesdetailssection1_id','desc')->first(); 
        if($result==true){
            return response()->json($result);
        }else{
            return response()->json(["error"=>"Data not found"]);
        }
    }

    function servicesdetailssection1GetSuper(){

        $result = Servicesdetailssection1::where('servicesdetailssection1_status',7)->orderBy('servicesdetailssection1_id','desc')->first(); 
        if($result==true){
            return response()->json($result);
        }else{
            return response()->json(["error"=>"Data not found"]);
        }
    }


    function servicesdetailssection1Update($id, Request $req){

        $servicesdetailssection1 = Servicesdetailssection1::where('servicesdetailssection1_id',$id)->first();
        $servicesdetailssection1->servicesdetailssection1_title1 = $req->input('title1_up');
        $servicesdetailssection1->servicesdetailssection1_description1 = $req->input('description1_up');
        $servicesdetailssection1->servicesdetailssection1_title2 = $req->input('title2_up');
        $servicesdetailssection1->servicesdetailssection1_description2 = $req->input('description2_up');
        $servicesdetailssection1->servicesdetailssection1_list = $req->input('list_up');
        $servicesdetailssection1->servicesdetailssection1_title3 = $req->input('title3_up');
        $servicesdetailssection1->servicesdetailssection1_description3 = $req->input('description3_up');
        

        if($servicesdetailssection1->servicesdetailssection1_title1!='' && $servicesdetailssection1->servicesdetailssection1_description1!='' && $servicesdetailssection1->servicesdetailssection1_title2!='' && $servicesdetailssection1->servicesdetailssection1_description2!=''){
            $servicesdetailssection1->save();
            return response([
                'success'=>"Updated Successfully"
            ]);
        }else{
            return response([
                'error'=>"Please don't leave any field empty."
            ]);
        }
    }


    //update image
    function servicesdetailssection1UpdateImage($name, Request $req){

        $servicesdetailssection1 = Servicesdetailssection1::where('servicesdetailssection1_image',$name)->first();

        if($req->file('image_up')!=''){

            //delete existing image uploaded before updating from homesection1
        if(file_exists(base_path() .'/storage/app/'.$servicesdetailssection1->servicesdetailssection1_image)) {
                @unlink(base_path() .'/storage/app/'.$servicesdetailssection1->servicesdetailssection1_image);
            }
        
        $servicesdetailssection1->servicesdetailssection1_image = $req->file('image_up')->store('homesection_others');
        $servicesdetailssection1->servicesdetailssection1_image = $req->file('image_up')->hashName();
        $image_name = pathinfo($servicesdetailssection1->servicesdetailssection1_image, PATHINFO_FILENAME);
        $image_extension = pathinfo($servicesdetailssection1->servicesdetailssection1_image, PATHINFO_EXTENSION);

        $new_image_name = 'homesection1/'.$image_name.'.webp';

        if($image_extension=='PNG' || $image_extension=='png'){
            Servicesdetailssection1Controller::png_to_webp($servicesdetailssection1->servicesdetailssection1_image,$new_image_name);
            $servicesdetailssection1->servicesdetailssection1_image = $new_image_name;
            
        }elseif($image_extension=='JPG' || $image_extension=='jpg' || $image_extension=='JPEG' || $image_extension=='jpeg'){
            Servicesdetailssection1Controller::jpg_to_webp($servicesdetailssection1->servicesdetailssection1_image,$new_image_name);
            $servicesdetailssection1->servicesdetailssection1_image = $new_image_name;
            
        }else{
            return response([
                'error'=>"Please select jpg or png image"
            ]);
        }
        
        //delete pic from another folder
            if(file_exists(base_path() .'/storage/app/homesection_others/'.$req->file('image_up')->hashName())) {
                @unlink(base_path() .'/storage/app/homesection_others/'.$req->file('image_up')->hashName());
            }

            $servicesdetailssection1->save();
            return response([
                'success'=>"Image Updated Successfully"
            ]);

        }else{
            return response([
                'error'=>"Please select an image"
            ]);
        }
    }


    function servicesdetailssection1Delete($id, Request $req){

        $servicesdetailssection1 = Servicesdetailssection1::find($id);
        $servicesdetailssection1->servicesdetailssection1_status = 1;
        
        
            $servicesdetailssection1->save();

            return response([
                'success'=>"Deleted Successfully"
            ]);
        
    }


    function servicesdetailssection1Approve($id, Request $req){

        $servicesdetailssection1 = Servicesdetailssection1::find($id);
        $servicesdetailssection1->servicesdetailssection1_status = 0;
        
        
            $servicesdetailssection1->save();

            return response([
                'success'=>"Approved Successfully"
            ]);
        
    }


    function servicesdetailssection1Decline($id, Request $req){

        $servicesdetailssection1 = Servicesdetailssection1::find($id);
        $servicesdetailssection1->servicesdetailssection1_status = 2;
        
        
            $servicesdetailssection1->save();

            return response([
                'success'=>"Declined Successfully"
            ]);
        
    }
}
