<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;

use DB;

class AdminController extends Controller
{
    function login(Request $req){
        $admin_username = Admin::where('admin_username',$req->input('username'))
        ->where('admin_pass',$req->input('password'))
        ->first();
        //$admin_password = Admin::where('admin_username',$req->username)->first();
        if(!$admin_username){
            return response([
                'error'=>"Incorrect username or password"
            ]);
        }else{
            if($admin_username->admin_status=='sadmin'){
                return response([
                    'success_top'=>"topadmin"
                ]);
            }else{
                return response([
                'success'=>"Login Successful"
            ]);
            }
        
        }
        //return $admin_username;
    }
}
