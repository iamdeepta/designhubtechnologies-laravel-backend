<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Newsletter;
use Mail;
use DB;

class NewsletterController extends Controller
{
    function newsletterAdd(Request $req){

        date_default_timezone_set("Asia/Dhaka");
        
        $newsletter = new Newsletter;
        $newsletter->newsletter_email = $req->input('newsletter_email');
        

        $newsletter->newsletter_status = 0;
        $newsletter->newsletter_date = date("Y-m-d");

        $newsletter->save();

        // if($req->input('newsletter_email')!=''){
        //     $newsletter->save();
        //     return response([
        //         'success'=>"Thanks for your subscription."
        //     ]);
        // }else{
        //     return response([
        //         'error'=>"Please fill up all the fields"
        //     ]);
        // }


        $data = ['email'=>$req->input('newsletter_email')];
        $user['to'] = $req->input('newsletter_email');
        Mail::send('newsletter',$data,function($messages) use ($user){
            $messages->to($user['to']);
            $messages->subject('Designhub Technologies Subscription');
        });
        
    }


    function newsletterSend(Request $req){

        date_default_timezone_set("Asia/Dhaka");
        
        //$newsletter = new Newsletter;
        $newsletter = DB::select('select * from tbl_newsletter');
        // $newsletter->newsletter_email = $req->input('newsletter_email');
        

        // $newsletter->newsletter_status = 0;
        // $newsletter->newsletter_date = date("Y-m-d");

        // $newsletter->save();

        if($req->input('newsletter_message')!=''){
            
            foreach($newsletter as $newsletters){
        $data = ['newsletter_message'=>$req->input('newsletter_message')];
        $user['to'] = $newsletters->newsletter_email;
        Mail::send('newsletterMessage',$data,function($messages) use ($user){
            $messages->to($user['to']);
            $messages->subject('Newsletter From Designhub Technologies');
        });

    }

            return response([
                'success'=>"Message sent."
            ]);
        }else{
            return response([
                'error'=>"Please write some message"
            ]);
        }
        
        
    }


    function newsletterGetOne($name){

        $result = Newsletter::where('newsletter_email',$name)->where('newsletter_status',0)->orderBy('newsletter_id','desc')->get(); 
        if($result==true){
            return response()->json($result);
        }else{
            return response()->json(["error"=>"Data not found"]);
        }
    }


    function newsletterGet(){

        $result = Newsletter::where('newsletter_status',0)->orderBy('newsletter_id','desc')->get(); 
        if($result==true){
            return response()->json($result);
        }else{
            return response()->json(["error"=>"Data not found"]);
        }
    }


    function newsletterUserDelete($id, Request $req){

        $newsletter = Newsletter::find($id);
        $newsletter->newsletter_status = 1;
        
        
            $newsletter->save();

            return response([
                'success'=>"Deleted Successfully"
            ]);
        
    }

    // function homesection4GetSuper(){

    //     $result = Homesection4::where('homesection4_status',7)->orderBy('homesection4_id','desc')->first(); 
    //     if($result==true){
    //         return response()->json($result);
    //     }else{
    //         return response()->json(["error"=>"Data not found"]);
    //     }
    // }


    // function homesection4Update($id, Request $req){

    //     $homesection4 = Homesection4::where('homesection4_id',$id)->first();
    //     $homesection4->homesection4_title = $req->input('title_up');
    //     $homesection4->homesection4_description = $req->input('description_up');
    //     $homesection4->homesection4_category = $req->input('category_up');

    //     if($homesection4->homesection4_title!='' && $homesection4->homesection4_description!='' && $homesection4->homesection4_category!=''){
    //         $homesection4->save();
    //         return response([
    //             'success'=>"Updated Successfully"
    //         ]);
    //     }else{
    //         return response([
    //             'error'=>"Please fill up all the fields"
    //         ]);
    //     }
    // }



    // function homesection4Delete($id, Request $req){

    //     $homesection4 = Homesection4::find($id);
    //     $homesection4->homesection4_status = 1;
        
        
    //         $homesection4->save();

    //         return response([
    //             'success'=>"Deleted Successfully"
    //         ]);
        
    // }

    // function homesection4Approve($id, Request $req){

    //     $homesection4 = Homesection4::find($id);
    //     $homesection4->homesection4_status = 0;
        
        
    //         $homesection4->save();

    //         return response([
    //             'success'=>"Approved Successfully"
    //         ]);
        
    // }


    // function homesection4Decline($id, Request $req){

    //     $homesection4 = Homesection4::find($id);
    //     $homesection4->homesection4_status = 2;
        
        
    //         $homesection4->save();

    //         return response([
    //             'success'=>"Declined Successfully"
    //         ]);
        
    // }
}
