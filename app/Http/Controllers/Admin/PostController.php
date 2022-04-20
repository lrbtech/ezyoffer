<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\city;
use App\Models\User;
use App\Models\post_ad;
use App\Models\post_ad_image;
use App\Models\post_ad_features;
use App\Models\report_posts;
use App\Models\report_category;
use App\Models\category;
use App\Models\language;
use App\Models\chat;
use App\Models\favourite_post;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\ImageFilter;
use Auth;
use DB;
use Mail;
use App\Models\settings;
use Image;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        date_default_timezone_set("Asia/Dubai");
        date_default_timezone_get();
    }

    public function postads(){
        $user = User::where('status',1)->get();
        $category = category::where('parent_id',0)->where('status',0)->get();
        $language = language::all();
        return view('admin.post_ads',compact('user','language','category'));
    }

    public function customerpostads($id){
        $language = language::all();
        return view('admin.customer_post_ads',compact('id','language'));
    }

    public function reportpostads(){
        $language = language::all();
        return view('admin.report_posts',compact('language'));
    }

    public function deletepostads($id,$status){
        $post_ad = post_ad::find($id);
        $post_ad->admin_status = $status;
        $post_ad->save();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }

    public function getpostads($fdate,$tdate,$user_id,$category,$from_range,$to_range){
        $fdate1 = date('Y-m-d', strtotime($fdate));
        $tdate1 = date('Y-m-d', strtotime($tdate));

        $i =DB::table('post_ads as p');
        if ( $fdate1 && $fdate != '1' && $tdate1 && $tdate != '1' )
        {
            $i->whereBetween('p.date', [$fdate1, $tdate1]);
        }
        if ( $user_id != 'user' )
        {
            if($user_id != 'admin'){
                $i->where('p.customer_id', $user_id);
            }
            else{
                $i->where('p.customer_id', 0);
            }
        }
        if ( $category != 'category' )
        {
            $i->where('p.category', $category);
        }
        if ( $from_range != 'from_range' && $to_range != 'to_range' )
        {
            $i->whereBetween('p.price', [$from_range, $to_range]);
        }
        $i->orderBy('p.id','DESC');
        $post_ad = $i->get();
        
        return Datatables::of($post_ad)
            ->addColumn('customer', function ($post_ad) {
                $user = User::find($post_ad->customer_id);
                if(!empty($user)){
                    return '<td>
                    <p>Name : '.$user->first_name.' '.$user->last_name.'</p>
                    <p>Mobile : '.$user->mobile.'</p>
                    </td>';
                }
                else{
                    return '<td>
                    <p>Created by Admin</p>
                    </td>';
                }
            })

			->addColumn('category', function ($post_ad) {
				$category = category::find($post_ad->category);
                return '<td>
                <p>Category : '.$category->category.'</p>
                </td>';
            })

            ->addColumn('post_details', function ($post_ad) {
                $favourite_post = favourite_post::where('post_id',$post_ad->id)->count();
                $chat = chat::where('post_id',$post_ad->id)->where('sender_id','!=',$post_ad->customer_id)->groupBy('sender_id')->count();
                return '<td>
                <p>Title : '.$post_ad->title.'</p>
                <p>price : '.$post_ad->price.'</p>
                <p>Item Condition : '.$post_ad->item_conditions.'</p>
                <p>Chat : '.$chat.'</p>
                <p>Favourite post : '.$favourite_post.'</p>
                </td>';
            })

            ->addColumn('post_image', function ($post_ad) {
                return '<td>
                <img style="width:80px;" src="/upload_image/'.$post_ad->image.'">
                </td>';
            })

            ->addColumn('post_type', function ($post_ad) {
                $language = language::all();
                if($post_ad->post_type == 0){
                    return $language[250][Auth::guard('admin')->user()->lang];
                }
                elseif($post_ad->post_type == 1){
                    return $language[251][Auth::guard('admin')->user()->lang];
                }
            })

            ->addColumn('status', function ($post_ad) {
                if($post_ad->admin_status == 0){
                    return 'Active';
                }
                elseif($post_ad->admin_status == 1){
                    return 'DeActive';
                }
            })

            ->addColumn('date', function ($post_ad) {
                return '<td>
                <p>'.date('d-m-Y',strtotime($post_ad->created_at)).'</p>
                <p>'.date('h:i A',strtotime($post_ad->created_at)).'</p>
                </td>';
            })


            ->addColumn('action', function ($post_ad) {
                $output='';
                if($post_ad->admin_status == 0){
                    $output.='<a onclick="Delete('.$post_ad->id.',1)" class="dropdown-item" href="#">DeActive</a>';
                }
                elseif($post_ad->admin_status == 1){
                    $output.='<a onclick="Delete('.$post_ad->id.',0)" class="dropdown-item" href="#">Active</a>';
                }
                return '<td>
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(140px, 183px, 0px); top: 0px; left: 0px; will-change: transform;">
                        '.$output.'
                        <a target="_private" class="dropdown-item" href="/admin-edit-post/'.$post_ad->id.'">Edit Post</a>
                        <a class="dropdown-item" href="/view-post/'.$post_ad->id.'">View Post</a>
                    </div>
                </td>';
            })
           
            
        ->rawColumns(['customer','post_details','post_image', 'category','post_type', 'status','action','date'])
        ->addIndexColumn()
        ->make(true);

        //return Datatables::of($orders) ->addIndexColumn()->make(true);
    }

    public function getreportpostads($fdate,$tdate){
        $fdate1 = date('Y-m-d', strtotime($fdate));
        $tdate1 = date('Y-m-d', strtotime($tdate));

        $post_ad =DB::table('report_posts as r');
        $post_ad->join('post_ads as p','p.id','=','r.post_id');
        $post_ad->select('p.*',DB::raw("r.post_id as report_post_id"),DB::raw("r.category as report_category"),DB::raw("r.description as report_description"),DB::raw("r.user_id as report_user"));
        if ( $fdate1 && $fdate != '1' && $tdate1 && $tdate != '1' )
        {
            $post_ad->whereBetween('r.date', [$fdate1, $tdate1]);
        }
        $post_ad->orderBy('r.id','DESC');
        //$post_ad = $i->get();
        
        return Datatables::of($post_ad)
            ->addColumn('customer', function ($post_ad) {
                $user = User::find($post_ad->report_user);
                if(!empty($user)){
                    return '<td>
                    <p>Name : '.$user->first_name.' '.$user->last_name.'</p>
                    <p>Mobile : '.$user->mobile.'</p>
                    </td>';
                }
            })

			->addColumn('category', function ($post_ad) {
				$category = category::find($post_ad->category);
                $language = language::all();
                if($post_ad->post_type == 0){
                    return '<td>
                    <p>Category : '.$category->category.'</p>
                    <p>Post Type : '.$language[250][Auth::guard('admin')->user()->lang].'</p>
                    </td>';
                }
                elseif($post_ad->post_type == 1){
                    return '<td>
                    <p>Category : '.$category->category.'</p>
                    <p>Post Type : '.$language[251][Auth::guard('admin')->user()->lang].'</p>
                    </td>';
                }
            })

            ->addColumn('post_details', function ($post_ad) {
                return '<td>
                <p>Title : '.$post_ad->title.'</p>
                <p>price : '.$post_ad->price.'</p>
                <p>Item Condition : '.$post_ad->item_conditions.'</p>
                </td>';
            })
            // ->addColumn('post_details', function ($post_ad) {
            //     $favourite_post = favourite_post::where('post_id',$post_ad->id)->count();
            //     $chat = chat::where('post_id',$post_ad->id)->where('sender_id','!=',$post_ad->customer_id)->groupBy('sender_id')->count();
            //     return '<td>
            //     <p>Title : '.$post_ad->title.'</p>
            //     <p>price : '.$post_ad->price.'</p>
            //     <p>Item Condition : '.$post_ad->item_conditions.'</p>
            //     <p>Chat : '.$chat.'</p>
            //     <p>Favourite post : '.$favourite_post.'</p>
            //     </td>';
            // })

            ->addColumn('report_reason', function ($post_ad) {
                $category = report_category::find($post_ad->report_category);
                return '<td>
                <p>Category : '.$category->category.'</p>
                <p>Reason : '.$post_ad->report_description.'</p>
                </td>';
            })

            ->addColumn('post_image', function ($post_ad) {
                return '<td>
                <img style="width:80px;" src="/upload_image/'.$post_ad->image.'">
                </td>';
            })

            ->addColumn('post_status', function ($post_ad) {
                if($post_ad->admin_status == 0){
                    return 'Active';
                }
                elseif($post_ad->admin_status == 1){
                    return 'DeActive';
                }
            })

            ->addColumn('user_status', function ($post_ad) {
                $user = User::find($post_ad->report_user);
                if($user->status == 1){
                    return 'Active';
                }
                elseif($user->status == 2){
                    return 'DeActive';
                }
            })

            ->addColumn('date', function ($post_count) {
                return '<td>
                <p>'.date('d-m-Y',strtotime($post_count->date)).'</p>
                <p>'.date('h:i A',strtotime($post_count->created_at)).'</p>
                </td>';
            })

            ->addColumn('action', function ($post_ad) {
                $output='';
                if($post_ad->admin_status == 0){
                    $output.='<a onclick="Delete('.$post_ad->id.',1)" class="dropdown-item" href="#">Post DeActive</a>';
                }
                elseif($post_ad->admin_status == 1){
                    $output.='<a onclick="Delete('.$post_ad->id.',0)" class="dropdown-item" href="#">Post Active</a>';
                }
                $user = User::find($post_ad->report_user);
                $output1='';
                if($user->status == 1){
                    $output1.='<a onclick="UserDelete('.$user->id.',2)" class="dropdown-item" href="#">User DeActive</a>';
                }
                elseif($user->status == 2){
                    $output1.='<a onclick="UserDelete('.$user->id.',1)" class="dropdown-item" href="#">User Active</a>';
                }
                return '<td>
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(140px, 183px, 0px); top: 0px; left: 0px; will-change: transform;">
                        '.$output.'
                        '.$output1.'
                        <a target="_blank" class="dropdown-item" href="/admin-edit-post/'.$post_ad->id.'">Edit Post</a>
                        <a class="dropdown-item" href="/view-post/'.$post_ad->id.'">View Post</a>
                    </div>
                </td>';
            })
            
        ->rawColumns(['customer','post_details','post_image', 'category', 'post_status','user_status','action','report_reason','date'])
        ->addIndexColumn()
        ->make(true);

        //return Datatables::of($orders) ->addIndexColumn()->make(true);
    }


    public function getcustomerpostads($id){
        $post_ad = post_ad::where('customer_id',$id)->orderBy('id','DESC')->get();
        
        return Datatables::of($post_ad)
            ->addColumn('customer', function ($post_ad) {
                $user = User::find($post_ad->customer_id);
                if(!empty($user)){
                    return '<td>
                    <p>Name : '.$user->first_name.' '.$user->last_name.'</p>
                    <p>Mobile : '.$user->mobile.'</p>
                    </td>';
                }
                else{
                    return '<td>
                    <p>Created by Admin</p>
                    </td>';
                }
            })

			->addColumn('category', function ($post_ad) {
				$category = category::find($post_ad->category);
                return '<td>
                <p>Category : '.$category->category.'</p>
                </td>';
            })

            // ->addColumn('post_details', function ($post_ad) {
            //     return '<td>
            //     <p>Title : '.$post_ad->title.'</p>
            //     <p>price : '.$post_ad->price.'</p>
            //     <p>Item Condition : '.$post_ad->item_conditions.'</p>
            //     </td>';
            // })
            ->addColumn('post_details', function ($post_ad) {
                $favourite_post = favourite_post::where('post_id',$post_ad->id)->count();
                $chat = chat::where('post_id',$post_ad->id)->where('sender_id','!=',$post_ad->customer_id)->groupBy('sender_id')->count();
                return '<td>
                <p>Title : '.$post_ad->title.'</p>
                <p>price : '.$post_ad->price.'</p>
                <p>Item Condition : '.$post_ad->item_conditions.'</p>
                <p>Chat : '.$chat.'</p>
                <p>Favourite post : '.$favourite_post.'</p>
                </td>';
            })

            ->addColumn('post_image', function ($post_ad) {
                return '<td>
                <img style="width:80px;" src="/upload_image/'.$post_ad->image.'">
                </td>';
            })

            ->addColumn('post_type', function ($post_ad) {
                $language = language::all();
                if($post_ad->post_type == 0){
                    return $language[250][Auth::guard('admin')->user()->lang];
                }
                elseif($post_ad->post_type == 1){
                    return $language[251][Auth::guard('admin')->user()->lang];
                }
            })

            ->addColumn('status', function ($post_ad) {
                if($post_ad->admin_status == 0){
                    return 'Active';
                }
                elseif($post_ad->admin_status == 1){
                    return 'DeActive';
                }
            })

            ->addColumn('date', function ($post_ad) {
                return '<td>
                <p>'.date('d-m-Y',strtotime($post_ad->created_at)).'</p>
                <p>'.date('h:i A',strtotime($post_ad->created_at)).'</p>
                </td>';
            })


            ->addColumn('action', function ($post_ad) {
                $output='';
                if($post_ad->admin_status == 0){
                    $output.='<a onclick="Delete('.$post_ad->id.',1)" class="dropdown-item" href="#">DeActive</a>';
                }
                elseif($post_ad->admin_status == 1){
                    $output.='<a onclick="Delete('.$post_ad->id.',0)" class="dropdown-item" href="#">Active</a>';
                }
                return '<td>
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(140px, 183px, 0px); top: 0px; left: 0px; will-change: transform;">
                        '.$output.'
                        <a target="_private" class="dropdown-item" href="/admin-edit-post/'.$post_ad->id.'">Edit Post</a>
                        <a class="dropdown-item" href="/view-post/'.$post_ad->id.'">View Post</a>
                    </div>
                </td>';
            })
           
            
        ->rawColumns(['customer','post_details','post_image', 'category','post_type', 'status','action','date'])
        ->addIndexColumn()
        ->make(true);

        //return Datatables::of($orders) ->addIndexColumn()->make(true);
    }

}
