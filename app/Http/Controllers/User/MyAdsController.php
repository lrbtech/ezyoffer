<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
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
use App\Models\google_ads;
use Auth;
use DB;
use Mail;
use Carbon\Carbon;

class MyAdsController extends Controller
{
    function loaddata(Request $request)
    {
        if($request->ajax())
        {
            $last_id = array();
            //if($request->id > 0)
            if($request->id != '')
            {
                $i =DB::table('post_ads as p');
                $i->where('p.customer_id', Auth::user()->id);
                $i->select('p.*');
                $i->where('p.admin_status',0);
                $i->where('p.status',0);
                //$i->where('p.id', '<', $request->id);
                $i->whereNotIn('p.id',$request->id);
                //$data = $i->limit(3)->get();
                $data = $i->limit(21)->get();
            }
            else
            {
                $i =DB::table('post_ads as p');
                $i->where('p.customer_id', Auth::user()->id);
                $i->select('p.*');
                $i->where('p.admin_status',0);
                $i->where('p.status',0);
                //$data = $i->limit(9)->get();
                $data = $i->limit(21)->get();
            }
            $output = '';
            
            if(!$data->isEmpty())
            {
$output.='
<div class="translate category-block wrapper browse-add list">
    <div style="margin-top:-20px;" class="list-item feature-style-three pd-0">';
        foreach($data as $row){
        $output.='<div class="feature-block-one">
            <div class="inner-box">
                <div class="image-box">
                    <figure class="image"><img onclick="viewpost('.$row->id.')" style="width:200px;height:225px;" src="/upload_image/'.$row->image.'" alt=""></figure>';
                    if($row->post_type == '0'){
                        $output.='<div class="feature-2">Normal</div>';
                    }
                    if($row->post_type == '1'){
                        $output.='<div class="feature-2">Trending</div>';
                    }
                $output.='</div>
                <div class="lower-content">
                    <div class="category"><i class="fas fa-tags"></i><a href="/search-post/0/'.$row->category.'/0/0/0/0">'. \App\Http\Controllers\HomeController::viewcategoryname($row->category) .'</a></div>
                    <h4 style="text-transform:capitalize !important;"><a href="/view-post/'.$row->id.'">'.$row->title.'</a></h4>
                    <!-- <ul class="rating clearfix">
                        <li><i class="icon-17"></i></li>
                        <li><i class="icon-17"></i></li>
                        <li><i class="icon-17"></i></li>
                        <li><i class="icon-17"></i></li>
                        <li><i class="icon-17"></i></li>
                        <li><a href="index.html">(32)</a></li>
                    </ul> -->
                    <ul class="info clearfix">
                        <!-- <li><i class="far fa-clock"></i>'. \App\Http\Controllers\HomeController::humanreadtime($row->created_at) .'</li>-->
                        <li><i class="far fa-check"></i>'. $row->item_conditions .'</li>
                        <li style="text-transform:capitalize !important;text-overflow: ellipsis;overflow: hidden;display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical;"><i class="fas fa-map-marker-alt"></i>'. \App\Http\Controllers\HomeController::viewcityname($row->area,$row->city) .'</li>
                    </ul>
                    <div class="lower-box">
                        <h5><span>Price:</span>AED '.$row->price.'</h5>
                        <ul class="react-box">
                        <li class="favourite-list'.$row->id.'">';
                        if(Auth::check()){
                        $output.=\App\Http\Controllers\LoginController::viewfavourite($row->id);
                        }else{
                        $output.='<a href="/login"><i class="icon-22"></i></a>';
                        }
                        $output.='
                        </li>
                        </ul>
                    </div>
                </div>
                <div class="btn-box button-with-action"><a href="/customer/edit-post-ads/'.$row->id.'" class="theme-btn-one">Edit</a></div>
                <div class="btn-box button-with-disble"><a style="background-color:#ff0000 !important;" onclick="DeleteAd('.$row->id.')" href="javascript:void(0)" class="theme-btn-one">Delete</a></div>
            </div>
        </div>';
        $last_id[] = $row->id;
        }
    $output.='</div>
    <div style="margin-top:-20px;" class="grid-item feature-style-two four-column pd-0">
        <div class="row clearfix">';
            if(count($data) > 1){
            foreach($data as $row){
            $output.='<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 col-6 feature-block">
                <div class="feature-block-one">
                    <div class="inner-box">
                    <a href="/view-post/'.$row->id.'">
                        <div class="image-box img-box-design">
                            <figure class="image"><img onclick="viewpost('.$row->id.')" style="width:370px;height:200px;" src="/upload_image/'.$row->image.'" alt=""></figure>';
                            
                            if($row->post_type == '0'){
                                $output.='<div class="shape"></div>
                                <div class="feature notranslate">Normal</div>';
                            }
                            elseif($row->post_type == '1'){
                                $output.='<div class="shape"></div>
                                <div class="feature notranslate">Trending</div>';
                            }
                            $output.='
                            <a href="/customer/edit-post-ads/'.$row->id.'">
                                <div class="icon">
                                    <div class="icon-shape"></div>
                                    <i class="fa fa-edit"></i>
                                </div>
                            </a>
                            <!-- <div class="icon">
                                <div class="icon-shape"></div>
                                <i class="icon-16"></i>
                            </div> -->';
                        $output.='</div>
                        <div class="lower-content">
                            <div class="category"><i class="fas fa-tags"></i><a href="/search-post/0/'.$row->category.'/0/0/0/0">'. \App\Http\Controllers\HomeController::viewcategoryname($row->category) .'</a></div>
                            <h3 style="text-transform:capitalize !important;"><a href="/view-post/'.$row->id.'">'.$row->title.'</a></h3>
                            <!-- <ul class="rating clearfix">
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><a href="index.html">(25)</a></li>
                            </ul> -->
                            <ul class="info clearfix">
                                <!-- <li><i class="far fa-clock"></i>'. \App\Http\Controllers\HomeController::humanreadtime($row->created_at) .'</li>-->
                                <li><i class="far fa-check"></i>'. $row->item_conditions .'</li>
                                <li style="text-transform:capitalize !important;text-overflow: ellipsis;overflow: hidden;display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical;"><i class="fas fa-map-marker-alt"></i>'. \App\Http\Controllers\HomeController::viewcityname($row->area,$row->city) .'</li>
                            </ul>
                            <div class="lower-box">
                                <h5><span>Price:</span>AED '.$row->price.'</h5>
                                <ul class="react-box">
                                <li class="favourite-grid'.$row->id.'">';
                                if(Auth::check()){
                                $output.=\App\Http\Controllers\LoginController::viewfavourite($row->id);
                                }else{
                                $output.='<a href="/login"><i class="icon-22"></i></a>';
                                }
                                $output.='
                                </li>
                                </ul>
                            </div>
                        </div>
                    </a>
                    </div>
                </div>
            </div>';
            }
            }else{ 
            foreach($data as $row){
            $output.='<div class="col-lg-12 col-md-12 col-sm-12 feature-block">
                <div class="feature-block-one">
                    <div class="inner-box">
                    <a href="/view-post/'.$row->id.'">
                        <div class="image-box img-box-design">
                            <figure class="image"><img onclick="viewpost('.$row->id.')" style="width:370px;height:200px;" src="/upload_image/'.$row->image.'" alt=""></figure>';
                            
                            if($row->post_type == '0'){
                                $output.='<div class="shape"></div>
                                <div class="feature notranslate">Normal</div>';
                            }
                            elseif($row->post_type == '1'){
                                $output.='<div class="shape"></div>
                                <div class="feature notranslate">Trending</div>';
                            }
                            $output.='
                            <a href="/customer/edit-post-ads/'.$row->id.'">
                                <div class="icon">
                                    <div class="icon-shape"></div>
                                    <i class="fa fa-edit"></i>
                                </div>
                            </a>
                            <!-- <div class="icon">
                                <div class="icon-shape"></div>
                                <i class="icon-16"></i>
                            </div> -->
                        </div>
                        <div class="lower-content">
                            <div class="category"><i class="fas fa-tags"></i><a href="/search-post/0/'.$row->category.'/0/0/0/0">'. \App\Http\Controllers\HomeController::viewcategoryname($row->category) .'</a></div>
                            <h3 style="text-transform:capitalize !important;"><a href="/view-post/'.$row->id.'">'.$row->title.'</a></h3>
                            <!-- <ul class="rating clearfix">
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><a href="index.html">(25)</a></li>
                            </ul> -->
                            <ul class="info clearfix">
                                <!-- <li><i class="far fa-clock"></i>'. \App\Http\Controllers\HomeController::humanreadtime($row->created_at) .'</li>-->
                                <li><i class="far fa-check"></i>'. $row->item_conditions .'</li>
                                <li style="text-transform:capitalize !important;text-overflow: ellipsis;overflow: hidden;display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical;"><i class="fas fa-map-marker-alt"></i>'. \App\Http\Controllers\HomeController::viewcityname($row->area,$row->city) .'</li>
                            </ul>
                            <div class="lower-box">
                                <h5><span>Price:</span>AED '.$row->price.'</h5>
                                <ul class="react-box">
                                <li class="favourite-grid'.$row->id.'">';
                                if(Auth::check()){
                                $output.=\App\Http\Controllers\LoginController::viewfavourite($row->id);
                                }else{
                                $output.='<a href="/login"><i class="icon-22"></i></a>';
                                }
                                $output.='
                                </li>
                                </ul>
                            </div>
                        </div>
                    </a>
                    </div>
                </div>
            </div>';
            }
            }
    $output.='</div>
    </div>

</div>
            ';
                if($request->id != ''){
                    if(count($data) == 3){
                    $output .= '
                    <div class="text-center" style="width:100%;margin-bottom:20px;">
                        <div class="more-btn"><a href="javascript:void(0)" class="theme-btn-one" data-id="'.json_encode($last_id).'" id="search_post_load_more_button">Load More</a></div>
                    </div>
                    ';
                    }
                }
                else{
                    if(count($data) == 9){
                        $output .= '
                        <div class="text-center" style="width:100%;margin-bottom:20px;">
                            <div class="more-btn"><a href="javascript:void(0)" class="theme-btn-one" data-id="'.json_encode($last_id).'" id="search_post_load_more_button">Load More</a></div>
                        </div>
                        ';
                    }
                }
                $output.='
                <script>
                var gridclassName = $("#grid-view").attr("class");
                var listclassName = $("#list-view").attr("class");
                var wrapper = $("div.wrapper");

                if(listclassName == "list-view on"){
                gridButton.removeClass("on");
                listButton.addClass("on");
                wrapper.removeClass("grid").addClass("list"); 
                }

                if(gridclassName == "grid-view on"){
                listButton.removeClass("on");
                gridButton.addClass("on");
                wrapper.removeClass("list").addClass("grid");
                }
                </script>
                ';
            }
            else
            {
                // if(count($data) > 9){
                $output .= '
                <div class="text-center" style="width:100%;margin-bottom:20px;">
                    <div class="more-btn"><a href="javascript:void(0)" class="theme-btn-one">No Data Found</a></div>
                </div>
                ';
                // }
            }
        echo $output;
        }
    }

}
