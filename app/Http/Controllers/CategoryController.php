<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post_ad;
use App\Models\post_ad_image;
use App\Models\post_ad_features;
use App\Models\category;
use App\Models\User;
use App\Models\city;
use App\Models\settings;
use App\Models\chat;
use App\Models\trending_today;
use App\Models\favourite_post;
use App\Models\post_count;
use App\Models\user_count;
use App\Models\language;
use App\Models\google_ads;
use Auth;
use DB;
use Mail;

class CategoryController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set("Asia/Dubai");
        date_default_timezone_get();
        session(['lang'=>'english']);
    }
    public function category(){
        $category_all = category::where('parent_id',0)->where('status',0)->get();
        $city = city::where('parent_id',0)->where('status',0)->get();
        $language = language::all();
        $google_ads = google_ads::find(1);
        return view('website.category',compact('category_all','city','language','google_ads'));
    }

    public function getfullstory($id)
    {
    	$post_ad = post_ad::find($id);
        $user = User::find($post_ad->customer_id);
    	$post_ad_image = post_ad_image::where('post_id',$id)->get();
        $post_ad_features = post_ad_features::where('post_id',$id)->get();
        

        $previous = post_ad::where('id', '<', $post_ad->id)->where('post_type',2)->orderBy('id','desc')->first();
        $next = post_ad::where('id', '>', $post_ad->id)->where('post_type',2)->orderBy('id')->first();

        $output = '';
        $output .='
        <div class="translate container-fliud">
            <div class="wrapper row">
                <div class="previewss col-md-4">
                <div class="preview-pic tab-content">
                    <div class="tab-pane active" id="pic-0"><a href="#"><img src="/upload_image/'.$post_ad->image.'" /></a></div>';
                    foreach($post_ad_image as $key => $row){
                    $output.='<div class="tab-pane" id="pic-'.($key + 1).'"><a href="#"><img src="/upload_image/'.$row->image.'" /></a></div>';
                    }
                
                $output.='<ul class="preview-thumbnail nav nav-tabs">
                    <li class="active"><a data-target="#pic-0" data-toggle="tab"><img src="/upload_image/'.$post_ad->image.'" /></a></li>';
                    foreach($post_ad_image as $key => $row){
                    $output.='<li><a data-target="#pic-'.($key + 1).'" data-toggle="tab"><img src="/upload_image/'.$row->image.'" /></a></li>';
                    }
                $output.='</ul>
                </div>
                </div>
                <div class="details-view col-md-8">
                <h3 class="product-story-title"><a href="/view-post/'.$post_ad->id.'">'.$post_ad->title.'</a></h3>
                <!--<div class="rating">
                    <div class="stars">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </div>
                    <span class="review-no">41 reviews</span>
                </div>-->
                <p class="product-story-description">'.substr($post_ad->description,0,200).' ...</p>
                <h4 class="price-story">Price: <span>AED '.$post_ad->price.'</span></h4>
                <div class="story-details-content-list">';
                    if(!empty($post_ad_features)){
                    $output.='<h5 class="price-story">Features:</h5>
                    <ul class="list-item-story clearfix">';
                    foreach($post_ad_features as $key => $row){
                        $output.='<li>'.$row->features.'</li>';
                    }
                    $output.='</ul>';
                    }
                $output.='</div>
                <div class="action-now">
                    <div class="cat-story-list">
                        <span class="cat-tits">Categories: </span>
                        <span class="cat-lists"><a href="/search-post/0/'.$post_ad->category.'/0/0/0/0">'. \App\Http\Controllers\HomeController::viewcategoryname($post_ad->category) .'</a></span>
                    </div>
                </div>
                <div class="btn-box">
                        <a href="/view-post/'.$post_ad->id.'" class="theme-btn-one" style="margin-top: 20px;"><i class="icon-1"></i>More Details</a>
                    </div>
                <div class="profile-story-details">';
                    if($user->profile_image != ''){
                        $output.='<img src="/upload_profile_image/'.$user->profile_image.'">';
                    }
                    else{
                        $output.='<img src="/assets/images/icons/user-icon.png">';
                    }
                    $output.='<h4>'.$user->first_name.' '.$user->last_name.'</h4>
                </div>
                <div class="popup-navigation">';
                if(!empty($next)){
                    $output.='<div onclick="viewstory('.$next->id.')" class="pop-next pop-nav"><i class="fas fa-chevron-left"></i></div>';
                }
                if(!empty($previous)){
                    $output.='<div onclick="viewstory('.$previous->id.')" class="pop-prev pop-nav"><i class="fas fa-chevron-right"></i></div>';
                }
                $output.='</div>
                </div>
            </div>
        </div>';

        echo $output; 
    }

    public function getallcategory()
    {
        $category = category::where('parent_id',0)->where('status',0)->get();

        $output = '';
        $x=1;
           foreach ($category as $key => $value) {
                $post_count = post_ad::where('category',$value->id)->where('status',0)->where('admin_status',0)->count();
                // if($x%4 == 0){
                //     $output .='
                //     <a href="/search-post/0/'.$value->id.'/0/0/0/0">
                //         <div class="col-lg-3 col-md-6 col-sm-12 category-block">
                //             <div class="category-block-two wow fadeInDown animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                //                 <div class="inner-box">
                //                     <figure class="image-box img-box-design"><img src="/upload_files/'.$value->image.'" alt=""></figure>
                //                     <div class="lower-content">
                //                         <span>'.$post_count.'</span>
                //                         <h4><a href="/search-post/0/'.$value->id.'/0/0/0/0">'.$value->category.'</a></h4>
                //                     </div>
                //                 </div>
                //             </div>
                //         </div>
                //     </a>';
                //     $output .='
                //     <div style="margin-bottom:25px;" class="col-md-12 clearfix">
                //         <center><img src="https://via.placeholder.com/728x90"></center>
                //     </div>';
                // }
                // else{
                    // if($key%2 == 0){
                        $output .='
                        <a class="translate" href="/search-post/0/'.$value->id.'/0/0/0/0">
                            <div class="col-md-6 col-lg-3 col-sm-6 col-xs-6 col-6 category-block">
                                <div class="category-block-two wow fadeInDown animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                                    <div class="inner-box">
                                        <figure class="image-box img-box-design"><img class="img-calls" src="/upload_files/'.$value->image.'" alt=""></figure>
                                        <div class="lower-content">
                                            <span>'.$post_count.'</span>
                                            <h4><a class="translate" href="/search-post/0/'.$value->id.'/0/0/0/0">'.$value->category.'</a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>';
                    // }
                    // else{
                    //     //$x = $x+1;
                    //     $output .='
                    //     <a href="/search-post/0/'.$value->id.'/0/0/0/0">
                    //         <div class="col-lg-3 col-md-6 col-sm-12 category-block">
                    //             <div class="category-block-two wow fadeInDown animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                    //                 <div class="inner-box">
                    //                     <figure class="image-box img-box-design"><img src="/upload_files/'.$value->image.'" alt=""></figure>
                    //                     <div class="lower-content">
                    //                         <span>'.$post_count.'</span>
                    //                         <h4><a href="/search-post/0/'.$value->id.'/0/0/0/0">'.$value->category.'</a></h4>
                    //                     </div>
                    //                 </div>
                    //             </div>
                    //         </div>
                    //     </a>';
                    //     $output .='
                    //     <div class="col-lg-3 col-md-6 col-sm-12 category-block">
                    //         <img src="https://via.placeholder.com/300x250">
                    //     </div>';
                    // }
                //}

                
                $x++;
           }

        echo $output;
    }

}
