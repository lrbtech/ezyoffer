<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\post_ad;
use App\Models\post_ad_image;
use App\Models\category;
use Yajra\DataTables\Facades\DataTables;
use Auth;
use DB;
use Mail;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        date_default_timezone_set("Asia/Dubai");
        date_default_timezone_get();
    }

    public function postads(){
        return view('admin.post_ads');
    }

    public function deletepostads($id,$status){
        $post_ad = post_ad::find($id);
        $post_ad->admin_status = $status;
        $post_ad->save();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }

    public function getpostads(){
        $post_ad = post_ad::orderBy('id','DESC')->get();
        
        return Datatables::of($post_ad)
            ->addColumn('customer', function ($post_ad) {
                $user = User::find($post_ad->customer_id);
                return '<td>
                <p>Name : '.$user->first_name.' '.$user->last_name.'</p>
                <p>Mobile : '.$user->mobile.'</p>
                </td>';
            })

			->addColumn('category', function ($post_ad) {
				$category = category::find($post_ad->category);
				$subcategory = category::find($post_ad->subcategory);
                return '<td>
                <p>Category : '.$category->category.'</p>
                <p>SubCategory : '.$subcategory->category.'</p>
                </td>';
            })

            ->addColumn('post_details', function ($post_ad) {
                return '<td>
                <p>Mobile : '.$post_ad->mobile.'</p>
                <p>email : '.$post_ad->email.'</p>
                </td>';
            })

            ->addColumn('post_image', function ($post_ad) {
                return '<td>
                <img style="width:80px;" src="/upload_image/'.$post_ad->image.'">
                </td>';
            })

            ->addColumn('status', function ($post_ad) {
                if($post_ad->status == 0){
                    return 'Active';
                }
                elseif($post_ad->status == 1){
                    return 'DeActive';
                }
                elseif($post_ad->status == 2){
                    return 'Featured';
                }
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
                    </div>
                </td>';
            })
           
            
        ->rawColumns(['customer','post_details','post_image', 'category', 'status','action'])
        ->addIndexColumn()
        ->make(true);

        //return Datatables::of($orders) ->addIndexColumn()->make(true);
    }

}
