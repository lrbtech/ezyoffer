<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post_ad;
use App\Models\settings;
use App\Models\post_ad_image;
use App\Models\post_ad_features;
use App\Models\category;
use App\Models\report_category;
use App\Models\chat;
use App\Models\trending_today;
use App\Models\User;
use App\Models\city;
use App\Models\favourite_post;
use App\Models\post_count;
use App\Models\user_count;
use App\Models\post_feedback;
use App\Models\report_post;
use App\Models\chat_option;
use App\Models\stores;
use App\Models\reviews;
use App\Models\language;
use Auth;
use DB;
use Mail;
use Carbon\Carbon;
use Session;

class HomeController extends Controller
{
    // public function __construct()
    // {
    //     date_default_timezone_set("Asia/Dubai");
    //     date_default_timezone_get();
    //     session(['lang'=>'english']);
    // }

    public function updatelanguage($lang){
        Session::put('lang', $lang);
        return response()->json(['message' => 'Successfully update'], 200);
    }

    public function home(){
        $category_all = category::where('parent_id',0)->where('status',0)->get();
        $city = city::where('parent_id',0)->where('status',0)->get();

        $trending_today =DB::table('post_ads as p')
        ->where('p.post_type',1)
        ->where('p.admin_status',0)
        ->where('p.status',0)
        ->latest()
        ->take(12)
        ->get();

        $live_story =DB::table('post_ads as p')
        ->join('users as u', 'p.customer_id', '=', 'u.id')
        ->select('p.*','u.first_name','u.last_name','u.profile_image')
        ->where('p.post_type',2)
        ->where('p.admin_status',0)
        ->where('p.status',0)
        ->where('p.live_ads',1)
        ->latest()
        ->take(11)
        ->get();

        $live_story_count =DB::table('post_ads as p')
        ->where('p.post_type',2)
        ->where('p.admin_status',0)
        ->where('p.status',0)
        ->where('p.live_ads',1)
        ->count();

        $all_user =DB::table('stores as s')
        ->join('users as u', 's.user_id', '=', 'u.id')
        ->select('u.*')
        ->where('u.status',1)
        ->orderBy('s.order_id','asc')
        ->take(9)
        ->get();

        $settings = settings::first();

        $language = language::all();

        return view('website.home',compact('category_all','city','trending_today','live_story','live_story_count','settings','all_user','language'));
    }

    public function viewstores(){
        $category_all = category::where('parent_id',0)->where('status',0)->get();
        $city = city::where('parent_id',0)->where('status',0)->get();
        
        $all_user =DB::table('stores as s')
        ->join('users as u', 's.user_id', '=', 'u.id')
        ->select('u.*')
        ->where('u.status',1)
        ->orderBy('s.order_id','asc')
        ->paginate(21);
        $settings = settings::first();
        $language = language::all();
        return view('website.stores',compact('category_all','city','settings','all_user','language'));
    }

    public static function homestaus($id) {        
        $category = category::find($id);

        $output='<div class="item">
            <a class="cards_new" href="javascript:void(0);" onclick="StatusView('.$id.')">
            <div class="image-wraps">
            <div class="card__background_new" style="background-image: url(/upload_files/'.$category->image.')"></div>
            </div>
            <div class="card__content_new">
                <h3 class="card__heading_new">'.$category->category.'</h3>
            </div>
            </a>    
        </div>';
        echo $output;
    }


    public function getClientIP():string
    {
        $keys=array('HTTP_CLIENT_IP','HTTP_X_FORWARDED_FOR','HTTP_X_FORWARDED','HTTP_FORWARDED_FOR','HTTP_FORWARDED','REMOTE_ADDR');
        foreach($keys as $k)
        {
            if (!empty($_SERVER[$k]) && filter_var($_SERVER[$k], FILTER_VALIDATE_IP))
            {
                return $_SERVER[$k];
            }
        }
        return "UNKNOWN";
    }

    public static function homenoofpost($id) {
        $post_count = post_ad::where('customer_id',$id)->where('admin_status',0)->where('status',0)->count();
        return $post_count;
    }

    public static function humanreadtime($time) {
        $dateTime = new Carbon($time, new \DateTimeZone('Asia/Dubai'));
        return $dateTime->diffForHumans();
    }

    public static function viewcityname($area,$city) {
        $area_name = city::find($area);
        $city_name = city::find($city);
        return $area_name->city . " , " . $city_name->city;
    }
    public static function viewcity($city) {
        $city_name = city::find($city);
        return $city_name->city;
    }
    public static function viewarea($area) {
        $area_name = city::find($area);
        return $area_name->city;
    }

    public static function categorypostcount($id) {
        $post_count = post_ad::where('category',$id)->where('admin_status',0)->where('status',1)->count();
        return $post_count;
    }
  
    public static function citypostcount($id) {
        $post_count = post_ad::where('city',$id)->where('admin_status',0)->where('status',1)->count();
        return $post_count;
    }
  
    public static function subcategorypostcount($id) {
        $post_count = post_ad::where('subcategory',$id)->where('admin_status',0)->where('status',1)->count();
        return $post_count;
    }
   
    public static function viewcategoryname($category) {
      $category = category::find($category);
      return $category->category;
    }
  
    public static function postaveragerating($post_id){
        $reviews_sum = reviews::where('post_id',$post_id)->sum('rating');
        $reviews_count = reviews::where('post_id',$post_id)->count();
        $reviews_average = 0;
        if(!empty($reviews_sum)){
        $reviews_average = $reviews_sum/$reviews_count;
        }
        return $reviews_average.'/'.$reviews_count;  
    }

