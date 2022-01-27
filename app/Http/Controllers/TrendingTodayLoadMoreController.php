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
use App\Models\language;
use Auth;
use DB;
use Mail;
use Carbon\Carbon;

class TrendingTodayLoadMoreController extends Controller
{
    function loaddata(Request $request)
    {
        if($request->ajax())
        {
            if($request->id > 0)
            {
            $data = DB::table('post_ads as p')
                ->where('p.post_type',1)
                ->where('p.admin_status',0)
                ->where('p.status',0)
                ->where('p.id', '<', $request->id)
                ->orderBy('p.id', 'DESC')
                ->limit(4)
                ->get();
            }
            else
            {
            $data = DB::table('post_ads as p')
                ->where('p.post_type',1)
                ->where('p.admin_status',0)
                ->where('p.status',0)
                ->orderBy('p.id', 'DESC')
                ->limit(12)
                ->get();
            }
            $output = '';
            $last_id = '';
            
            if(!$data->isEmpty())
            {
            foreach($data as $row)
            {
                $output .= '
<div class="col-md-3 col-lg-3 col-sm-6 feature-block-one wow fadeInDown animated animated" data-wow-delay="300ms" data-wow-duration="1500ms">
    <div class="inner-box">
    <a href="/view-post/'.$row->id.'">
        <div class="image-box">
            <figure class="image"><img style="height:200px;" src="/upload_image/'.$row->image.'" alt=""></figure>';
            
            if($row->post_type == '1'){
                $output .= '<div class="shape"></div>
            <div class="feature">Featured</div>';
            }
            $output .= '<!-- <div class="icon">
                <div class="icon-shape"></div>
                <i class="icon-16"></i>
            </div> -->
        </div>
        <div class="lower-content">
            <div class="category"><i class="fas fa-tags"></i><a href="javascript:void(0)">'. \App\Http\Controllers\HomeController::viewcategoryname($row->category) .'</a></div>
            <h3><a href="/view-post/'.$row->id.'">'.$row->title.'</a></h3>
            <!-- <ul class="rating clearfix">
                <li><i class="icon-17"></i></li>
                <li><i class="icon-17"></i></li>
                <li><i class="icon-17"></i></li>
                <li><i class="icon-17"></i></li>
                <li><i class="icon-17"></i></li>
                <li><a href="index.html">(25)</a></li>
            </ul> -->
            <ul class="info clearfix">
                <li><i class="far fa-clock"></i>'. \App\Http\Controllers\HomeController::humanreadtime($row->created_at) .'</li>
                <li style="text-transform:capitalize !important;text-overflow: ellipsis;overflow: hidden;display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical;"><i class="fas fa-map-marker-alt"></i>'. \App\Http\Controllers\HomeController::viewcityname($row->area,$row->city) .'</li>
            </ul>
            <div class="lower-box">
                <h5><span>Price:</span>AED '.$row->price.'</h5>
                <ul class="react-box">
                    <!-- <li><a href="javascript:void(0)"><i class="icon-22"></i></a></li> -->';
                    if(Auth::check()){
                        // $output .=  \App\Http\Controllers\LoginController::viewfavourite($row->id) ;
                    }else{
                    $output .= '<li><a href="/login"><i class="icon-22"></i></a></li>';
                    }
                $output .= '</ul>
            </div>
        </div>
    </a>
    </div>
</div>
                ';
                $last_id = $row->id;
            }
            $output .= '
            <div class="text-center" style="width: 100%">
                <div class="more-btn"><a href="javascript:void(0)" class="theme-btn-one" data-id="'.$last_id.'" id="trending_today_load_more_button">Load More Trending</a></div>
            </div>
            ';
            }
            else
            {
            $output .= '
            <div class="text-center" style="width: 100%">
                <div class="more-btn"><a href="javascript:void(0)" class="theme-btn-one">No Data Found</a></div>
            </div>
            ';
            }
        echo $output;
        }
    }

}
