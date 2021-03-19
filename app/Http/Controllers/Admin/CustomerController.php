<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use Auth;
use DB;
use Mail;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function allcustomer(){
        return view('admin.allcustomer');
    }

    public function deletecustomer($id,$status){
        $user = User::find($id);
        $user->status = $status;
        $user->save();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }

    public function getallcustomer(){
        $customer = User::orderBy('id','DESC')->get();
        
        return Datatables::of($customer)
            ->addColumn('name', function ($customer) {
                    return '<td>'.$customer->first_name.' '.$customer->last_name.'</td>';
            })

            ->addColumn('mobile', function ($customer) {
                return '<td>
                <p>Mobile : '.$customer->mobile.'</p>
                <p>Whatsapp : '.$customer->whatsapp.'</p>
                </td>';
            })

            ->addColumn('email', function ($customer) {
                return '<td>'.$customer->email.'</td>';
            })

            ->addColumn('status', function ($customer) {
                if($customer->status == 0){
                    return 'Active';
                }
                else{
                    return 'DeActive';
                }
            })

            ->addColumn('action', function ($customer) {
                $output='';
                if($customer->status == 0){
                    $output.='<a onclick="Delete('.$customer->id.',1)" class="dropdown-item" href="#">DeActive</a>';
                }
                elseif($customer->status == 1){
                    $output.='<a onclick="Delete('.$customer->id.',0)" class="dropdown-item" href="#">Active</a>';
                }
                return '<td>
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(140px, 183px, 0px); top: 0px; left: 0px; will-change: transform;">
                        '.$output.'
                    </div>
                </td>';
            })
           
            
        ->rawColumns(['name','mobile', 'email', 'status','action'])
        ->addIndexColumn()
        ->make(true);

        //return Datatables::of($orders) ->addIndexColumn()->make(true);
    }


}
