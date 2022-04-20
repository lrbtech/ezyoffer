<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\post_ad;
use App\Models\post_ad_image;
use App\Models\post_ad_features;
use App\Models\category;
use App\Models\city;
use App\Models\used_package;
use App\Models\package;
use App\Models\chat;
use App\Models\language;
use App\Models\settings;
use Auth;
use DB;
use Mail;
use Image;
use App\Http\Controllers\ImageFilter;
use Yajra\DataTables\Facades\DataTables;

class PostController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
        date_default_timezone_set("Asia/Dubai");
        date_default_timezone_get();
        session(['lang'=>'english']);
    }

    public function newpostads(){
    	$category = category::where('parent_id',0)->where('status',0)->get();
    	$subcategory = category::where('parent_id','!=',0)->where('status',0)->get();
        $city = city::where('parent_id',0)->where('status',0)->get();
        $area = city::where('parent_id','!=',0)->where('status',0)->get();
        $language = language::all();
        return view('customers.postAds',compact('category','subcategory','city','area','language'));
    }

    public function myads(){
    	$category = category::where('parent_id',0)->where('status',0)->get();
    	$subcategory = category::where('parent_id','!=',0)->where('status',0)->get();
    	$post_ads = post_ad::where('customer_id',Auth::user()->id)->where('admin_status',0)->orderBy('id','DESC')->paginate(4);
        $language = language::all();
        return view('customers.myAds',compact('category','subcategory','post_ads','language'));
    }

    public function editpostads($id){
    	$category = category::where('parent_id',0)->where('status',0)->get();
    	$subcategory = category::where('parent_id','!=',0)->where('status',0)->get();
    	$post_ad = post_ad::find($id);
    	$post_ad_image = post_ad_image::where('post_id',$id)->get();
        $post_ad_features = post_ad_features::where('post_id',$id)->get();
        $city = city::where('parent_id',0)->where('status',0)->get();
        $area = city::where('parent_id','!=',0)->where('status',0)->get();
        $language = language::all();
        return view('customers.edit_post_ad',compact('category','subcategory','post_ad','post_ad_image','city','area','post_ad_features','language'));
    }

    public function deletepostads($id){
        $post_ad = post_ad::find($id);
        // $old_image = "upload_image/".$post_ad->image;
        // if (file_exists($old_image)) {
        //     @unlink($old_image);
        // }
        $post_ad->status = 1;
        $post_ad->save();

        // $post_ad_image = post_ad_image::where('post_id',$id)->get();
        // foreach($post_ad_image as $row){
        //     $post_ad_image1 = post_ad_image::find($row->id);
        //     $old_image = "upload_image/".$post_ad_image1->image;
        //     if (file_exists($old_image)) {
        //         @unlink($old_image);
        //     }
        //     $post_ad_image1->delete();
        // }

        $chat = chat::where('post_id',$id)->delete();

        return response()->json(['message'=>'Successfully Delete'],200); 
    }

    public function deletepostimge($id){
        $post_ad_image = post_ad_image::find($id);
        $old_image = "upload_image/".$post_ad_image->image;
        if (file_exists($old_image)) {
            @unlink($old_image);
        }
        $post_ad_image->delete();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }

    public function savepostads(Request $request){
        $this->validate($request, [
            'title' => 'required|unique:post_ads,title,NULL,id,customer_id,'.$request->customer_id,
            'category'=>'required',
            'post_type'=>'required',
            'price'=>'required',
            // 'mobile'=>'required|digits:9',
            // 'email'=>'required',
            //'address'=>'required',
            'description'=>'required',
            'city'=>'required',
            'area'=>'required',
          	'profile_image' => 'required|mimes:jpeg,jpg,png|max:10000', // max 1000kb
          	//'images.*' => 'mimes:jpeg,jpg,png|max:10000' // max 1000kb
          ],[
            'post_type.required' => 'Ad Type Field is Required',
            //'images.*.mimes' => 'Only jpeg, png and jpg images are allowed',
            //'images.*.max' => 'Sorry! Maximum allowed size for an image is 10MB',
            'profile_image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'profile_image.required' => '1st Image Field is Must Required',
            'profile_image.max' => 'Sorry! Maximum allowed size for an image is 10MB',
        ]);

        $settings = settings::first();

        // if($request->profile_image!=""){
        //     $filter = new ImageFilter;
        //     $score = $filter->GetScore($request->file('profile_image'));      
        //     if (isset($score)) {
        //         if ($score >= 40) {
        //             return response()->json(['message' => 'Image scored '.$score.'%, It seems that you have uploaded a nude picture :-(','status'=>1], 200); 
        //         } 
        //     }
        // }

        // if(isset($_FILES['images'])){
        //     $name_array = $_FILES['images']['name'];
        //     $tmp_name_array = $_FILES['images']['tmp_name'];
        //     $type_array = $_FILES['images']['type'];
        //     $size_array = $_FILES['images']['size'];
        //     $error_array = $_FILES['images']['error'];
        //     for ($x=0; $x<count($name_array); $x++) 
        //     {
        //         $filter = new ImageFilter;
        //         $score = $filter->GetScore($tmp_name_array[$x]);      
        //         if (isset($score)) {
        //             if ($score >= 40) {
        //                 return response()->json(['message' => 'Image scored '.$score.'%, It seems that you have uploaded a nude picture :-(','status'=>1], 200);
        //             } 
        //         }
        //     }
        // }

        if(isset($_FILES['images'])){
            $name_array = $_FILES['images']['name'];
            $tmp_name_array = $_FILES['images']['tmp_name'];
            $type_array = $_FILES['images']['type'];
            $size_array = $_FILES['images']['size'];
            $error_array = $_FILES['images']['error'];
            for ($x=0; $x<count($name_array); $x++) 
            {
                if($size_array[$x] > 10000000){
                    $message = 'Sorry! Maximum allowed size for an image is 10MB Change '.($x+2).' Image';
                    return response()->json(['message' => $message,'status'=>2], 200);
                }
            }
        }


        // $used_package = used_package::find(Auth::user()->package_id);
        // if(Auth::user()->package_status == 1){
        //     if($request->post_type == 1){
        //         $no_of_feautured_ads = $used_package->no_of_feautured_ads;
        //         $today = date('Y-m-d');
        //         $cfdate = date('Y-m-d',strtotime('first day of this month'));
        //         $cldate = date('Y-m-d',strtotime('last day of this month'));
        //         $feautured_ads = post_ad::where('package_id',$used_package->id)->where('customer_id',Auth::user()->id)->where('post_type',1)->count();
                
        //         if($feautured_ads >= $no_of_feautured_ads){
        //             return response()->json(['message' => 'Featured Ad Limit is Exceed','status'=>1], 200);
        //         }
        //     }
        // }

        // if($request->post_type == 2){
        //     if(Auth::user()->package_status == 1){
        //         $no_of_live_story = $used_package->no_of_live_story;
        //         $today = date('Y-m-d');
        //         $cfdate = date('Y-m-d',strtotime('first day of this month'));
        //         $cldate = date('Y-m-d',strtotime('last day of this month'));
        //         $live_ads = post_ad::where('package_id',$used_package->id)->where('customer_id',Auth::user()->id)->where('post_type',2)->count();
                
        //         if($live_ads >= $no_of_live_story){
        //             return response()->json(['message' => 'Live Story Limit is Exceed','status'=>1], 200);
        //         }
        //     }else{
        //         return response()->json(['message' => 'Your Package is Expired','status'=>1], 200);
        //     }
        // }

        $post_ad = new post_ad;
        $post_ad->date = date('Y-m-d');
        $post_ad->customer_id = Auth::user()->id;
        $post_ad->post_type = $request->post_type;
        $post_ad->category = $request->category;
        //$post_ad->subcategory = $request->subcategory;
        $post_ad->title = $request->title;
        $post_ad->price = $request->price;
        // $post_ad->mobile = $request->mobile;
        // $post_ad->email = $request->email;
        //$post_ad->skype = $request->skype;
        $post_ad->description = $request->description;
        $post_ad->city = $request->city;
        $post_ad->area = $request->area;
        //$post_ad->address = $request->address;
        //$post_ad->latitude = $request->latitude;
        //$post_ad->longitude = $request->longitude;
        //$post_ad->receive_offer = $request->receive_offer;
        $post_ad->item_conditions = $request->item_conditions;
        if(!empty($used_package)){
            $post_ad->package_id = $used_package->id;
        }
        else{
            $post_ad->package_id = 0;
        }

        if($request->post_type == '2'){
            $current_time = date('Y-m-d h:i A');
            $post_ad->live_ads_start_date = $current_time;
            $post_ad->live_ads_end_date = date("Y-m-d h:i A", strtotime('+24 hours'));
            $post_ad->live_ads = 1;
        }

        if($request->profile_image!=""){
            $image = $request->file('profile_image');
            $input['imagename'] = rand().time().'.'.$image->getClientOriginalExtension();
        
            $destinationPath = public_path('/upload_image');
            $img = Image::make($image->getRealPath());
            $img->resize(1200, 600, function ($constraint) {
                $constraint->aspectRatio();
            })->insert('upload_files/logo_watermark.png','bottom-right', 50, 30)->save($destinationPath.'/'.$input['imagename']);
    
            $post_ad->image = $input['imagename'];
        }

        $post_ad->save();

        if(isset($_FILES['images'])){
            $name_array = $_FILES['images']['name'];
            $tmp_name_array = $_FILES['images']['tmp_name'];
            $type_array = $_FILES['images']['type'];
            $size_array = $_FILES['images']['size'];
            $error_array = $_FILES['images']['error'];
            for ($x=0; $x<count($name_array); $x++) 
            {
                if($name_array[$x] != ""){
                    $post_ad_image = new post_ad_image;

                    $image = $name_array[$x];
                    $image_info = explode(".", $name_array[$x]); 
                    $image_type = end($image_info);
                    $input['imagename'] = rand().time().'.'.$image_type;
                    $destinationPath = public_path('/upload_image');
                    $img = Image::make($tmp_name_array[$x]);
                    $img->resize(1200, 600, function ($constraint) {
                        $constraint->aspectRatio();
                    })->insert('upload_files/logo_watermark.png','bottom-right', 50, 30)->save($destinationPath.'/'.$input['imagename']);

                    $post_ad_image->post_id = $post_ad->id;
                    $post_ad_image->image = $input['imagename'];
                    $post_ad_image->save();
                }
    	    }
        }

        for ($x=0; $x<count($_POST['features']); $x++) 
    	{
    		$post_ad_features = new post_ad_features;
            $post_ad_features->post_id = $post_ad->id;
	        $post_ad_features->features = $_POST['features'][$x];

	        if($_POST['features'][$x]!=""){
	        	$post_ad_features->save();
	    	}
    	}

        $from_name = Auth::user()->first_name .' '.Auth::user()->last_name;
        $from_email = Auth::user()->email;
        Mail::send('mail.admin_post',compact('post_ad'),function($message) use($settings,$from_name,$from_email){
            $message->to($settings->admin_receive_email)->subject('EZY Offer - New Post Ad');
            $message->from($from_email,$from_name);
        });

        return response()->json(['message'=>'Your ad is Posted Successfully','status'=>0], 200); 
    }


    public function updatepostads(Request $request){
        $this->validate($request, [
            'title' => 'required|unique:post_ads,title,'.$request->id.',id,customer_id,'.$request->customer_id,
            'category'=>'required',
            //'post_type'=>'required',
            'price'=>'required',
            // 'mobile'=>'required|digits:9',
            // 'email'=>'required',
            //'address'=>'required',
            'description'=>'required',
            'city'=>'required',
            'area'=>'required',
          ],[
            //'post_type.required' => 'Ad Type Field is Required',
        ]);

        $settings = settings::first();

        $post_ad = post_ad::find($request->id);
        $post_ad->post_type = $request->post_type;
        $post_ad->category = $request->category;
        //$post_ad->subcategory = $request->subcategory;
        $post_ad->title = $request->title;
        $post_ad->price = $request->price;
        // $post_ad->mobile = $request->mobile;
        // $post_ad->email = $request->email;
        //$post_ad->skype = $request->skype;
        $post_ad->description = $request->description;
        $post_ad->city = $request->city;
        $post_ad->area = $request->area;
        //$post_ad->address = $request->address;
        //$post_ad->latitude = $request->latitude;
        //$post_ad->longitude = $request->longitude;
        //$post_ad->receive_offer = $request->receive_offer;
        $post_ad->item_conditions = $request->item_conditions;
        $post_ad->save();


        $old_post_ad_features = post_ad_features::where('post_id',$post_ad->id)->delete();
        for ($x=0; $x<count($_POST['features']); $x++) 
    	{
    		$post_ad_features = new post_ad_features;
            $post_ad_features->post_id = $post_ad->id;
	        $post_ad_features->features = $_POST['features'][$x];

	        if($_POST['features'][$x]!=""){
	        	$post_ad_features->save();
	    	}
    	}

        $from_name = Auth::user()->first_name .' '.Auth::user()->last_name;
        $from_email = Auth::user()->email;
        Mail::send('mail.admin_post',compact('post_ad'),function($message) use($settings,$from_name,$from_email){
            $message->to($settings->admin_receive_email)->subject('EZY Offer - Edit Post Ad');
            $message->from($from_email,$from_name);
        });

        return response()->json(['message' => 'Your ad is Updated Successfully','status'=>0], 200);
    }

    public function updatepostadsimage(Request $request){
        $this->validate($request, [
          	'profile_image' => 'max:10000', // max 1000kb
          	//'images.*' => 'mimes:jpeg,jpg,png|max:10000' // max 1000kb
          ],[
            //'images.*.mimes' => 'Only jpeg, png and jpg images are allowed',
            //'images.*.max' => 'Sorry! Maximum allowed size for an image is 10MB',
            'profile_image.max' => 'Sorry! Maximum allowed size for an image is 10MB',
        ]);

        $settings = settings::first();
        // if($request->profile_image!=""){
        //     $filter = new ImageFilter;
        //     $score = $filter->GetScore($request->file('profile_image'));      
        //     if (isset($score)) {
        //         if ($score >= 40) {
        //             return response()->json(['message' => 'Image scored '.$score.'%, It seems that you have uploaded a nude picture :-(','status'=>1], 200); 
        //         } 
        //     }
        // }

        // if(isset($_FILES['images'])){
        //     $name_array = $_FILES['images']['name'];
        //     $tmp_name_array = $_FILES['images']['tmp_name'];
        //     $type_array = $_FILES['images']['type'];
        //     $size_array = $_FILES['images']['size'];
        //     $error_array = $_FILES['images']['error'];
        //     for ($x=0; $x<count($name_array); $x++) 
        //     {
        //         $filter = new ImageFilter;
        //         $score = $filter->GetScore($tmp_name_array[$x]);      
        //         if (isset($score)) {
        //             if ($score >= 40) {
        //                 return response()->json(['message' => 'Image scored '.$score.'%, It seems that you have uploaded a nude picture :-(','status'=>1], 200);
        //             } 
        //         }
        //     }
        // }

        if(isset($_FILES['images'])){
            $name_array = $_FILES['images']['name'];
            $tmp_name_array = $_FILES['images']['tmp_name'];
            $type_array = $_FILES['images']['type'];
            $size_array = $_FILES['images']['size'];
            $error_array = $_FILES['images']['error'];
            for ($x=0; $x<count($name_array); $x++) 
            {
                if($size_array[$x] > 10000000){
                    $message = 'Sorry! Maximum allowed size for an image is 10MB Change '.($x+2).' Image';
                    return response()->json(['message' => $message,'status'=>2], 200);
                }
            }
        }

        $post_ad = post_ad::find($request->id);
        if($request->profile_image!=""){
            $old_image = "upload_image/".$post_ad->image;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            $image = $request->file('profile_image');
            $input['imagename'] = rand().time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/upload_image');
            $img = Image::make($image->getRealPath());
            $img->resize(1200, 600, function ($constraint) {
                $constraint->aspectRatio();
            })->insert('upload_files/logo_watermark.png','bottom-right', 50, 30)->save($destinationPath.'/'.$input['imagename']);
            $post_ad->image = $input['imagename'];
        }
        $post_ad->save();

        if(isset($_FILES['images'])){
            $name_array = $_FILES['images']['name'];
            $tmp_name_array = $_FILES['images']['tmp_name'];
            $type_array = $_FILES['images']['type'];
            $size_array = $_FILES['images']['size'];
            $error_array = $_FILES['images']['error'];
        for ($x=0; $x<count($name_array); $x++) 
    	{
	        if($_POST['image_id'][$x]!=""){
                $post_ad_image = post_ad_image::find($_POST['image_id'][$x]);
                if($name_array[$x] != ""){
                    $old_image = "upload_image/".$post_ad_image->image;
                    if (file_exists($old_image)) {
                        @unlink($old_image);
                    }
                    $image = $name_array[$x];
                    $image_info = explode(".", $name_array[$x]); 
                    $image_type = end($image_info);
                    $input['imagename'] = rand().time().'.'.$image_type;
                    $destinationPath = public_path('/upload_image');
                    $img = Image::make($tmp_name_array[$x]);
                    $img->resize(1200, 600, function ($constraint) {
                        $constraint->aspectRatio();
                    })->insert('upload_files/logo_watermark.png','bottom-right', 50, 30)->save($destinationPath.'/'.$input['imagename']);
                    $post_ad_image->image = $input['imagename'];
                }
	        	$post_ad_image->save();
	    	}
            else{
                if($name_array[$x] != ""){
                    $post_ad_image = new post_ad_image;
                    
                    $image = $name_array[$x];
                    $image_info = explode(".", $name_array[$x]); 
                    $image_type = end($image_info);
                    $input['imagename'] = rand().time().'.'.$image_type;
                    $destinationPath = public_path('/upload_image');
                    $img = Image::make($tmp_name_array[$x]);
                    $img->resize(1200, 600, function ($constraint) {
                        $constraint->aspectRatio();
                    })->insert('upload_files/logo_watermark.png','bottom-right', 50, 30)->save($destinationPath.'/'.$input['imagename']);

                    $post_ad_image->post_id = $post_ad->id;
                    $post_ad_image->image = $input['imagename'];
                    $post_ad_image->save();
                }
            }
    	}
        }

        return response()->json(['message' => 'Successfully Update','status'=>0], 200);
    }


}
