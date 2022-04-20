<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\post_ad;
use App\Models\post_ad_image;
use App\Models\category;
use App\Models\User;
use App\Models\city;
use App\Models\used_package;
use App\Models\language;
use Auth;
use DB;
use Mail;
use App\Models\settings;
use Image;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        date_default_timezone_set("Asia/Dubai");
        date_default_timezone_get();
        session(['lang'=>'english']);
    }

    public function profilesettings(){
    	$user = User::find(Auth::user()->id);
        $city = city::where('parent_id',0)->where('status',0)->get();
        $area = city::where('parent_id','!=',0)->where('status',0)->get();
        $used_package = used_package::find(Auth::user()->package_id);
        $language = language::all();
        return view('customers.profileSetting',compact('user','city','used_package','area','language'));
    }

    public function updateprofilesettings(Request $request){
        $this->validate($request, [
            //'username'=>'required',
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|unique:users,email,'.$request->id,
            'mobile'=>'required|unique:users,mobile,'.$request->id,
            //'city'=>'required',
            'profile_image' => 'mimes:jpeg,jpg,png|max:1000', // max 1000kb
            //'banner_image' => 'mimes:jpeg,jpg,png|max:1000', // max 1000kb
          ],[
            // 'banner_image.mimes' => 'Only jpeg, png and jpg images are allowed',
            // 'banner_image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            'profile_image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'profile_image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
        ]);

        $settings = settings::first();

        $user = User::find($request->id);
        //$user->username = $request->username;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->user_type = $request->user_type;
        $user->mobile = $request->mobile;
        $user->country_code = $request->country_code;
        $user->email = $request->email;
        $user->city = $request->city;
        $user->area = $request->area;
        $user->address = $request->address;
        $user->description = $request->description;
        if($request->profile_image!=""){
            $old_image = "upload_profile_image/".$user->profile_image;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            
            $image = $request->file('profile_image');
            $input['imagename'] = rand().time().'.'.$image->getClientOriginalExtension();
        
            $destinationPath = public_path('/upload_profile_image');
            $img = Image::make($image->getRealPath());
            $img->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->insert('upload_files/logo_watermark.png','bottom-right', 50, 30)->save($destinationPath.'/'.$input['imagename']);
    
            $user->profile_image = $input['imagename'];
        }

        // if($request->banner_image!=""){
        //     $old_image = "upload_profile_image/".$user->banner_image;
        //     if (file_exists($old_image)) {
        //         @unlink($old_image);
        //     }
            
        //     $image = $request->file('banner_image');
        //     $input['imagename'] = rand().time().'.'.$image->getClientOriginalExtension();
        
        //     $destinationPath = public_path('/upload_profile_image');
        //     $img = Image::make($image->getRealPath());
        //     $img->resize(500, 500, function ($constraint) {
        //         $constraint->aspectRatio();
        //     })->insert('upload_files/logo_watermark.png','bottom-right', 50, 30)->save($destinationPath.'/'.$input['imagename']);
    
        //     $user->banner_image = $input['imagename'];
        // }
        $user->save();

        return response()->json('successfully save'); 
    }



}
