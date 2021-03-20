<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\post_ad;
use App\Models\post_ad_image;
use App\Models\category;
use Auth;
use DB;
use Mail;

class PostController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
        date_default_timezone_set("Asia/Dubai");
        date_default_timezone_get();
    }

    public function newpostads(){
    	$category = category::where('parent_id',0)->where('status',0)->get();
    	$subcategory = category::where('parent_id','!=',0)->where('status',0)->get();
        return view('customers.postAds',compact('category','subcategory'));
    }

    public function myads(){
    	$category = category::where('parent_id',0)->where('status',0)->get();
    	$subcategory = category::where('parent_id','!=',0)->where('status',0)->get();
    	$post_ads = post_ad::where('customer_id',Auth::user()->id)->where('admin_status',0)->orderBy('id','DESC')->get();
        return view('customers.myAds',compact('category','subcategory','post_ads'));
    }

    public function editpostads($id){
    	$category = category::where('parent_id',0)->where('status',0)->get();
    	$subcategory = category::where('parent_id','!=',0)->where('status',0)->get();
    	$post_ad = post_ad::find($id);
    	$post_ad_image = post_ad_image::where('post_id',$id)->get();
        return view('customers.edit_post_ad',compact('category','subcategory','post_ad','post_ad_image'));
    }

    public function deletepostads($id,$status){
        $post_ad = post_ad::find($id);
        $post_ad->status = $status;
        $post_ad->save();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }

    public function deletepostimge($id){
        $post_ad_image = post_ad_image::find($id);
        $post_ad_image->delete();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }

    public function savepostads(Request $request){
        $this->validate($request, [
            'category'=>'required',
            'subcategory'=>'required',
          	'profile_image' => 'required|mimes:jpeg,jpg,png|max:1000', // max 1000kb
          	'images.*' => 'mimes:jpeg,jpg,png|max:1000' // max 1000kb
          ],[
            'images.*.mimes' => 'Only jpeg, png and jpg images are allowed',
            'images.*.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            'profile_image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'profile_image.required' => 'Profile Image Feild is Required',
            'profile_image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
        ]);

        $post_ad = new post_ad;
        $post_ad->date = date('Y-m-d');
        $post_ad->customer_id = $request->customer_id;
        $post_ad->category = $request->category;
        $post_ad->subcategory = $request->subcategory;
        $post_ad->title = $request->title;
        $post_ad->price = $request->price;
        $post_ad->mobile = $request->mobile;
        $post_ad->email = $request->email;
        $post_ad->skype = $request->skype;
        $post_ad->description = $request->description;
        $post_ad->address = $request->address;
        $post_ad->latitude = $request->latitude;
        $post_ad->longitude = $request->longitude;
        $post_ad->printable = $request->printable;
        $post_ad->paper_quality = $request->paper_quality;
        $post_ad->paper_color = $request->paper_color;
        $post_ad->paper_other = $request->paper_other;
        $post_ad->soft_copy = $request->soft_copy;
        $post_ad->color_b_w = $request->color_b_w;
        $post_ad->spring_bind = $request->spring_bind;
        $post_ad->door_step_delivery = $request->door_step_delivery;
        $post_ad->laminated = $request->laminated;
        $post_ad->color = $request->color;
        $post_ad->other_color = $request->other_color;
        $post_ad->video_link = $request->video_link;
        if($request->featured_ad == 1){
        	$post_ad->status = 2;
        }

        if($request->profile_image!=""){
            if($request->file('profile_image')!=""){
            $image = $request->file('profile_image');
            $upload_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload_image/'), $upload_image);
            $post_ad->image = $upload_image;
            }
        }

        $post_ad->save();

        $fileName = null;
        if($request->hasfile('images'))
        {
            foreach($request->file('images') as $image)
            {
                $image->getClientOriginalName();
                $fileName = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('upload_image/'), $fileName);

                $post_ad_image = new post_ad_image;
                $post_ad_image->post_id = $post_ad->id;
                $post_ad_image->image = $fileName;
                $post_ad_image->save();
            }
        }

        return response()->json('successfully save'); 
    }


    public function updatepostads(Request $request){
        $this->validate($request, [
            'category'=>'required',
            'subcategory'=>'required',
          	'profile_image' => 'mimes:jpeg,jpg,png|max:1000', // max 1000kb
          	'images.*' => 'mimes:jpeg,jpg,png|max:1000' // max 1000kb
          ],[
            'images.*.mimes' => 'Only jpeg, png and jpg images are allowed',
            'images.*.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            'profile_image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'profile_image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
        ]);

        $post_ad = post_ad::find($request->id);
        $post_ad->customer_id = $request->customer_id;
        $post_ad->category = $request->category;
        $post_ad->subcategory = $request->subcategory;
        $post_ad->title = $request->title;
        $post_ad->price = $request->price;
        $post_ad->mobile = $request->mobile;
        $post_ad->email = $request->email;
        $post_ad->skype = $request->skype;
        $post_ad->description = $request->description;
        $post_ad->address = $request->address;
        $post_ad->latitude = $request->latitude;
        $post_ad->longitude = $request->longitude;
        $post_ad->printable = $request->printable;
        $post_ad->paper_quality = $request->paper_quality;
        $post_ad->paper_color = $request->paper_color;
        $post_ad->paper_other = $request->paper_other;
        $post_ad->soft_copy = $request->soft_copy;
        $post_ad->color_b_w = $request->color_b_w;
        $post_ad->spring_bind = $request->spring_bind;
        $post_ad->door_step_delivery = $request->door_step_delivery;
        $post_ad->laminated = $request->laminated;
        $post_ad->color = $request->color;
        $post_ad->other_color = $request->other_color;
        $post_ad->video_link = $request->video_link;
        if($request->featured_ad == 1){
        	$post_ad->status = 2;
        }

        if($request->profile_image!=""){
            $old_image = "upload_image/".$post_ad->image;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            if($request->file('profile_image')!=""){
            $image = $request->file('profile_image');
            $upload_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload_image/'), $upload_image);
            $post_ad->image = $upload_image;
            }
        }

        $post_ad->save();

        $fileName = null;
        if($request->hasfile('images'))
        {
            foreach($request->file('images') as $image)
            {
                $image->getClientOriginalName();
                $fileName = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('upload_image/'), $fileName);

                $post_ad_image = new post_ad_image;
                $post_ad_image->post_id = $post_ad->id;
                $post_ad_image->image = $fileName;
                $post_ad_image->save();
            }
        }

        return response()->json('successfully save'); 
    }


}
