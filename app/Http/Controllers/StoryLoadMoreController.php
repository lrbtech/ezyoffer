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

class StoryLoadMoreController extends Controller
{
    
    function loaddata(Request $request)
    {
        if($request->ajax())
        {
            if($request->id > 0)
            {
            $data = DB::table('post_ads as p')
                ->join('users as u', 'p.customer_id', '=', 'u.id')
                ->select('p.*','u.first_name','u.last_name','u.profile_image')
                ->where('p.post_type',2)
                ->where('p.admin_status',0)
                ->where('p.status',0)
                ->where('p.live_ads',1)
                ->where('p.id', '<', $request->id)
                ->orderBy('p.id', 'DESC')
                ->limit(4)
                ->get();
            }
            else
            {
            $data = DB::table('post_ads as p')
                ->join('users as u', 'p.customer_id', '=', 'u.id')
                ->select('p.*','u.first_name','u.last_name','u.profile_image')
                ->where('p.post_type',2)
                ->where('p.admin_status',0)
                ->where('p.status',0)
                ->where('p.live_ads',1)
                ->orderBy('p.id', 'DESC')
                ->limit(11)
                ->get();
            }
            $output = '';
            $last_id = '';
if($request->id > 0)   
{}
else{
if(Auth::check()){
$output.='
<div style="margin: 30px 0;" class="col-md-6 col-lg-3">
    <div class="work add-stroy">
        <div class="img d-flex align-items-end justify-content-center" style="background-color: #091a3a">
            <a class="create-story" href="/customer/new-post-ads">
                <div class="fas fa-plus"></div>
                <h4 class="story-line">Create Story</h4>
            </a>
        </div>
    </div>
</div>';
}else{
$output.='
<div style="margin: 30px 0;" class="col-md-6 col-lg-3">
    <div class="work add-stroy">
        <div class="img d-flex align-items-end justify-content-center" style="background-color: #091a3a">
            <a class="create-story" href="/login">
                <div class="fas fa-plus"></div>
                <h4 class="story-line">Create Story</h4>
            </a>
        </div>
    </div>
</div>';
} 
}

            if(!$data->isEmpty())
            {
            foreach($data as $row)
            {
                $output .= '
<div style="margin: 30px 0;" class="col-md-3">
    <div class="work" onclick="viewstory('.$row->id.')">
        <div class="img d-flex align-items-end justify-content-center" style="background-image: url(/upload_image/'.$row->image.');">
            <div class="profile-story">';
                if($row->profile_image != ''){
                $output .='<img style="height:40px;" src="/upload_profile_image/'.$row->profile_image.'" alt="">';
                }else{
                $output .='<img src="/assets/images/icons/user-icon.png" alt="">';
                }
                $output.='<h4>'.$row->first_name.' '.$row->last_name.'</h4>
            </div>
            <div class="text w-100">
                <span class="cat">'. \App\Http\Controllers\HomeController::viewcategoryname($row->category) .'</span>
                <h3><a href="#">'.$row->title.'</a></h3>
            </div>
        </div>
    </div>
</div>
                ';
                $last_id = $row->id;
            }
            $output .= '
            <div class="text-center" style="width: 100%">
                <div class="more-btn"><a href="javascript:void(0)" class="theme-btn-one" data-id="'.$last_id.'" id="story_load_more_button">Load More Story</a></div>
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
