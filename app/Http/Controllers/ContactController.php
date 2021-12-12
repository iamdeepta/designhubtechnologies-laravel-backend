<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    //add data
    function sendMessage(Request $req){

        date_default_timezone_set("Asia/Dhaka");

        $contact = new Contact;
        $contact->contact_name = $req->input('name');
        $contact->contact_email = $req->input('email');
        $contact->contact_message = $req->input('message');
      


        $contact->contact_status = 0;
        $contact->contact_date = date("Y-m-d");
        


        if($req->input('name')!='' && $req->input('email')!='' && $req->input('message')!=''){
            $contact->save();
            return response([
                'success'=>"Message sent"
            ]);
        }else{
            return response([
                'error'=>"Please fill up all the fields"
            ]);
        }
        
    }


    function contactGet(){

        $result = Contact::where('contact_status',0)->orderBy('contact_id','desc')->get(); 
        if($result==true){
            return response()->json($result);
        }else{
            return response()->json(["error"=>"Data not found"]);
        }
    }
}
