<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\post_ad;
use App\Models\post_ad_image;
use App\Models\category;
use App\Models\User;
use App\Models\favourite_post;
use App\Models\chat;
use App\Models\language;
use Auth;
use DB;
use Mail;
use Hash;
use Carbon\Carbon;
use App\Events\MessageSent;

class OfferController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        date_default_timezone_set("Asia/Dubai");
        date_default_timezone_get();
        session(['lang'=>'english']);
    }

    public function offers(){
        $chat_from =DB::table('chats as c')
        ->where('c.to_id',Auth::user()->id)
        ->where('c.chat_offer',1)
        ->select(DB::raw("c.sender_id as sender_id") , DB::raw("c.post_id as post_id") , DB::raw("c.chat_offer as chat_offer"))
        ->groupBy('c.sender_id','c.post_id','c.chat_offer')
        ->get();

        $chat_to =DB::table('chats as c')
        ->where('c.sender_id',Auth::user()->id)
        ->where('c.chat_offer',1)
        ->select(DB::raw("c.to_id as to_id") , DB::raw("c.post_id as post_id") , DB::raw("c.chat_offer as chat_offer"))
        ->groupBy('c.to_id','c.post_id','c.chat_offer')
        ->get();

        $arraydata=array();
        $datas=array();
        foreach($chat_to as $key => $value){
            $arraydata[]=$value->post_id;
            $data = array(
                'id' => $value->to_id,
                'post_id' => $value->post_id,
            );
            $datas[] = $data;
        }
        foreach ($chat_from as $key => $value) {
            if(in_array($value->post_id , $arraydata))
            {
            }else{
                $arraydata[] = $value->sender_id;
                $data = array(
                    'id' => $value->sender_id,
                    'post_id' => $value->post_id,
                );
                $datas[] = $data;
            }
        } 
        
        $category = category::where('parent_id',0)->where('status',0)->get();
    	$subcategory = category::where('parent_id','!=',0)->where('status',0)->get();
        $language = language::all();

        return view('customers.offers',compact('category','subcategory','datas','language'));
    }

    public function offersnotification($user_id,$post_id){
        $chat_from =DB::table('chats as c')
        ->where('c.to_id',Auth::user()->id)
        ->where('c.chat_offer',1)
        ->select(DB::raw("c.sender_id as sender_id") , DB::raw("c.post_id as post_id") , DB::raw("c.chat_offer as chat_offer"))
        ->groupBy('c.sender_id','c.post_id','c.chat_offer')
        ->get();

        $chat_to =DB::table('chats as c')
        ->where('c.sender_id',Auth::user()->id)
        ->where('c.chat_offer',1)
        ->select(DB::raw("c.to_id as to_id") , DB::raw("c.post_id as post_id") , DB::raw("c.chat_offer as chat_offer"))
        ->groupBy('c.to_id','c.post_id','c.chat_offer')
        ->get();

        $arraydata=array();
        $datas=array();
        foreach($chat_to as $key => $value){
            $arraydata[]=$value->post_id;
            $data = array(
                'id' => $value->to_id,
                'post_id' => $value->post_id,
            );
            $datas[] = $data;
        }
        foreach ($chat_from as $key => $value) {
            if(in_array($value->post_id , $arraydata))
            {
            }else{
                $arraydata[] = $value->sender_id;
                $data = array(
                    'id' => $value->sender_id,
                    'post_id' => $value->post_id,
                );
                $datas[] = $data;
            }
        } 

        $get_offers = DB::table('chats')
        ->where([
            ['sender_id',$user_id],
            ['to_id',Auth::user()->id],
            ['post_id',$post_id],
            ['chat_offer',1],
            ['read_status',0],
        ])
        ->get();

        foreach($get_offers as $row){
            $chat = chat::find($row->id);
            $chat->read_status = 1;
            $chat->save();
        }
        
        $category = category::where('parent_id',0)->where('status',0)->get();
    	$subcategory = category::where('parent_id','!=',0)->where('status',0)->get();
        $language = language::all();

        return view('customers.offers_notification',compact('category','subcategory','datas','user_id','post_id','language'));
    }

    public function saveoffercustomer(Request $request){
        $this->validate($request, [
            'msg'=>'required',
          ],[
            'msg.required' => 'Message Feild is Required',
        ]);
        $chat = new chat;
        $chat->date = date('Y-m-d');
        $chat->msg = $request->msg;
        $chat->sender_id = Auth::user()->id;
        $chat->to_id = $request->to_id;
        $chat->post_id = $request->post_id;
        //$chat->chat_offer = $request->chat_offer;
        $chat->chat_offer = 1;
        $chat->save();

        return response()->json(['message' => 'Save Offer Successfully!','user_id'=>$request->to_id,'post_id'=>$request->post_id],200); 
    }

    public static function offeruserslist($id,$post_id) {
        $user = User::find($id);
        $post = post_ad::find($post_id);
        //ps-dot

        $getnewofferscount = DB::table('chats')
        ->where([
            ['sender_id',$id],
            ['to_id',Auth::user()->id],
            ['post_id',$post_id],
            ['chat_offer',1],
            ['read_status',0],
        ])
        ->count();
        
        $output='
        <div class="chatclass discussion" id="'.$user->id.''.$post_id.'" value="'.$user->id.''.$post_id.'" onclick="viewChat('.$user->id.','.$post_id.')">';
            if($user->profile_image != ''){
            $output.='<div class="photo" style="background-image: url(/upload_profile_image/'.$user->profile_image.');">
            </div>';
            }
            else{
            $output.='<div class="photo" style="background-image: url(/assets/images/icons/user-icon.png);">
            </div>';
            }
            $output.='<div class="desc-contact">
                <p class="name">'.$user->first_name.' '.$user->last_name.'</p>';
                if(!empty($post)){
                    $output.='<p class="message">'.$post->title.'</p>';
                }
            $output.='</div>
            <div class="timer">'.$getnewofferscount.'</div>
        </div>';
        echo $output;
    }

    public function getnewofferscount($user_id,$post_id){
        $getnewofferscount = DB::table('chats')
        ->where([
            ['sender_id',$user_id],
            ['to_id',Auth::user()->id],
            ['post_id',$post_id],
            ['chat_offer',1],
            ['read_status',0],
        ])
        ->count();
        return response()->json($getnewofferscount); 
    }

    public function getoffer($user_id,$post_id){
        $chat = DB::table('chats')
        ->where([
            ['sender_id',$user_id],
            ['to_id',Auth::user()->id],
            ['post_id',$post_id],
            ['chat_offer',1],
        ])
        ->orWhere([
            ['sender_id',Auth::user()->id],
            ['to_id',$user_id],
            ['post_id',$post_id],
            ['chat_offer',1],
        ])
        ->get();

        $get_chat = DB::table('chats')
        ->where([
            ['sender_id',$user_id],
            ['to_id',Auth::user()->id],
            ['post_id',$post_id],
            ['chat_offer',1],
            ['read_status',0],
        ])
        ->get();

        foreach($get_chat as $row){
            $chat = chat::find($row->id);
            $chat->read_status = 1;
            $chat->save();
        }

        $user = User::find($user_id);
        $post = post_ad::find($post_id);
  
        date_default_timezone_set("Asia/Dubai");
        date_default_timezone_get();
        $output='
        <div class="header-chat">
        <i class="icon fas fa-user" aria-hidden="true"></i>
        <p class="name">'.$user->first_name.' '.$user->last_name.'
        <br><span style="font-size:14px !important;">('.$post->title.')</span></p>
        <b class="right">Price: '.$post->price.' AED</b>
        </div>
        <div id="new_chat" style="height:530px;overflow:scroll;" class="messages-chat">';
            foreach($chat as $row){
                $dateTime = new Carbon($row->created_at, new \DateTimeZone('Asia/Dubai'));
                if($row->to_id == $user_id && $row->sender_id == Auth::user()->id){
                $output.='
                <div class="message text-only">
                    <div class="response">
                        <p class="text"> '.$row->msg.' </p>
                    </div>
                </div>
                ';
                }
                elseif($row->sender_id == $user_id && $row->to_id == Auth::user()->id){
                $output.='
                <div class="message">';
                    if($user->profile_image != ''){
                    $output.='<div class="photo" style="background-image: url(/upload_profile_image/'.$user->profile_image.');">
                    </div>';
                    }
                    else{
                    $output.='<div class="photo" style="background-image: url(/assets/images/icons/user-icon.png);">
                    </div>';
                    }
                    $output.='<p class="text"> '.$row->msg.' </p>
                </div>
                <p class="time"> '.$dateTime->diffForHumans().'</p>';
                }
            }
        $output.='</div>
        <div class="footer-chat">
            '.csrf_field().'
            <input value="'.$user_id.'" type="hidden" name="to_id" id="to_id">
            <input value="'.$post_id.'" type="hidden" name="post_id" id="post_id">
            <input name="msg" id="msg" type="text" class="write-message" placeholder="Type your message here"></input>
            <i onclick="SendChat()" class="icon send fas fa-paper-plane clickable" aria-hidden="true"></i>
            <!-- <i class="fas fa-paperclip clickable attach-icon" aria-hidden="true"></i>
            <i class="fas fa-cog clickable settings-icon" aria-hidden="true"></i> -->
        </div>';        
        return response()->json(['html'=>$output,'user_id'=>$user_id],200); 
    }


    public function reloadoffer($user_id,$post_id){
        $chat = DB::table('chats')
        ->where([
            ['sender_id',$user_id],
            ['to_id',Auth::user()->id],
            ['post_id',$post_id],
            ['chat_offer',1],
        ])
        ->orWhere([
            ['sender_id',Auth::user()->id],
            ['to_id',$user_id],
            ['post_id',$post_id],
            ['chat_offer',1],
        ])
        ->get();

        $get_chat = DB::table('chats')
        ->where([
            ['sender_id',$user_id],
            ['to_id',Auth::user()->id],
            ['post_id',$post_id],
            ['chat_offer',1],
            ['read_status',0],
        ])
        ->get();

        foreach($get_chat as $row){
            $chat = chat::find($row->id);
            $chat->read_status = 1;
            $chat->save();
        }

        $user = User::find($user_id);
  
        date_default_timezone_set("Asia/Dubai");
        date_default_timezone_get();
        $output='';
        foreach($chat as $row){
            $dateTime = new Carbon($row->created_at, new \DateTimeZone('Asia/Dubai'));
            if($row->to_id == $user_id && $row->sender_id == Auth::user()->id){
            $output.='
            <div class="message text-only">
                <div class="response">
                    <p class="text"> '.$row->msg.' </p>
                </div>
            </div>
            ';
            }
            elseif($row->sender_id == $user_id && $row->to_id == Auth::user()->id){
            $output.='
            <div class="message">';
                if($user->profile_image != ''){
                $output.='<div class="photo" style="background-image: url(/upload_profile_image/'.$user->profile_image.');">
                </div>';
                }
                else{
                $output.='<div class="photo" style="background-image: url(/assets/images/icons/user-icon.png);">
                </div>';
                }
                $output.='<p class="text"> '.$row->msg.' </p>
            </div>
            <p class="time"> '.$dateTime->diffForHumans().'</p>';
            }
        }        
        return response()->json(['html'=>$output,'user_id'=>$user_id],200); 
    }


}
