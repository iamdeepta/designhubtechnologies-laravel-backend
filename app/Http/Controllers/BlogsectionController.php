<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blogsection;


class BlogsectionController extends Controller
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
    function blogsectionAdd(Request $req){
        
        $blogsection = new Blogsection;
        $blogsection->blogsection_title = $req->input('title');
        $blogsection->blogsection_description1 = $req->input('description1');
        $blogsection->blogsection_description2 = $req->input('description2');
        $blogsection->blogsection_tag = $req->input('tag');
        $blogsection->blogsection_category = $req->input('category');
        $blogsection->blogsection_time = $req->input('time');
      


        if($req->file('image1')!=''){
        $blogsection->blogsection_image1 = $req->file('image1')->store('homesection_others');
        $blogsection->blogsection_image1 = $req->file('image1')->hashName();
        $image_name1 = pathinfo($blogsection->blogsection_image1, PATHINFO_FILENAME);
        $image_extension1 = pathinfo($blogsection->blogsection_image1, PATHINFO_EXTENSION);

        $new_image_name1 = 'homesection1/'.$image_name1.'.webp';

        if($image_extension1=='PNG' || $image_extension1=='png'){
            BlogsectionController::png_to_webp($blogsection->blogsection_image1,$new_image_name1);
            $blogsection->blogsection_image1 = $new_image_name1;
            
        }elseif($image_extension1=='JPG' || $image_extension1=='jpg' || $image_extension1=='JPEG' || $image_extension1=='jpeg'){
            BlogsectionController::jpg_to_webp($blogsection->blogsection_image1,$new_image_name1);
            $blogsection->blogsection_image1 = $new_image_name1;
            
        }else{
            return response([
                'error'=>"Please select jpg or png image"
            ]);
        }
        
        //delete pic from another folder
            if(file_exists(base_path() .'/storage/app/homesection_others/'.$req->file('image1')->hashName())) {
                @unlink(base_path() .'/storage/app/homesection_others/'.$req->file('image1')->hashName());
            }
        
        }else{
            return response([
                'error'=>"Please select image1"
            ]);
        }

        if($req->file('image2')!=''){
        $blogsection->blogsection_image2 = $req->file('image2')->store('homesection_others');
        $blogsection->blogsection_image2 = $req->file('image2')->hashName();
        $image_name2 = pathinfo($blogsection->blogsection_image2, PATHINFO_FILENAME);
        $image_extension2 = pathinfo($blogsection->blogsection_image2, PATHINFO_EXTENSION);

        $new_image_name2 = 'homesection1/'.$image_name2.'.webp';

        if($image_extension2=='PNG' || $image_extension2=='png'){
            BlogsectionController::png_to_webp($blogsection->blogsection_image2,$new_image_name2);
            $blogsection->blogsection_image2 = $new_image_name2;
            
        }elseif($image_extension2=='JPG' || $image_extension2=='jpg' || $image_extension2=='JPEG' || $image_extension2=='jpeg'){
            BlogsectionController::jpg_to_webp($blogsection->blogsection_image2,$new_image_name2);
            $blogsection->blogsection_image2 = $new_image_name2;
            
        }else{
            return response([
                'error'=>"Please select jpg or png image"
            ]);
        }
        
        //delete pic from another folder
            if(file_exists(base_path() .'/storage/app/homesection_others/'.$req->file('image2')->hashName())) {
                @unlink(base_path() .'/storage/app/homesection_others/'.$req->file('image2')->hashName());
            }
        
        }


        if($req->file('image3')!=''){
        $blogsection->blogsection_image3 = $req->file('image3')->store('homesection_others');
        $blogsection->blogsection_image3 = $req->file('image3')->hashName();
        $image_name3 = pathinfo($blogsection->blogsection_image3, PATHINFO_FILENAME);
        $image_extension3 = pathinfo($blogsection->blogsection_image3, PATHINFO_EXTENSION);

        $new_image_name3 = 'homesection1/'.$image_name3.'.webp';

        if($image_extension3=='PNG' || $image_extension3=='png'){
            BlogsectionController::png_to_webp($blogsection->blogsection_image3,$new_image_name3);
            $blogsection->blogsection_image3 = $new_image_name3;
            
        }elseif($image_extension3=='JPG' || $image_extension3=='jpg' || $image_extension3=='JPEG' || $image_extension3=='jpeg'){
            BlogsectionController::jpg_to_webp($blogsection->blogsection_image3,$new_image_name3);
            $blogsection->blogsection_image3 = $new_image_name3;
            
        }else{
            return response([
                'error'=>"Please select jpg or png image"
            ]);
        }
        
        //delete pic from another folder
            if(file_exists(base_path() .'/storage/app/homesection_others/'.$req->file('image3')->hashName())) {
                @unlink(base_path() .'/storage/app/homesection_others/'.$req->file('image3')->hashName());
            }
        
        }


        $blogsection->blogsection_status = 0;
        $blogsection->blogsection_day = date("d M");
        $blogsection->blogsection_year = date("Y");


        if($req->input('title')!='' && $req->input('description1')!='' && $req->input('tag')!='' && $req->input('category')!='' && $req->input('time')!='' &&  $req->file('image1')!=''){
            $blogsection->save();
            return response([
                'success'=>"Added Successfully"
            ]);
        }else{
            return response([
                'error'=>"Please fill up all the fields"
            ]);
        }
        
    }


    function blogsectionGet(){

        $result = Blogsection::where('blogsection_status',0)->orderBy('blogsection_id','desc')->get(); 
        if($result==true){
            return response()->json($result);
        }else{
            return response()->json(["error"=>"Data not found"]);
        }
    }


    function blogsectionUpdate($id, Request $req){

        $blogsection = Blogsection::where('blogsection_id',$id)->first();
        $blogsection->blogsection_title = $req->input('title_up');
        $blogsection->blogsection_description1 = $req->input('description1_up');
        $blogsection->blogsection_description2 = $req->input('description2_up');
        $blogsection->blogsection_tag = $req->input('tag_up');
        $blogsection->blogsection_category = $req->input('category_up');
        $blogsection->blogsection_time = $req->input('time_up');
        

        if($blogsection->blogsection_title!='' && $blogsection->blogsection_description1!='' && $blogsection->blogsection_tag!='' && $blogsection->blogsection_category!='' && $blogsection->blogsection_time!=''){
            $blogsection->save();
            return response([
                'success'=>"Updated Successfully"
            ]);
        }else{
            return response([
                'error'=>"Don't leave any field empty"
            ]);
        }
    }




    //update image1
    function blogsectionUpdateImage1($name, Request $req){

        $blogsection = blogsection::where('blogsection_image1',$name)->first();

        if($req->file('image1_up')!=''){

            //delete existing image uploaded before updating from homesection1
        if(file_exists(base_path() .'/storage/app/'.$blogsection->blogsection_image1)) {
                @unlink(base_path() .'/storage/app/'.$blogsection->blogsection_image1);
            }
        
        $blogsection->blogsection_image1 = $req->file('image1_up')->store('homesection_others');
        $blogsection->blogsection_image1 = $req->file('image1_up')->hashName();
        $image_name1 = pathinfo($blogsection->blogsection_image1, PATHINFO_FILENAME);
        $image_extension1 = pathinfo($blogsection->blogsection_image1, PATHINFO_EXTENSION);

        $new_image_name1 = 'homesection1/'.$image_name1.'.webp';

        if($image_extension1=='PNG' || $image_extension1=='png'){
            BlogsectionController::png_to_webp($blogsection->blogsection_image1,$new_image_name1);
            $blogsection->blogsection_image1 = $new_image_name1;
            
        }elseif($image_extension1=='JPG' || $image_extension1=='jpg' || $image_extension1=='JPEG' || $image_extension1=='jpeg'){
            BlogsectionController::jpg_to_webp($blogsection->blogsection_image1,$new_image_name1);
            $blogsection->blogsection_image1 = $new_image_name1;
            
        }else{
            return response([
                'error'=>"Please select jpg or png image"
            ]);
        }
        
        //delete pic from another folder
            if(file_exists(base_path() .'/storage/app/homesection_others/'.$req->file('image1_up')->hashName())) {
                @unlink(base_path() .'/storage/app/homesection_others/'.$req->file('image1_up')->hashName());
            }

            $blogsection->save();
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
    function blogsectionUpdateImage2($name, Request $req){

        $blogsection = Blogsection::where('blogsection_image2',$name)->first();

        if($req->file('image2_up')!=''){

            //delete existing image uploaded before updating from homesection1
        if(file_exists(base_path() .'/storage/app/'.$blogsection->blogsection_image2)) {
                @unlink(base_path() .'/storage/app/'.$blogsection->blogsection_image2);
            }
        
        $blogsection->blogsection_image2 = $req->file('image2_up')->store('homesection_others');
        $blogsection->blogsection_image2 = $req->file('image2_up')->hashName();
        $image_name2 = pathinfo($blogsection->blogsection_image2, PATHINFO_FILENAME);
        $image_extension2 = pathinfo($blogsection->blogsection_image2, PATHINFO_EXTENSION);

        $new_image_name2 = 'homesection1/'.$image_name2.'.webp';

        if($image_extension2=='PNG' || $image_extension2=='png'){
            BlogsectionController::png_to_webp($blogsection->blogsection_image2,$new_image_name2);
            $blogsection->blogsection_image2 = $new_image_name2;
            
        }elseif($image_extension2=='JPG' || $image_extension2=='jpg' || $image_extension2=='JPEG' || $image_extension2=='jpeg'){
            BlogsectionController::jpg_to_webp($blogsection->blogsection_image2,$new_image_name2);
            $blogsection->blogsection_image2 = $new_image_name2;
            
        }else{
            return response([
                'error'=>"Please select jpg or png image"
            ]);
        }
        
        //delete pic from another folder
            if(file_exists(base_path() .'/storage/app/homesection_others/'.$req->file('image2_up')->hashName())) {
                @unlink(base_path() .'/storage/app/homesection_others/'.$req->file('image2_up')->hashName());
            }

            $blogsection->save();
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
    function blogsectionUpdateImage3($name, Request $req){

        $blogsection = Blogsection::where('blogsection_image3',$name)->first();

        if($req->file('image3_up')!=''){

            //delete existing image uploaded before updating from homesection1
        if(file_exists(base_path() .'/storage/app/'.$blogsection->blogsection_image3)) {
                @unlink(base_path() .'/storage/app/'.$blogsection->blogsection_image3);
            }
        
        $blogsection->blogsection_image3 = $req->file('image3_up')->store('homesection_others');
        $blogsection->blogsection_image3 = $req->file('image3_up')->hashName();
        $image_name3 = pathinfo($blogsection->blogsection_image3, PATHINFO_FILENAME);
        $image_extension3 = pathinfo($blogsection->blogsection_image3, PATHINFO_EXTENSION);

        $new_image_name3 = 'homesection1/'.$image_name3.'.webp';

        if($image_extension3=='PNG' || $image_extension3=='png'){
            BlogsectionController::png_to_webp($blogsection->blogsection_image3,$new_image_name3);
            $blogsection->blogsection_image3 = $new_image_name3;
            
        }elseif($image_extension3=='JPG' || $image_extension3=='jpg' || $image_extension3=='JPEG' || $image_extension3=='jpeg'){
            BlogsectionController::jpg_to_webp($blogsection->blogsection_image3,$new_image_name3);
            $blogsection->blogsection_image3 = $new_image_name3;
            
        }else{
            return response([
                'error'=>"Please select jpg or png image"
            ]);
        }
        
        //delete pic from another folder
            if(file_exists(base_path() .'/storage/app/homesection_others/'.$req->file('image3_up')->hashName())) {
                @unlink(base_path() .'/storage/app/homesection_others/'.$req->file('image3_up')->hashName());
            }

            $blogsection->save();
            return response([
                'success'=>"Image3 Updated Successfully"
            ]);

        }else{
            return response([
                'error'=>"Please select an image"
            ]);
        }
    }


    function blogsectionDelete($id, Request $req){

        $blogsection = Blogsection::find($id);
        $blogsection->blogsection_status = 1;
        
        
            $blogsection->save();

            return response([
                'success'=>"Deleted Successfully"
            ]);
        
    }
}

