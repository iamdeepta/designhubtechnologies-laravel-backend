<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Homesection3;

class Homesection3Controller extends Controller
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


    function homesection3Add(Request $req){
        
        $homesection3 = new Homesection3;
        $homesection3->homesection3_title = $req->input('title');
        
        $homesection3->homesection3_description = $req->input('description');
        $homesection3->homesection3_category = $req->input('category');
        
        if($req->file('image')!=''){
        //$homesection3->homesection3_image = $req->file('image')->store('homesection1');
        $homesection3->homesection3_image = $req->file('image')->store('homesection_others');
        $homesection3->homesection3_image = $req->file('image')->hashName();
        $image_name = pathinfo($homesection3->homesection3_image, PATHINFO_FILENAME);
        $image_extension = pathinfo($homesection3->homesection3_image, PATHINFO_EXTENSION);

        $new_image_name = 'homesection1/'.$image_name.'.webp';

        if($image_extension=='PNG' || $image_extension=='png'){
            Homesection3Controller::png_to_webp($homesection3->homesection3_image,$new_image_name);
            $homesection3->homesection3_image = $new_image_name;
            
        }elseif($image_extension=='JPG' || $image_extension=='jpg' || $image_extension=='JPEG' || $image_extension=='jpeg'){
            Homesection3Controller::jpg_to_webp($homesection3->homesection3_image,$new_image_name);
            $homesection3->homesection3_image = $new_image_name;
            
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

        $homesection3->homesection3_status = 7;
        $homesection3->homesection3_date = date("Y-m-d");


        if($req->input('title')!='' && $req->input('description')!='' && $req->input('category')!='' && $req->file('image')!=''){
            $homesection3->save();
            return response([
                'success'=>"Request sent. Wait for approval."
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

    function homesection3GetSuper(){

        $result = Homesection3::where('homesection3_status',7)->orderBy('homesection3_id','desc')->first(); 
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


    //update image
    function homesection3UpdateImage($name, Request $req){

        $homesection3 = Homesection3::where('homesection3_image',$name)->first();

        if($req->file('image_up')!=''){

            //delete existing image uploaded before updating from homesection1
        if(file_exists(base_path() .'/storage/app/'.$homesection3->homesection3_image)) {
                @unlink(base_path() .'/storage/app/'.$homesection3->homesection3_image);
            }
        
        $homesection3->homesection3_image = $req->file('image_up')->store('homesection_others');
        $homesection3->homesection3_image = $req->file('image_up')->hashName();
        $image_name = pathinfo($homesection3->homesection3_image, PATHINFO_FILENAME);
        $image_extension = pathinfo($homesection3->homesection3_image, PATHINFO_EXTENSION);

        $new_image_name = 'homesection1/'.$image_name.'.webp';

        if($image_extension=='PNG' || $image_extension=='png'){
            Homesection3Controller::png_to_webp($homesection3->homesection3_image,$new_image_name);
            $homesection3->homesection3_image = $new_image_name;
            
        }elseif($image_extension=='JPG' || $image_extension=='jpg' || $image_extension=='JPEG' || $image_extension=='jpeg'){
            Homesection3Controller::jpg_to_webp($homesection3->homesection3_image,$new_image_name);
            $homesection3->homesection3_image = $new_image_name;
            
        }else{
            return response([
                'error'=>"Please select jpg or png image"
            ]);
        }
        
        //delete pic from another folder
            if(file_exists(base_path() .'/storage/app/homesection_others/'.$req->file('image_up')->hashName())) {
                @unlink(base_path() .'/storage/app/homesection_others/'.$req->file('image_up')->hashName());
            }

            $homesection3->save();
            return response([
                'success'=>"Image Updated Successfully"
            ]);

        }else{
            return response([
                'error'=>"Please select an image"
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

    function homesection3Approve($id, Request $req){

        $homesection3 = Homesection3::find($id);
        $homesection3->homesection3_status = 0;
        
        
            $homesection3->save();

            return response([
                'success'=>"Approved Successfully"
            ]);
        
    }

    function homesection3Decline($id, Request $req){

        $homesection3 = Homesection3::find($id);
        $homesection3->homesection3_status = 2;
        
        
            $homesection3->save();

            return response([
                'success'=>"Declined Successfully"
            ]);
        
    }
}
