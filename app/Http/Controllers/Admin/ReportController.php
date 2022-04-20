<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\city;
use App\Models\User;
use App\Models\post_ad;
use App\Models\post_ad_image;
use App\Models\category;
use App\Models\report_posts;
use App\Models\report_category;
use App\Models\live_ads;
use App\Models\language;
use App\Models\post_count;
use App\Models\package;
use App\Models\user_count;
use Yajra\DataTables\Facades\DataTables;
use Auth;
use DB;
use Mail;
use App\Models\settings;
use Image;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        date_default_timezone_set("Asia/Dubai");
        date_default_timezone_get();
    }


    public function packagereport(){
    	$user = User::where('status',1)->get();
        $all_package = package::all();
        $language = language::all();
        return view('admin.package_report',compact('user','language','all_package'));
    }

    public static function viewpackagename($id) {        
        $package = package::find($id);
        echo $package->package_name;
    }

    public function packagesummary(){
    	$user = User::where('status',1)->get();
        $all_package = package::all();
        $language = language::all();

        $i =DB::table('used_packages as u');
        $i->groupBy('u.package_id');
        $i->select([DB::raw("SUM(u.price) as total_price") ,DB::raw("COUNT(u.id) as total_count") , DB::raw("u.package_id") ]);
        $package = $i->get();

        return view('admin.package_summary',compact('user','language','package','all_package'));
    }

    public function datepackagesummary(Request $request){
    	$user = User::where('status',1)->get();
        $language = language::all();
        $all_package = package::all();

        $fdate1 = date('Y-m-d', strtotime($request->from_date));
        $tdate1 = date('Y-m-d', strtotime($request->to_date));
        $i =DB::table('used_packages as u');
        if ( $request->from_date != '' && $request->to_date != '' )
        {
            $i->whereBetween('u.apply_date', [$fdate1, $tdate1]);
        }
        if ( $request->package_id != 'package' )
        {
            $i->where('u.package_id', $request->package_id);
        }
        // if ( $request->user_id != 'user' )
        // {
        //     $i->where('u.user_id', $request->user_id);
        // }
        $i->groupBy('u.package_id');
        $i->select([DB::raw("SUM(u.price) as total_price") ,DB::raw("COUNT(u.id) as total_count") , DB::raw("u.package_id") ]);
        $package = $i->get();

        return view('admin.package_summary',compact('user','language','package','all_package'));
    }

    public function visitorlogs(){
    	$user = User::where('status',1)->get();
        $category = category::where('parent_id',0)->where('status',0)->get();
        $language = language::all();
        return view('admin.visitor_logs',compact('user','language','category'));
    }

    public function getpackagereport($fdate,$tdate,$package_id){
        $fdate1 = date('Y-m-d', strtotime($fdate));
        $tdate1 = date('Y-m-d', strtotime($tdate));

        $i =DB::table('used_packages as u');
        if ( $fdate1 && $fdate != '1' && $tdate1 && $tdate != '1' )
        {
            $i->whereBetween('u.date', [$fdate1, $tdate1]);
        }
        if ( $package_id != 'package' )
        {
            $i->where('u.package_id', $package_id);
        }
        // if ( $user_id != 'user' )
        // {
        //     $i->where('u.user_id', $user_id);
        // }
        $i->orderBy('u.id','DESC');
        $package = $i->get();
        
        return Datatables::of($package)
            ->addColumn('customer', function ($package) {
                $user = User::find($package->user_id);
                if(!empty($user)){
                    return '<td>
                    <p>Name : '.$user->first_name.' '.$user->last_name.'</p>
                    <p>Mobile : '.$user->mobile.'</p>
                    </td>';
                }
            })

			->addColumn('package', function ($package) {
                return '<td>
                <p>'.$package->package_name.'</p>
                </td>';
            })

            ->addColumn('price', function ($package) {
                return '<td>
                <p>AED '.$package->price.'</p>
                </td>';
            })

            ->addColumn('apply_date', function ($package) {
                return '<td>
                <p>'.$package->apply_date.'</p>
                </td>';
            })

            ->addColumn('expire_date', function ($package) {
                return '<td>
                <p>'.$package->expire_date.'</p>
                </td>';
            })

            ->addColumn('no_of_days', function ($package) {
                return '<td>
                <p>No of Days : '.$package->no_of_days.'</p>
                </td>';
            })

            ->addColumn('status', function ($package) {
                if($package->status == 0){
                    return 'Active';
                }
                elseif($package->status == 1){
                    return 'DeActive';
                }
            })           
            
        ->rawColumns(['customer','apply_date','expire_date', 'no_of_days', 'status','package','price'])
        ->addIndexColumn()
        ->make(true);
    }


    public function getvisitorlogs($fdate,$tdate,$user_id,$category){
        $fdate1 = date('Y-m-d', strtotime($fdate));
        $tdate1 = date('Y-m-d', strtotime($tdate));

        $i =DB::table('post_counts as p');
        if ( $fdate1 && $fdate != '1' && $tdate1 && $tdate != '1' )
        {
            $i->whereBetween('p.date', [$fdate1, $tdate1]);
        }
        if ( $user_id != 'user' )
        {
            $i->where('p.user_id', $user_id);
        }
        if ( $category != 'category' )
        {
            $i->where('p.category', $category);
        }
        $i->orderBy('p.id','DESC');
        $post_count = $i->get();
        
        return Datatables::of($post_count)
            ->addColumn('customer', function ($post_count) {
                $user = User::find($post_count->user_id);
                if(!empty($user)){
                    return '<td>
                    <p>Name : '.$user->first_name.' '.$user->last_name.'</p>
                    <p>Mobile : '.$user->mobile.'</p>
                    </td>';
                }
            })

            ->addColumn('post', function ($post_count) {
                $post_ad = post_ad::find($post_count->post_id);
                if(!empty($post_ad)){
                    return '<td>
                    <p>'.$post_ad->title.'</p>
                    </td>';
                }
            })

            ->addColumn('category', function ($post_count) {
                $category = category::find($post_count->category);
                if(!empty($category)){
                    return '<td>
                    <p>'.$category->category.'</p>
                    </td>';
                }
            })

            ->addColumn('date', function ($post_count) {
                return '<td>
                <p>'.date('d-m-Y',strtotime($post_count->date)).'</p>
                <p>'.date('h:i A',strtotime($post_count->created_at)).'</p>
                </td>';
            })

            ->addColumn('ip', function ($post_count) {
                return '<td>
                <p>'.$post_count->visitor_ip.'</p>
                </td>';
            })
            
        ->rawColumns(['customer','ip','date', 'post', 'category'])
        ->addIndexColumn()
        ->make(true);
    }


}
