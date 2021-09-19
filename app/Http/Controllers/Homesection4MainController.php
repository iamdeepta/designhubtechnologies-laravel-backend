<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Homesection4Main;


class Homesection4MainController extends Controller
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
    function homesection4MainAdd(Request $req){
        
        $homesection4Main = new Homesection4Main;
        $homesection4Main->homesection4_main_title = $req->input('main_title');
        
        
        if($req->file('main_icon')!=''){
        $homesection4Main->homesection4_main_icon = $req->file('main_icon')->store('homesection_others');
        $homesection4Main->homesection4_main_icon = $req->file('main_icon')->hashName();
        $image_name = pathinfo($homesection4Main->homesection4_main_icon, PATHINFO_FILENAME);
        $image_extension = pathinfo($homesection4Main->homesection4_main_icon, PATHINFO_EXTENSION);

        $new_image_name = 'homesection1/'.$image_name.'.webp';

        if($image_extension=='PNG' || $image_extension=='png'){
            Homesection4MainController::png_to_webp($homesection4Main->homesection4_main_icon,$new_image_name);
            $homesection4Main->homesection4_main_icon = $new_image_name;
            
        }elseif($image_extension=='JPG' || $image_extension=='jpg' || $image_extension=='JPEG' || $image_extension=='jpeg'){
            Homesection4MainController::jpg_to_webp($homesection4Main->homesection4_main_icon,$new_image_name);
            $homesection4Main->homesection4_main_icon = $new_image_name;
            
        }else{
            return response([
                'error'=>"Please select jpg or png image"
            ]);
        }
        
        //delete pic from another folder
            if(file_exists(base_path() .'/storage/app/homesection_others/'.$req->file('main_icon')->hashName())) {
                @unlink(base_path() .'/storage/app/homesection_others/'.$req->file('main_icon')->hashName());
            }
        
        }else{
            return response([
                'error'=>"Please select an icon"
            ]);
        }


        if($req->file('main_image1')!=''){
        $homesection4Main->homesection4_main_image1 = $req->file('main_image1')->store('homesection_others');
        $homesection4Main->homesection4_main_image1 = $req->file('main_image1')->hashName();
        $image_name1 = pathinfo($homesection4Main->homesection4_main_image1, PATHINFO_FILENAME);
        $image_extension1 = pathinfo($homesection4Main->homesection4_main_image1, PATHINFO_EXTENSION);

        $new_image_name1 = 'homesection1/'.$image_name1.'.webp';

        if($image_extension1=='PNG' || $image_extension1=='png'){
            Homesection4MainController::png_to_webp($homesection4Main->homesection4_main_image1,$new_image_name1);
            $homesection4Main->homesection4_main_image1 = $new_image_name1;
            
        }elseif($image_extension1=='JPG' || $image_extension1=='jpg' || $image_extension1=='JPEG' || $image_extension1=='jpeg'){
            Homesection4MainController::jpg_to_webp($homesection4Main->homesection4_main_image1,$new_image_name1);
            $homesection4Main->homesection4_main_image1 = $new_image_name1;
            
        }else{
            return response([
                'error'=>"Please select jpg or png image"
            ]);
        }
        
        //delete pic from another folder
            if(file_exists(base_path() .'/storage/app/homesection_others/'.$req->file('main_image1')->hashName())) {
                @unlink(base_path() .'/storage/app/homesection_others/'.$req->file('main_image1')->hashName());
            }
        
        }else{
            return response([
                'error'=>"Please select image1"
            ]);
        }

        if($req->file('main_image2')!=''){
        $homesection4Main->homesection4_main_image2 = $req->file('main_image2')->store('homesection_others');
        $homesection4Main->homesection4_main_image2 = $req->file('main_image2')->hashName();
        $image_name2 = pathinfo($homesection4Main->homesection4_main_image2, PATHINFO_FILENAME);
        $image_extension2 = pathinfo($homesection4Main->homesection4_main_image2, PATHINFO_EXTENSION);

        $new_image_name2 = 'homesection1/'.$image_name2.'.webp';

        if($image_extension2=='PNG' || $image_extension2=='png'){
            Homesection4MainController::png_to_webp($homesection4Main->homesection4_main_image2,$new_image_name2);
            $homesection4Main->homesection4_main_image2 = $new_image_name2;
            
        }elseif($image_extension2=='JPG' || $image_extension2=='jpg' || $image_extension2=='JPEG' || $image_extension2=='jpeg'){
            Homesection4MainController::jpg_to_webp($homesection4Main->homesection4_main_image2,$new_image_name2);
            $homesection4Main->homesection4_main_image2 = $new_image_name2;
            
        }else{
            return response([
                'error'=>"Please select jpg or png image"
            ]);
        }
        
        //delete pic from another folder
            if(file_exists(base_path() .'/storage/app/homesection_others/'.$req->file('main_image2')->hashName())) {
                @unlink(base_path() .'/storage/app/homesection_others/'.$req->file('main_image2')->hashName());
            }
        
        }


        if($req->file('main_image3')!=''){
        $homesection4Main->homesection4_main_image3 = $req->file('main_image3')->store('homesection_others');
        $homesection4Main->homesection4_main_image3 = $req->file('main_image3')->hashName();
        $image_name3 = pathinfo($homesection4Main->homesection4_main_image3, PATHINFO_FILENAME);
        $image_extension3 = pathinfo($homesection4Main->homesection4_main_image3, PATHINFO_EXTENSION);

        $new_image_name3 = 'homesection1/'.$image_name3.'.webp';

        if($image_extension3=='PNG' || $image_extension3=='png'){
            Homesection4MainController::png_to_webp($homesection4Main->homesection4_main_image3,$new_image_name3);
            $homesection4Main->homesection4_main_image3 = $new_image_name3;
            
        }elseif($image_extension3=='JPG' || $image_extension3=='jpg' || $image_extension3=='JPEG' || $image_extension3=='jpeg'){
            Homesection4MainController::jpg_to_webp($homesection4Main->homesection4_main_image3,$new_image_name3);
            $homesection4Main->homesection4_main_image3 = $new_image_name3;
            
        }else{
            return response([
                'error'=>"Please select jpg or png image"
            ]);
        }
        
        //delete pic from another folder
            if(file_exists(base_path() .'/storage/app/homesection_others/'.$req->file('main_image3')->hashName())) {
                @unlink(base_path() .'/storage/app/homesection_others/'.$req->file('main_image3')->hashName());
            }
        
        }


        $homesection4Main->homesection4_main_status = 0;
        $homesection4Main->homesection4_main_date = date("Y-m-d");


        if($req->input('main_title')!='' && $req->file('main_icon')!='' && $req->file('main_image1')!=''){
            $homesection4Main->save();
            return response([
                'success'=>"Added Successfully"
            ]);
        }else{
            return response([
                'error'=>"Please fill up all the fields"
            ]);
        }
        
    }


    function homesection4MainGet(){

        $result = Homesection4Main::where('homesection4_main_status',0)->orderBy('homesection4_main_id','desc')->get(); 
        if($result==true){
            return response()->json($result);
        }else{
            return response()->json(["error"=>"Data not found"]);
        }
    }


    function homesection4MainUpdate($id, Request $req){

        $homesection4Main = Homesection4Main::where('homesection4_main_id',$id)->first();
        $homesection4Main->homesection4_main_title = $req->input('main_title_up');
        

        if($homesection4Main->homesection4_main_title!=''){
            $homesection4Main->save();
            return response([
                'success'=>"Updated Successfully"
            ]);
        }else{
            return response([
                'error'=>"Don't leave any field empty"
            ]);
        }
    }


    //update icon
    function homesection4MainUpdateIcon($name, Request $req){

        $homesection4Main = Homesection4Main::where('homesection4_main_icon',$name)->first();

        if($req->file('main_icon_up')!=''){

            //delete existing image uploaded before updating from homesection1
        if(file_exists(base_path() .'/storage/app/'.$homesection4Main->homesection4_main_icon)) {
                @unlink(base_path() .'/storage/app/'.$homesection4Main->homesection4_main_icon);
            }
        
        $homesection4Main->homesection4_main_icon = $req->file('main_icon_up')->store('homesection_others');
        $homesection4Main->homesection4_main_icon = $req->file('main_icon_up')->hashName();
        $image_name = pathinfo($homesection4Main->homesection4_main_icon, PATHINFO_FILENAME);
        $image_extension = pathinfo($homesection4Main->homesection4_main_icon, PATHINFO_EXTENSION);

        $new_image_name = 'homesection1/'.$image_name.'.webp';

        if($image_extension=='PNG' || $image_extension=='png'){
            Homesection4MainController::png_to_webp($homesection4Main->homesection4_main_icon,$new_image_name);
            $homesection4Main->homesection4_main_icon = $new_image_name;
            
        }elseif($image_extension=='JPG' || $image_extension=='jpg' || $image_extension=='JPEG' || $image_extension=='jpeg'){
            Homesection4MainController::jpg_to_webp($homesection4Main->homesection4_main_icon,$new_image_name);
            $homesection4Main->homesection4_main_icon = $new_image_name;
            
        }else{
            return response([
                'error'=>"Please select jpg or png image"
            ]);
        }
        
        //delete pic from another folder
            if(file_exists(base_path() .'/storage/app/homesection_others/'.$req->file('main_icon_up')->hashName())) {
                @unlink(base_path() .'/storage/app/homesection_others/'.$req->file('main_icon_up')->hashName());
            }

            $homesection4Main->save();
            return response([
                'success'=>"Icon Updated Successfully"
            ]);

        }else{
            return response([
                'error'=>"Please select an icon"
            ]);
        }
    }


    //update image1
    function homesection4MainUpdateImage1($name, Request $req){

        $homesection4Main = Homesection4Main::where('homesection4_main_image1',$name)->first();

        if($req->file('main_image1_up')!=''){

            //delete existing image uploaded before updating from homesection1
        if(file_exists(base_path() .'/storage/app/'.$homesection4Main->homesection4_main_image1)) {
                @unlink(base_path() .'/storage/app/'.$homesection4Main->homesection4_main_image1);
            }
        
        $homesection4Main->homesection4_main_image1 = $req->file('main_image1_up')->store('homesection_others');
        $homesection4Main->homesection4_main_image1 = $req->file('main_image1_up')->hashName();
        $image_name1 = pathinfo($homesection4Main->homesection4_main_image1, PATHINFO_FILENAME);
        $image_extension1 = pathinfo($homesection4Main->homesection4_main_image1, PATHINFO_EXTENSION);

        $new_image_name1 = 'homesection1/'.$image_name1.'.webp';

        if($image_extension1=='PNG' || $image_extension1=='png'){
            Homesection4MainController::png_to_webp($homesection4Main->homesection4_main_image1,$new_image_name1);
            $homesection4Main->homesection4_main_image1 = $new_image_name1;
            
        }elseif($image_extension1=='JPG' || $image_extension1=='jpg' || $image_extension1=='JPEG' || $image_extension1=='jpeg'){
            Homesection4MainController::jpg_to_webp($homesection4Main->homesection4_main_image1,$new_image_name1);
            $homesection4Main->homesection4_main_image1 = $new_image_name1;
            
        }else{
            return response([
                'error'=>"Please select jpg or png image"
            ]);
        }
        
        //delete pic from another folder
            if(file_exists(base_path() .'/storage/app/homesection_others/'.$req->file('main_image1_up')->hashName())) {
                @unlink(base_path() .'/storage/app/homesection_others/'.$req->file('main_image1_up')->hashName());
            }

            $homesection4Main->save();
            return response([
                'success'=>"Image1 Updated Successfully"
            ]);

        }else{
            return response([
                'error'=>"Please select an image"
            ]);
        }
    }


    //update image2
    function homesection4MainUpdateImage2($name, Request $req){

        $homesection4Main = Homesection4Main::where('homesection4_main_image2',$name)->first();

        if($req->file('main_image2_up')!=''){

            //delete existing image uploaded before updating from homesection1
        if(file_exists(base_path() .'/storage/app/'.$homesection4Main->homesection4_main_image2)) {
                @unlink(base_path() .'/storage/app/'.$homesection4Main->homesection4_main_image2);
            }
        
        $homesection4Main->homesection4_main_image2 = $req->file('main_image2_up')->store('homesection_others');
        $homesection4Main->homesection4_main_image2 = $req->file('main_image2_up')->hashName();
        $image_name2 = pathinfo($homesection4Main->homesection4_main_image2, PATHINFO_FILENAME);
        $image_extension2 = pathinfo($homesection4Main->homesection4_main_image2, PATHINFO_EXTENSION);

        $new_image_name2 = 'homesection1/'.$image_name2.'.webp';

        if($image_extension2=='PNG' || $image_extension2=='png'){
            Homesection4MainController::png_to_webp($homesection4Main->homesection4_main_image2,$new_image_name2);
            $homesection4Main->homesection4_main_image2 = $new_image_name2;
            
        }elseif($image_extension2=='JPG' || $image_extension2=='jpg' || $image_extension2=='JPEG' || $image_extension2=='jpeg'){
            Homesection4MainController::jpg_to_webp($homesection4Main->homesection4_main_image2,$new_image_name2);
            $homesection4Main->homesection4_main_image2 = $new_image_name2;
            
        }else{
            return response([
                'error'=>"Please select jpg or png image"
            ]);
        }
        
        //delete pic from another folder
            if(file_exists(base_path() .'/storage/app/homesection_others/'.$req->file('main_image2_up')->hashName())) {
                @unlink(base_path() .'/storage/app/homesection_others/'.$req->file('main_image2_up')->hashName());
            }

            $homesection4Main->save();
            return response([
                'success'=>"Image2 Updated Successfully"
            ]);

        }else{
            return response([
                'error'=>"Please select an image"
            ]);
        }
    }


    //update image3
    function homesection4MainUpdateImage3($name, Request $req){

        $homesection4Main = Homesection4Main::where('homesection4_main_image3',$name)->first();

        if($req->file('main_image3_up')!=''){

            //delete existing image uploaded before updating from homesection1
        if(file_exists(base_path() .'/storage/app/'.$homesection4Main->homesection4_main_image3)) {
                @unlink(base_path() .'/storage/app/'.$homesection4Main->homesection4_main_image3);
            }
        
        $homesection4Main->homesection4_main_image3 = $req->file('main_image3_up')->store('homesection_others');
        $homesection4Main->homesection4_main_image3 = $req->file('main_image3_up')->hashName();
        $image_name3 = pathinfo($homesection4Main->homesection4_main_image3, PATHINFO_FILENAME);
        $image_extension3 = pathinfo($homesection4Main->homesection4_main_image3, PATHINFO_EXTENSION);

        $new_image_name3 = 'homesection1/'.$image_name3.'.webp';

        if($image_extension3=='PNG' || $image_extension3=='png'){
            Homesection4MainController::png_to_webp($homesection4Main->homesection4_main_image3,$new_image_name3);
            $homesection4Main->homesection4_main_image3 = $new_image_name3;
            
        }elseif($image_extension3=='JPG' || $image_extension3=='jpg' || $image_extension3=='JPEG' || $image_extension3=='jpeg'){
            Homesection4MainController::jpg_to_webp($homesection4Main->homesection4_main_image3,$new_image_name3);
            $homesection4Main->homesection4_main_image3 = $new_image_name3;
            
        }else{
            return response([
                'error'=>"Please select jpg or png image"
            ]);
        }
        
        //delete pic from another folder
            if(file_exists(base_path() .'/storage/app/homesection_others/'.$req->file('main_image3_up')->hashName())) {
                @unlink(base_path() .'/storage/app/homesection_others/'.$req->file('main_image3_up')->hashName());
            }

            $homesection4Main->save();
            return response([
                'success'=>"Image3 Updated Successfully"
            ]);

        }else{
            return response([
                'error'=>"Please select an image"
            ]);
        }
    }


    function homesection4MainDelete($id, Request $req){

        $homesection4Main = Homesection4Main::find($id);
        $homesection4Main->homesection4_main_status = 1;
        
        
            $homesection4Main->save();

            return response([
                'success'=>"Deleted Successfully"
            ]);
        
    }
}
