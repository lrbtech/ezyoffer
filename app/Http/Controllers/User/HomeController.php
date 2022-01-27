<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\post_ad;
use App\Models\post_ad_image;
use App\Models\category;
use App\Models\package;
use App\Models\used_package;
use App\Models\User;
use App\Models\favourite_post;
use App\Models\chat;
use App\Models\language;
use Auth;
use DB;
use Mail;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        date_default_timezone_set("Asia/Dubai");
        date_default_timezone_get();
    }

    public function changelanguage($language)
    {
        $user = User::find(Auth::user()->id);
        $user->lang = $language;
        $user->save();
        return response()->json(['message'=>'Successfully Update'],200); 
    }

    public function dashboard(){
      $category = category::where('parent_id',0)->where('status',0)->get();
      $subcategory = category::where('parent_id','!=',0)->where('status',0)->get();
      $post_ads = post_ad::where('customer_id',Auth::user()->id)->where('admin_status',0)->orderBy('id','DESC')->paginate(2);

      $total_ads = post_ad::where('customer_id',Auth::user()->id)->count();
      $live_ads = post_ad::where('customer_id',Auth::user()->id)->where('post_type',2)->count();
      $featured_ads = post_ad::where('customer_id',Auth::user()->id)->where('post_type',1)->count();
      $language = language::all();
      return view('customers.dashboard',compact('category','subcategory','post_ads','total_ads','live_ads','featured_ads','language'));
    }

    public function choosepackage(){
        $package = package::where('status',0)->get();
        $user = User::find(Auth::user()->id);
        $used_package = used_package::find($user->package_id);
        $language = language::all();
        return view('customers.choose_package',compact('package','used_package','language'));
    }

    public function packages(){
        $package = package::where('status',0)->where('id','!=',0)->get();
        $user = User::find(Auth::user()->id);
        $used_package = used_package::find($user->package_id);
        $language = language::all();
        return view('customers.packages',compact('package','used_package','language'));
    }

    public function applypackage($id){
        $package = package::find($id);

        $used_package = new used_package;
        $used_package->user_id = Auth::user()->id;
        $used_package->package_id = $package->id;
        $used_package->package_name = $package->package_name;
        $used_package->price = $package->price;
        $used_package->duration_period = $package->duration_period;
        $used_package->duration = $package->duration;
        $used_package->no_of_feautured_ads = $package->no_of_feautured_ads;
        $used_package->no_of_live_story = $package->no_of_live_story;
        $used_package->store_available = $package->store_available;

        $days=0;
        if($package->duration_period == 1){
            $days = $package->duration * 28;
        }
        elseif($row->duration_period == 2){
            $days = $package->duration;
        }
        $today = date('Y-m-d');
        $used_package->apply_date = $today;
        $used_package->expire_date = date('Y-m-d', strtotime($today . '+'.$days.'days'));
        $used_package->no_of_days = $days;

        $used_package->save();

        $user = User::find(Auth::user()->id);
        $user->package_id = $used_package->id;
        $user->package_status = 1;
        $user->save();

        return response()->json('successfully save'); 
    }

    public function getchatnotificationcount(){
      $chat_count =DB::table('chats as c')
        ->where('c.to_id',Auth::user()->id)
        //->where('c.chat_offer',0)
        ->where('c.read_status',0)
        ->select(DB::raw("c.sender_id as sender_id") , DB::raw("c.post_id as post_id"))
        ->groupBy('c.sender_id','c.post_id')
        ->count();
      // $offers_count =DB::table('chats as c')
      //   ->where('c.to_id',Auth::user()->id)
      //   ->where('c.chat_offer',1)
      //   ->where('c.read_status',0)
      //   ->select(DB::raw("c.sender_id as sender_id") , DB::raw("c.post_id as post_id") , DB::raw("c.chat_offer as chat_offer"))
      //   ->groupBy('c.sender_id','c.post_id','c.chat_offer')
      //   ->count();
        $notification_count = $chat_count ;
      return response()->json($chat_count); 
    }

    public function getnotification() {        
        $chat =DB::table('chats as c')
        ->where('c.to_id',Auth::user()->id)
        //->where('c.chat_offer',0)
        ->where('c.read_status',0)
        ->select(DB::raw("c.sender_id as sender_id") , DB::raw("c.post_id as post_id") , DB::raw("c.chat_offer as chat_offer"))
        ->groupBy('c.sender_id','c.post_id','c.chat_offer')
        ->get();

        $chat_count =DB::table('chats as c')
        ->where('c.to_id',Auth::user()->id)
        //->where('c.chat_offer',0)
        ->where('c.read_status',0)
        ->select(DB::raw("c.sender_id as sender_id") , DB::raw("c.post_id as post_id") , DB::raw("c.chat_offer as chat_offer"))
        ->groupBy('c.sender_id','c.post_id','c.chat_offer')
        ->count();

        $offers =DB::table('chats as c')
        ->where('c.to_id',Auth::user()->id)
        //->where('c.chat_offer',1)
        ->where('c.read_status',0)
        ->select(DB::raw("c.sender_id as sender_id") , DB::raw("c.post_id as post_id") , DB::raw("c.chat_offer as chat_offer"))
        ->groupBy('c.sender_id','c.post_id','c.chat_offer')
        ->get();

        $offers_count =DB::table('chats as c')
        ->where('c.to_id',Auth::user()->id)
        //->where('c.chat_offer',1)
        ->where('c.read_status',0)
        ->select(DB::raw("c.sender_id as sender_id") , DB::raw("c.post_id as post_id") , DB::raw("c.chat_offer as chat_offer"))
        ->groupBy('c.sender_id','c.post_id','c.chat_offer')
        ->count();
        $notification_count = $chat_count + $offers_count;
        $output='';
        foreach($chat as $row){
          $user = User::find($row->sender_id);
          $post = post_ad::find($row->post_id);
          $output.='<li>
            <a href="/customer/chat-notification/'.$row->sender_id.'/'.$row->post_id.'" class="top-text-block">
              <div class="top-text-heading">'.$post->title.'</div>
              <div class="top-text-light">New Messages from '.$user->first_name.' '.$user->last_name.'</div>
            </a> 
          </li>';
        }
        foreach($offers as $row){
          $user = User::find($row->sender_id);
          $post = post_ad::find($row->post_id);
          $output.='<li>
            <a href="/customer/offers-notification/'.$row->sender_id.'/'.$row->post_id.'" class="top-text-block">
              <div class="top-text-heading">'.$post->title.'</div>
              <div class="top-text-light">New Offers from '.$user->first_name.' '.$user->last_name.'</div>
            </a> 
          </li>';
        }
        return response()->json(['html'=>$output,'notification_count'=>$notification_count],200); 
    }


}
