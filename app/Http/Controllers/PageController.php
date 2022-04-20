<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post_ad;
use App\Models\post_ad_image;
use App\Models\category;
use App\Models\User;
use App\Models\city;
use App\Models\settings;
use App\Models\favourite_post;
use App\Models\package;
use App\Models\chat;
use App\Models\used_package;
use App\Models\language;
use App\Models\blog;
use App\Models\chat_option;
use App\Models\post_count;
use App\Models\user_count;
use App\Models\news_letter_email;
use App\Models\report_post;
use App\Models\report_category;
use App\Models\reviews;
use App\Models\google_ads;
use Hash;
use Mail;
use Auth;

class PageController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set("Asia/Dubai");
        date_default_timezone_get();
        session(['lang'=>'english']);
    }

    public function userlogin($id){
        Auth::loginUsingId($id);

        // $category = category::where('parent_id',0)->where('status',0)->get();
        // $subcategory = category::where('parent_id','!=',0)->where('status',0)->get();
        // $post_ads = post_ad::where('customer_id',$id)->where('admin_status',0)->orderBy('id','DESC')->paginate(4);

        // $total_ads = post_ad::where('customer_id',$id)->count();
        // $live_ads = post_ad::where('customer_id',$id)->where('post_type',2)->count();
        // $featured_ads = post_ad::where('customer_id',$id)->where('post_type',1)->count();

        // $language = language::all();

        // return view('customers.dashboard',compact('category','subcategory','post_ads','total_ads','live_ads','featured_ads','language'));

        $category = category::where('parent_id',0)->where('status',0)->get();
        $subcategory = category::where('parent_id','!=',0)->where('status',0)->get();
        $post_ads = post_ad::where('customer_id',$id)->where('admin_status',0)->orderBy('id','DESC')->paginate(2);

        $total_ads = post_ad::where('customer_id',$id)->count();
        $live_ads = post_ad::where('customer_id',$id)->where('status',0)->count();
        $delete_ads = post_ad::where('customer_id',$id)->where('status',1)->count();
        $language = language::all();
        return view('customers.dashboard',compact('category','subcategory','post_ads','total_ads','live_ads','delete_ads','language'));
    }

    public function admineditpost($post_id){
        $post_ads = post_ad::find($post_id);

        Auth::loginUsingId($post_ads->customer_id);

        $url = '/customer/edit-post-ads/'.$post_id;
        return redirect('/customer/edit-post-ads/'.$post_id);
    }

    public function signup(){
        $settings = settings::find(1);
        $language = language::all();
        return view('website.signup',compact('settings','language'));
    }

    public function about(){
        $settings = settings::find(1);
        $language = language::all();
        return view('website.about',compact('settings','language'));
    }
    public function howitworks(){
        $settings = settings::find(1);
        $language = language::all();
        return view('website.howitworks',compact('settings','language'));
    }
    public function ourstory(){
        $settings = settings::find(1);
        $language = language::all();
        return view('website.ourstory',compact('settings','language'));
    }
    public function careers(){
        $settings = settings::find(1);
        $language = language::all();
        return view('website.careers',compact('settings','language'));
    }
    public function autodealerships(){
        $settings = settings::find(1);
        $language = language::all();
        return view('website.autodealerships',compact('settings','language'));
    }
    public function trustsaftey(){
        $settings = settings::find(1);
        $language = language::all();
        return view('website.trustsaftey',compact('settings','language'));
    }
    public function terms(){
        $settings = settings::find(1);
        $language = language::all();
        return view('website.terms',compact('settings','language'));
    }
    public function community(){
        $settings = settings::find(1);
        $language = language::all();
        return view('website.community',compact('settings','language'));
    }
    public function press(){
        $settings = settings::find(1);
        $language = language::all();
        return view('website.press',compact('settings','language'));
    }
    public function help(){
        $settings = settings::find(1);
        $language = language::all();
        return view('website.help',compact('settings','language'));
    }
    public function privacy(){
        $settings = settings::find(1);
        $language = language::all();
        return view('website.privacy',compact('settings','language'));
    }


    public function getsubcategory($id){ 
        $data = category::where('parent_id',$id)->get();
        $output ='option value="" disabled="" selected="" hidden="">Select Sub Category(s)*</option>';
        foreach ($data as $key => $value) {
            $output .= '<option value="'.$value->id.'">'.$value->category.'</option>';
        }
        echo $output;
    }

    public function getArea($id){ 
        //$city = city::where('city',$id)->first();
        $data = city::where('parent_id',$id)->orderBy('city','ASC')->get();
        $output ='<option value="">SELECT Area</option>';
        foreach ($data as $key => $value) {
            $output .= '<option value="'.$value->id.'">'.$value->city.'</option>';
        }
        echo $output;
    }

    public function getCityName($city,$area){ 
        $city = city::find($city);
        $area = city::find($area);
        $data = array(
            'city' => $city->city,
            'area' => $area->city,
        );
        return response()->json($data); 
    }

    public function getCityData($id){ 
        $data = city::find($id);
        return response()->json($data); 
    }

    public function saveuserregister(Request $request){
        $this->validate($request, [
            'first_name'=>'required',
            'last_name'=>'required',
            //'country_code'=>'required',
            'email'=>'required|unique:users',
            'mobile'=>'required|unique:users',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6',
          ],[
            //'image.required' => 'Item Image Field is Required',
        ]);
        
        $user = new User;
        $user->date = date('Y-m-d');
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->country_code = $request->country_code;
        $user->mobile = $request->mobile;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $all = User::find($user->id);

        Mail::send('mail.verify_mail',compact('all'),function($message) use($all){
            $message->to($all->email)->subject('EZY Offer - Confirm your email');
            $message->from('mail.lrbinfotech@gmail.com','EZY Offer');
        });
  
        return response()->json('successfully save'); 
    }

    public function verifyAccount($id){
        $user = User::find($id);
        $user->status = 1;
        $user->save();
        $language = language::all();
        return view('auth.verify_login',compact('user','language'));
    }

    public function sendMail($id){
        $all = User::find($id);
        Mail::send('mail.verify_mail',compact('all'),function($message) use($all){
            $message->to($all->email)->subject('EZY Offer - Confirm your email');
            $message->from('mail.lrbinfotech@gmail.com','EZY Offer');
        });
    }

    public function blog(){
        $settings = settings::find(1);
        $blog=blog::paginate(12);
        $language = language::all();
        $category_all = category::where('parent_id',0)->where('status',0)->get();
        $sub_category_all = category::where('parent_id','!=',0)->where('status',0)->get();
        $city = city::where('parent_id',0)->where('status',0)->get(); 
        return view('website.blog',compact('settings','blog','language','category_all','sub_category_all','city'));
    }

    public function viewblog($id){
        $settings = settings::find(1);
        $blog=blog::find($id);
        $language = language::all();
        $category_all = category::where('parent_id',0)->where('status',0)->get();
        $sub_category_all = category::where('parent_id','!=',0)->where('status',0)->get();
        $city = city::where('parent_id',0)->where('status',0)->get(); 
        return view('website.view_blog',compact('settings','blog','language','category_all','sub_category_all','city'));
    }

    public function savenewslettermail(Request $request){  
        $this->validate($request, [
            'news_letter_email'=>'required|unique:news_letter_emails,email',
          ],[
            'news_letter_email.required' => 'For Subscribe to Ezyoffer Email ID is required',
            'news_letter_email.unique' => 'Email ID already exist',
        ]);

        $exist = news_letter_email::where('email',$request->news_letter_email)->get();
        if(count($exist)>0){
            return response()->json('successfully save'); 
        }      
        $news_letter_email = new news_letter_email;
        $news_letter_email->email = $request->news_letter_email;
        $news_letter_email->save();
  
        return response()->json('successfully save'); 
    }

    public function savereport(Request $request){
        $this->validate($request, [
            'report_category'=>'required',
            'report_reason'=>'required',
          ],[
            //'image.required' => 'Item Image Field is Required',
        ]);
        if($request->report_id != ''){
            $report_post = report_post::find($request->report_id);
            $report_post->category = $request->report_category;
            $report_post->description = $request->report_reason;
            $report_post->save();

            $post_ad = post_ad::find($report_post->post_id);
        }
        else{
            $report_post = new report_post;
            $report_post->date = date('Y-m-d');
            $report_post->post_id = $request->report_post_id;
            $report_post->user_id = Auth::user()->id;
            $report_post->category = $request->report_category;
            $report_post->description = $request->report_reason;
            $report_post->save();

            $post_ad = post_ad::find($request->report_post_id);
        }

        $settings = settings::first();
        $from_name = Auth::user()->first_name .' '.Auth::user()->last_name;
        $from_email = Auth::user()->email;
        $report_category = report_category::all();
        $customer = User::find($post_ad->customer_id);

        Mail::send('mail.admin_report_post',compact('post_ad','report_post','report_category'),function($message) use($settings,$from_name,$from_email){
            $message->to($settings->admin_receive_email)->subject('EZY Offer - Report Post Ad');
            $message->from($from_email,$from_name);
        });

        Mail::send('mail.customer_report_post',compact('post_ad','report_post','report_category'),function($message) use($settings,$from_name,$from_email,$customer){
            $message->to($customer->email)->subject('EZY Offer - Report Your Post Ad');
            $message->from($from_email,$from_name);
        });
  
        return response()->json('successfully save'); 
    }

    public function updatereport(Request $request){
        $this->validate($request, [
            'report_category'=>'required',
            'description'=>'required',
          ],[
            //'image.required' => 'Item Image Field is Required',
        ]);
        
        
  
        return response()->json('successfully save'); 
    }

    public function savereview(Request $request){
        $this->validate($request, [
            'email'=>'required',
            'name'=>'required',
            'quote' => 'required',
            'message' => 'required',
            'rating' => 'required',
          ],[
            //'image.required' => 'Item Image Field is Required',
        ]);
        $post_ad = post_ad::find($request->review_post_id);
        $reviews = new reviews;
        $reviews->date = date('Y-m-d');
        $reviews->sender_id = Auth::user()->id;
        $reviews->to_id = $post_ad->customer_id;
        $reviews->post_id = $request->review_post_id;
        $reviews->name = $request->name;
        $reviews->email = $request->email;
        $reviews->quote = $request->quote;
        $reviews->rating = $request->rating;
        $reviews->message = $request->message;
        $reviews->save();
  
        return response()->json('Successfully Save'); 
    }

    public function updatereview(Request $request){
        $this->validate($request, [
            'email'=>'required',
            'name'=>'required',
            'quote' => 'required',
            'message' => 'required',
            'rating' => 'required',
          ],[
            //'image.required' => 'Item Image Field is Required',
        ]);
        $reviews = reviews::find($request->review_id);
        $reviews->name = $request->name;
        $reviews->email = $request->email;
        $reviews->quote = $request->quote;
        $reviews->rating = $request->rating;
        $reviews->message = $request->message;
        $reviews->save();
  
        return response()->json('Successfully Save'); 
    }


}
