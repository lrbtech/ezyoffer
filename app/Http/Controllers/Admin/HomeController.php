<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\post_ad;
use App\Models\post_ad_image;
use App\Models\category;
use App\Models\language;
use App\Models\post_count;
use App\Models\user_count;
use Yajra\DataTables\Facades\DataTables;
use Auth;
use DB;
use Mail;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        date_default_timezone_set("Asia/Dubai");
        date_default_timezone_get();
    }

    public function dashboard(){
        $language = language::all();
        $total_posts = post_ad::count();
        $total_customers = User::count();
        $today = date('Y-m-d');
        $cfdate = date('Y-m-d',strtotime('first day of this month'));
        $cldate = date('Y-m-d',strtotime('last day of this month'));

        $total_today_posts = post_ad::where('date',$today)->count();
        $total_today_customers = User::where('date',$today)->count();

        $current_month_posts = post_ad::whereBetween('date', [$cfdate, $cldate])->count();
        $current_month_customers = User::whereBetween('date', [$cfdate, $cldate])->count();

        $current_month_visitor = post_count::whereBetween('date', [$cfdate, $cldate])->count();
        $total_today_visitor = post_count::where('date',$today)->count();

        $category = category::where('parent_id',0)->get();

        return view('admin.dashboard',compact('total_customers','total_posts','total_today_posts','total_today_customers','current_month_posts','current_month_customers','language','category','total_today_visitor','current_month_visitor'));
    }
}
