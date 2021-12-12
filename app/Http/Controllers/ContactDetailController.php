<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactDetail;

class ContactDetailController extends Controller
{



    // function homesection4Add(Request $req){
        
    //     $homesection4 = new Homesection4;
    //     $homesection4->homesection4_title = $req->input('title');
    //     $homesection4->homesection4_description = $req->input('description');
    //     $homesection4->homesection4_category = $req->input('category');

    //     $homesection4->homesection4_status = 7;
    //     $homesection4->homesection4_date = date("Y-m-d");


    //     if($req->input('title')!='' && $req->input('description')!='' && $req->input('category')!=''){
    //         $homesection4->save();
    //         return response([
    //             'success'=>"Request sent. Wait for approval."
    //         ]);
    //     }else{
    //         return response([
    //             'error'=>"Please fill up all the fields"
    //         ]);
    //     }
        
    // }


    function contactDetailGet(){

        $result = ContactDetail::where('contact_detail_status',0)->orderBy('contact_detail_id','desc')->first(); 
        if($result==true){
            return response()->json($result);
        }else{
            return response()->json(["error"=>"Data not found"]);
        }
    }

    // function homesection4GetSuper(){

    //     $result = Homesection4::where('homesection4_status',7)->orderBy('homesection4_id','desc')->first(); 
    //     if($result==true){
    //         return response()->json($result);
    //     }else{
    //         return response()->json(["error"=>"Data not found"]);
    //     }
    // }


    function contactDetailUpdate($id, Request $req){

        $contact = ContactDetail::where('contact_detail_id',$id)->first();
        $contact->contact_detail_address = $req->input('address_up');
        $contact->contact_detail_phone = $req->input('phone_up');
        $contact->contact_detail_web_address = $req->input('web_address_up');

        if($contact->contact_detail_address!='' && $contact->contact_detail_phone!='' && $contact->contact_detail_web_address!=''){
            $contact->save();
            return response([
                'success'=>"Updated Successfully"
            ]);
        }else{
            return response([
                'error'=>"Please fill up all the fields"
            ]);
        }
    }



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