    public function searchpost($title,$category,$city,$area,$sort){
        $category1 = category::find($category);
        if(!empty($category1)){
            $search=$category1->category;
        }
        else{
            $search='All Categories';
        }
        $category_all = category::where('parent_id',0)->where('status',0)->get();
        $sub_category_all = category::where('parent_id','!=',0)->where('status',0)->get();

        $i =DB::table('post_ads as p');
        if ( $category != '0' )
        {
            $i->where('p.category', $category);
        }
        if ( $title != '0' )
        {
            $i->where('p.title', 'like', '%' . $title . '%');
        }
        if ( $city != '0' )
        {
            $i->where('p.city', $city);
        }
        $i->join('users as u','u.id','=','p.customer_id');
        $i->select('p.*');
        $i->where('p.admin_status',0);
        $i->where('p.status',0);
        if ( $sort == '0' ){
            $i->orderBy('p.id','DESC');
        }
        elseif ( $sort == '1' ){
            $i->orderBy('p.price','ASC');
        }
        elseif ( $sort == '2' ){
            $i->orderBy('p.price','DESC');
        }
        $post_ads = $i->paginate(3);

        $city_all = city::where('parent_id',0)->where('status',0)->get();
        $area_all = city::where('parent_id','!=',0)->where('status',0)->get();

        $city1=0;
        $area1=0;
        $city1 = city::find($city);
        $area1 = city::find($area);
        if(!empty($city1)){
            $city1=$city1->id;
            $area1=0;
        }
        if(!empty($area1)){
            $city1=$area1->parent_id;
            $area1=$area1->id;
        }

        $title1=$title;
        $category1=$category;
        $sort1=$sort;

        $language = language::all();

        return view('website.search_post',compact('search','post_ads','category_all','sub_category_all','city_all','area_all','title1','city1','area1','category1','sort1','language'));
    }


    public function viewuser($id){
        $user = User::find($id);
        $search=$user->first_name .' '. $user->last_name;

        $category_all = category::where('parent_id',0)->where('status',0)->get();
        $sub_category_all = category::where('parent_id','!=',0)->where('status',0)->get();

        $city = city::where('parent_id',0)->where('status',0)->get();        
        $i =DB::table('post_ads');
        $i->where('customer_id',$id);
        $i->where('admin_status',0);
        $i->where('status',0);
        $post_ads = $i->paginate(4);

        $get_ip = $this->getClientIP();  

        $today = date('Y-m-d');
        $get_count = user_count::where('date',$today)->where('visitor_ip',$get_ip)->where('user_id',$id)->count();

        if($get_count == 0){
            $user_count = new user_count;
            $user_count->date = date('Y-m-d');
            $user_count->user_id = $user->id;
            $user_count->visitor_ip = $get_ip;
            $user_count->save();

            $user->view_count = $user->view_count + 1;
            $user->save();
        }

        $language = language::all();

        return view('website.view_user',compact('search','post_ads','category_all','sub_category_all','city','user','language'));
    }


    public function viewpost($id){
        $category_all = category::where('parent_id',0)->where('status',0)->get();
        $chat_option = chat_option::where('status',0)->get();
        $sub_category_all = category::where('parent_id','!=',0)->where('status',0)->get();
        $city = city::where('parent_id',0)->where('status',0)->get();        
        
        $post_ad = post_ad::find($id);
        $post_image = post_ad_image::where('post_id',$post_ad->id)->get();
        $post_ad_features = post_ad_features::where('post_id',$id)->get();
        
        $related_ad = post_ad::where('id','!=',$post_ad->id)->where('category',$post_ad->category)->where('admin_status',0)->where('status',0)->get();

        $get_ip = $this->getClientIP();  

        $today = date('Y-m-d');
        $get_count = post_count::where('date',$today)->where('visitor_ip',$get_ip)->where('post_id',$id)->count();

        if($get_count == 0){
            $post_count = new post_count;
            $post_count->date = date('Y-m-d');
            $post_count->post_id = $post_ad->id;
            $post_count->user_id = $post_ad->customer_id;
            $post_count->category = $post_ad->category;
            $post_count->subcategory = $post_ad->subcategory;
            $post_count->visitor_ip = $get_ip;
            $post_count->save();

            $post_ad->view_count = $post_ad->view_count + 1;
            $post_ad->save();
        }

        $user = User::find($post_ad->customer_id);

        $favourite=array();
        $report_post=array();
        $reviews=array();
        if(Auth::check()){
            $favourite = favourite_post::where('user_id',Auth::user()->id)->where('post_id',$id)->first();
            $report_post = report_post::where('user_id',Auth::user()->id)->where('post_id',$id)->where('status',0)->get();
            $reviews = reviews::where('sender_id',Auth::user()->id)->where('post_id',$id)->where('status',0)->first();
        }

        $report_category = report_category::where('status',0)->get();
        $reviews_count = reviews::where('post_id',$id)->count();

        $language = language::all();
        
        return view('website.view_post',compact('user','post_ad','category_all','sub_category_all','related_ad','post_image','city','favourite','post_ad_features','chat_option','report_post','reviews','reviews_count','language'));
    }


    public static function viewfavourite($id) {
        $favourite=array();
        if(Auth::check()){
            $favourite = favourite_post::where('user_id',Auth::user()->id)->where('post_id',$id)->first();
        }

        if(empty($favourite)){
            echo '<li><a onclick="SaveFavourite('.$id.')" href="javascript:void(0)"><i class="icon-22"></i></a></li>';
        }
        else{
            echo '<li><a style="color:red;" onclick="DeleteFavourite('.$favourite->id.')" href="javascript:void(0)"><i class="icon-22"></i></a></li>';
        }
    }


}
