<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Homesection1;

class Homesection1Controller extends Controller
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


    function homesection1Add(Request $req){
        
        $homesection1 = new Homesection1;
        $homesection1->homesection1_title = $req->input('title');
        $homesection1->homesection1_description = $req->input('description');
        if($req->input('category')!=''){
        $homesection1->homesection1_category = $req->input('category');
        }
        if($req->file('image1')!=''){
        //$homesection1->homesection1_image1 = $req->file('image1')->store('homesection1');
        $homesection1->homesection1_image1 = $req->file('image1')->store('homesection_others');
        $homesection1->homesection1_image1 = $req->file('image1')->hashName();
        $image_name1 = pathinfo($homesection1->homesection1_image1, PATHINFO_FILENAME);
        $image_extension1 = pathinfo($homesection1->homesection1_image1, PATHINFO_EXTENSION);

        $new_image_name1 = 'homesection1/'.$image_name1.'.webp';

        if($image_extension1=='PNG' || $image_extension1=='png'){
            Homesection1Controller::png_to_webp($homesection1->homesection1_image1,$new_image_name1);
            $homesection1->homesection1_image1 = $new_image_name1;
            
        }elseif($image_extension1=='JPG' || $image_extension1=='jpg' || $image_extension1=='JPEG' || $image_extension1=='jpeg'){
            Homesection1Controller::jpg_to_webp($homesection1->homesection1_image1,$new_image_name1);
            $homesection1->homesection1_image1 = $new_image_name1;
            
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
        //$homesection1->homesection1_image2 = $req->file('image2')->store('homesection1');
        $homesection1->homesection1_image2 = $req->file('image2')->store('homesection_others');
        $homesection1->homesection1_image2 = $req->file('image2')->hashName();
        $image_name2 = pathinfo($homesection1->homesection1_image2, PATHINFO_FILENAME);
        $image_extension2 = pathinfo($homesection1->homesection1_image2, PATHINFO_EXTENSION);

        $new_image_name2 = 'homesection1/'.$image_name2.'.webp';

        if($image_extension2=='PNG' || $image_extension2=='png'){
            Homesection1Controller::png_to_webp($homesection1->homesection1_image2,$new_image_name2);
            $homesection1->homesection1_image2 = $new_image_name2;
            
        }elseif($image_extension2=='JPG' || $image_extension2=='jpg' || $image_extension2=='JPEG' || $image_extension2=='jpeg'){
            Homesection1Controller::jpg_to_webp($homesection1->homesection1_image2,$new_image_name2);
            $homesection1->homesection1_image2 = $new_image_name2;
            
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
        //$homesection1->homesection1_image3 = $req->file('image3')->store('homesection1');
        $homesection1->homesection1_image3 = $req->file('image3')->store('homesection_others');
        $homesection1->homesection1_image3 = $req->file('image3')->hashName();
        $image_name3 = pathinfo($homesection1->homesection1_image3, PATHINFO_FILENAME);
        $image_extension3 = pathinfo($homesection1->homesection1_image3, PATHINFO_EXTENSION);

        $new_image_name3 = 'homesection1/'.$image_name3.'.webp';

        if($image_extension3=='PNG' || $image_extension3=='png'){
            Homesection1Controller::png_to_webp($homesection1->homesection1_image3,$new_image_name3);
            $homesection1->homesection1_image3 = $new_image_name3;
            
        }elseif($image_extension3=='JPG' || $image_extension3=='jpg' || $image_extension3=='JPEG' || $image_extension3=='jpeg'){
            Homesection1Controller::jpg_to_webp($homesection1->homesection1_image3,$new_image_name3);
            $homesection1->homesection1_image3 = $new_image_name3;
            
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

        if($req->file('image4')!=''){
        //$homesection1->homesection1_image4 = $req->file('image4')->store('homesection1');
        $homesection1->homesection1_image4 = $req->file('image4')->store('homesection_others');
        $homesection1->homesection1_image4 = $req->file('image4')->hashName();
        $image_name4 = pathinfo($homesection1->homesection1_image4, PATHINFO_FILENAME);
        $image_extension4 = pathinfo($homesection1->homesection1_image4, PATHINFO_EXTENSION);

        $new_image_name4 = 'homesection1/'.$image_name4.'.webp';

        if($image_extension4=='PNG' || $image_extension4=='png'){
            Homesection1Controller::png_to_webp($homesection1->homesection1_image4,$new_image_name4);
            $homesection1->homesection1_image4 = $new_image_name4;
            
        }elseif($image_extension4=='JPG' || $image_extension4=='jpg' || $image_extension4=='JPEG' || $image_extension4=='jpeg'){
            Homesection1Controller::jpg_to_webp($homesection1->homesection1_image4,$new_image_name4);
            $homesection1->homesection1_image4 = $new_image_name4;
            
        }else{
            return response([
                'error'=>"Please select jpg or png image"
            ]);
        }
        
        //delete pic from another folder
            if(file_exists(base_path() .'/storage/app/homesection_others/'.$req->file('image4')->hashName())) {
                @unlink(base_path() .'/storage/app/homesection_others/'.$req->file('image4')->hashName());
            }
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


    //update image1
    function homesection1UpdateImage1($name, Request $req){

        $homesection1 = Homesection1::where('homesection1_image1',$name)->first();

        if($req->file('image1_up')!=''){

            //delete existing image uploaded before updating from homesection1
        if(file_exists(base_path() .'/storage/app/'.$homesection1->homesection1_image1)) {
                @unlink(base_path() .'/storage/app/'.$homesection1->homesection1_image1);
            }
        
        $homesection1->homesection1_image1 = $req->file('image1_up')->store('homesection_others');
        $homesection1->homesection1_image1 = $req->file('image1_up')->hashName();
        $image_name1 = pathinfo($homesection1->homesection1_image1, PATHINFO_FILENAME);
        $image_extension1 = pathinfo($homesection1->homesection1_image1, PATHINFO_EXTENSION);

        $new_image_name1 = 'homesection1/'.$image_name1.'.webp';

        if($image_extension1=='PNG' || $image_extension1=='png'){
            Homesection1Controller::png_to_webp($homesection1->homesection1_image1,$new_image_name1);
            $homesection1->homesection1_image1 = $new_image_name1;
            
        }elseif($image_extension1=='JPG' || $image_extension1=='jpg' || $image_extension1=='JPEG' || $image_extension1=='jpeg'){
            Homesection1Controller::jpg_to_webp($homesection1->homesection1_image1,$new_image_name1);
            $homesection1->homesection1_image1 = $new_image_name1;
            
        }else{
            return response([
                'error'=>"Please select jpg or png image"
            ]);
        }
        
        //delete pic from another folder
            if(file_exists(base_path() .'/storage/app/homesection_others/'.$req->file('image1_up')->hashName())) {
                @unlink(base_path() .'/storage/app/homesection_others/'.$req->file('image1_up')->hashName());
            }

            $homesection1->save();
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
    function homesection1UpdateImage2($name, Request $req){

        $homesection1 = Homesection1::where('homesection1_image2',$name)->first();

        if($req->file('image2_up')!=''){

            //delete existing image uploaded before updating from homesection1
        if(file_exists(base_path() .'/storage/app/'.$homesection1->homesection1_image2)) {
                @unlink(base_path() .'/storage/app/'.$homesection1->homesection1_image2);
            }
        
        $homesection1->homesection1_image2 = $req->file('image2_up')->store('homesection_others');
        $homesection1->homesection1_image2 = $req->file('image2_up')->hashName();
        $image_name2 = pathinfo($homesection1->homesection1_image2, PATHINFO_FILENAME);
        $image_extension2 = pathinfo($homesection1->homesection1_image2, PATHINFO_EXTENSION);

        $new_image_name2 = 'homesection1/'.$image_name2.'.webp';

        if($image_extension2=='PNG' || $image_extension2=='png'){
            Homesection1Controller::png_to_webp($homesection1->homesection1_image2,$new_image_name2);
            $homesection1->homesection1_image2 = $new_image_name2;
            
        }elseif($image_extension2=='JPG' || $image_extension2=='jpg' || $image_extension2=='JPEG' || $image_extension2=='jpeg'){
            Homesection1Controller::jpg_to_webp($homesection1->homesection1_image2,$new_image_name2);
            $homesection1->homesection1_image2 = $new_image_name2;
            
        }else{
            return response([
                'error'=>"Please select jpg or png image"
            ]);
        }
        
        //delete pic from another folder
            if(file_exists(base_path() .'/storage/app/homesection_others/'.$req->file('image2_up')->hashName())) {
                @unlink(base_path() .'/storage/app/homesection_others/'.$req->file('image2_up')->hashName());
            }

            $homesection1->save();
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
    function homesection1UpdateImage3($name, Request $req){

        $homesection1 = Homesection1::where('homesection1_image3',$name)->first();

        if($req->file('image3_up')!=''){

            //delete existing image uploaded before updating from homesection1
        if(file_exists(base_path() .'/storage/app/'.$homesection1->homesection1_image3)) {
                @unlink(base_path() .'/storage/app/'.$homesection1->homesection1_image3);
            }
        
        $homesection1->homesection1_image3 = $req->file('image3_up')->store('homesection_others');
        $homesection1->homesection1_image3 = $req->file('image3_up')->hashName();
        $image_name3 = pathinfo($homesection1->homesection1_image3, PATHINFO_FILENAME);
        $image_extension3 = pathinfo($homesection1->homesection1_image3, PATHINFO_EXTENSION);

        $new_image_name3 = 'homesection1/'.$image_name3.'.webp';

        if($image_extension3=='PNG' || $image_extension3=='png'){
            Homesection1Controller::png_to_webp($homesection1->homesection1_image3,$new_image_name3);
            $homesection1->homesection1_image3 = $new_image_name3;
            
        }elseif($image_extension3=='JPG' || $image_extension3=='jpg' || $image_extension3=='JPEG' || $image_extension3=='jpeg'){
            Homesection1Controller::jpg_to_webp($homesection1->homesection1_image3,$new_image_name3);
            $homesection1->homesection1_image3 = $new_image_name3;
            
        }else{
            return response([
                'error'=>"Please select jpg or png image"
            ]);
        }
        
        //delete pic from another folder
            if(file_exists(base_path() .'/storage/app/homesection_others/'.$req->file('image3_up')->hashName())) {
                @unlink(base_path() .'/storage/app/homesection_others/'.$req->file('image3_up')->hashName());
            }

            $homesection1->save();
            return response([
                'success'=>"Image3 Updated Successfully"
            ]);

        }else{
            return response([
                'error'=>"Please select an image"
            ]);
        }
    }


    //update image4
    function homesection1UpdateImage4($name, Request $req){

        $homesection1 = Homesection1::where('homesection1_image4',$name)->first();

        if($req->file('image4_up')!=''){

            //delete existing image uploaded before updating from homesection1
        if(file_exists(base_path() .'/storage/app/'.$homesection1->homesection1_image4)) {
                @unlink(base_path() .'/storage/app/'.$homesection1->homesection1_image4);
            }
        
        $homesection1->homesection1_image4 = $req->file('image4_up')->store('homesection_others');
        $homesection1->homesection1_image4 = $req->file('image4_up')->hashName();
        $image_name4 = pathinfo($homesection1->homesection1_image4, PATHINFO_FILENAME);
        $image_extension4 = pathinfo($homesection1->homesection1_image4, PATHINFO_EXTENSION);

        $new_image_name4 = 'homesection1/'.$image_name4.'.webp';

        if($image_extension4=='PNG' || $image_extension4=='png'){
            Homesection1Controller::png_to_webp($homesection1->homesection1_image4,$new_image_name4);
            $homesection1->homesection1_image4 = $new_image_name4;
            
        }elseif($image_extension4=='JPG' || $image_extension4=='jpg' || $image_extension4=='JPEG' || $image_extension4=='jpeg'){
            Homesection1Controller::jpg_to_webp($homesection1->homesection1_image4,$new_image_name4);
            $homesection1->homesection1_image4 = $new_image_name4;
            
        }else{
            return response([
                'error'=>"Please select jpg or png image"
            ]);
        }
        
        //delete pic from another folder
            if(file_exists(base_path() .'/storage/app/homesection_others/'.$req->file('image4_up')->hashName())) {
                @unlink(base_path() .'/storage/app/homesection_others/'.$req->file('image4_up')->hashName());
            }

            $homesection1->save();
            return response([
                'success'=>"Image4 Updated Successfully"
            ]);

        }else{
            return response([
                'error'=>"Please select an image"
            ]);
        }
    }


    //delete
    function homesection1Delete($id, Request $req){

        $homesection1 = Homesection1::find($id);
        $homesection1->homesection1_status = 1;
        
        
            $homesection1->save();

            return response([
                'success'=>"Deleted Successfully"
            ]);
        
    }
}
