<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post_ad;
use App\Models\post_ad_image;
use App\Models\category;
use App\Models\User;
use App\Models\favourite_post;
use App\Models\language;
use Auth;
use DB;
use Mail;
use Hash;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        date_default_timezone_set("Asia/Dubai");
        date_default_timezone_get();
    }

    public function viewloginpost($id){
        return redirect('/view-post/'.$id);
    }

    public static function viewfavourite($id) {
        $favourite=array();
        if(Auth::check()){
            $favourite = favourite_post::where('user_id',Auth::user()->id)->where('post_id',$id)->first();
        }

        if(empty($favourite)){
            return '<a onclick="SaveFavourite('.$id.')" href="javascript:void(0)"><i class="icon-22"></i></a>';
        }
        else{
            return '<a style="color:red;" onclick="DeleteFavourite('.$id.')" href="javascript:void(0)"><i class="icon-22"></i></a>';
        }
    }

    public static function viewfavourite1($id) {
        $favourite=array();
        if(Auth::check()){
            $favourite = favourite_post::where('user_id',Auth::user()->id)->where('post_id',$id)->first();
        }

        if(empty($favourite)){
            echo '<a onclick="SaveFavourite('.$id.')" href="javascript:void(0)"><i class="icon-22"></i></a>';
        }
        else{
            echo '<a style="color:red;" onclick="DeleteFavourite('.$id.')" href="javascript:void(0)"><i class="icon-22"></i></a>';
        }
    }

    public function getfavourite($id) {
        $favourite=array();
        if(Auth::check()){
            $favourite = favourite_post::where('user_id',Auth::user()->id)->where('post_id',$id)->first();
        }

        if(empty($favourite)){
            echo '<a onclick="SaveFavourite('.$id.')" href="javascript:void(0)"><i class="icon-22"></i></a>';
        }
        else{
            echo '<a style="color:red;" onclick="DeleteFavourite('.$id.')" href="javascript:void(0)"><i class="icon-22"></i></a>';
        }
    }

}
