<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\post_ad;
use App\Models\post_ad_image;
use App\Models\category;
use App\Models\User;
use App\Models\favourite_post;
use App\Models\admin_customer;
use App\Models\chat;
use App\Models\language;
use Auth;
use DB;
use Mail;
use Hash;
use Carbon\Carbon;
use Image;
use App\Events\MessageSent;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        date_default_timezone_set("Asia/Dubai");
        date_default_timezone_get();
    }

    public function chat(){
        $chat_from =DB::table('chats as c')
        ->where('c.to_id',Auth::user()->id)
        // ->where('c.chat_offer',0)
        ->select(DB::raw("c.sender_id as sender_id") , DB::raw("c.post_id as post_id"))
        ->groupBy('c.sender_id','c.post_id')
        ->get();

        $chat_to =DB::table('chats as c')
        ->where('c.sender_id',Auth::user()->id)
        // ->where('c.chat_offer',0)
        ->select(DB::raw("c.to_id as to_id") , DB::raw("c.post_id as post_id") )
        ->groupBy('c.to_id','c.post_id')
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

        return view('customers.chat',compact('category','subcategory','datas','language'));
    }

    public function chatnotification($user_id,$post_id){
        $chat_from =DB::table('chats as c')
        ->where('c.to_id',Auth::user()->id)
        // ->where('c.chat_offer',0)
        ->select(DB::raw("c.sender_id as sender_id") , DB::raw("c.post_id as post_id") , DB::raw("c.chat_offer as chat_offer"))
        ->groupBy('c.sender_id','c.post_id','c.chat_offer')
        ->get();

        $chat_to =DB::table('chats as c')
        ->where('c.sender_id',Auth::user()->id)
        // ->where('c.chat_offer',0)
        ->select(DB::raw("c.to_id as to_id") , DB::raw("c.post_id as post_id"))
        ->groupBy('c.to_id','c.post_id')
        ->get();

        $arraydata=array();
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

        $get_chat = DB::table('chats')
        ->where([
            ['sender_id',$user_id],
            ['to_id',Auth::user()->id],
            ['post_id',$post_id],
            // ['chat_offer',0],
            ['read_status',0],
        ])
        ->get();

        foreach($get_chat as $row){
            $chat = chat::find($row->id);
            $chat->read_status = 1;
            $chat->save();
        }
        
        $category = category::where('parent_id',0)->where('status',0)->get();
    	$subcategory = category::where('parent_id','!=',0)->where('status',0)->get();
        $language = language::all();

        return view('customers.chat_notification',compact('category','subcategory','datas','user_id','post_id','language'));
    }

    public static function chatuserslist($id,$post_id) {
        $user = User::find($id);
        $post = post_ad::find($post_id);
        //ps-dot

        $getnewchatcount = DB::table('chats')
        ->where([
            ['sender_id',$id],
            ['to_id',Auth::user()->id],
            ['post_id',$post_id],
            //['chat_offer',0],
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
            <div class="timer">'.$getnewchatcount.'</div>
        </div>';
        echo $output;
    }

    public function viewchat($id){
        if($id == 0){
            $post_ad =DB::table('chats as c')
            ->where('c.sender_id',Auth::user()->id)
            ->orWhere('c.to_id',Auth::user()->id)
            ->select(DB::raw("c.post_id as chat_post_id"))
            ->groupBy('c.post_id')
            ->get();

            $category = category::where('parent_id',0)->where('status',0)->get();
            $subcategory = category::where('parent_id','!=',0)->where('status',0)->get();
            $language = language::all();

            return view('customers.chat',compact('category','subcategory','post_ad','language'));
        }
        else{
            $post = post_ad::find($id);
            if($post->customer_id == Auth::user()->id){
                $post_sender_id =DB::table('chats as c')
                ->where('c.post_id',$id)
                ->select(DB::raw("c.sender_id as sender_id"))
                ->groupBy('c.sender_id')
                ->get();
            }
            else{
                $post_sender_id =DB::table('chats as c')
                ->where('c.post_id',$id)
                ->where('c.sender_id',Auth::user()->id)
                ->select(DB::raw("c.sender_id as sender_id"))
                ->groupBy('c.sender_id')
                ->get();
            }

            $post_ad =DB::table('chats as c')
            ->where('c.sender_id',Auth::user()->id)
            ->orWhere('c.to_id',Auth::user()->id)
            ->select(DB::raw("c.post_id as chat_post_id"))
            ->groupBy('c.post_id')
            ->get();

            $default_post = $id;

            $category = category::where('parent_id',0)->where('status',0)->get();
            $subcategory = category::where('parent_id','!=',0)->where('status',0)->get();

            $language = language::all();
            return view('customers.view_chat',compact('category','subcategory','post_sender_id','post_ad','default_post','language'));
        }
    }

    public function savechatview($id,$msg){
        $post = post_ad::find($id);
        $chat = new chat;
        $chat->date = date('Y-m-d');
        $chat->msg = $msg;
        $chat->sender_id = Auth::user()->id;
        $chat->post_id = $id;
        $chat->chat_offer = 0;
        $chat->to_id = $post->customer_id;
        $chat->save();

        return response()->json(['message' => 'Save Chat Successfully!'], 200);
    }


    public function saveoffer(Request $request){
        $this->validate($request, [
            'asking_price'=>'required',
          ],[
            'asking_price.required' => 'Required',
        ]);
        $post = post_ad::find($request->offer_post_id);
        $chat = new chat;
        $chat->date = date('Y-m-d');
        $chat->msg = $request->asking_price;
        $chat->sender_id = Auth::user()->id;
        $chat->post_id = $request->offer_post_id;
        //$chat->chat_offer = 1;
        $chat->to_id = $post->customer_id;
        $chat->save();

        return response()->json(['message' => 'Save Chat Successfully!'], 200);
    }

    public function savechatcustomer(Request $request){
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
        $chat->chat_type = 0;
        $chat->chat_offer = 0;
        $chat->save();

        return response()->json(['message' => 'Save Chat Successfully!','user_id'=>$request->to_id,'post_id'=>$request->post_id],200); 
    }

    public function chatuploaddocument(Request $request){
        $this->validate($request, [
            'upload_files'=>'required|max:1000',
          ],[
            //'upload_files.mimes' => 'Only jpeg,jpg,png,pdf,docx files are allowed',
            'upload_files.required' => 'Upload File is Required',
            'upload_files.max' => 'Sorry! Maximum allowed size for an files is 1MB',
        ]);
        $chat = new chat;
        $chat->date = date('Y-m-d');
        $chat->sender_id = Auth::user()->id;
        $chat->to_id = $request->to_id;
        $chat->post_id = $request->post_id;
        $chat->chat_type = 1;
        $chat->chat_offer = 0;
        
        if($request->upload_files!=""){            
            $upload_files = $request->file('upload_files');
            $input['newfilename'] = rand().time().'.'.$upload_files->getClientOriginalExtension();
        
            $destinationPath = public_path('/chat_files');
            $img = Image::make($upload_files->getRealPath());
            // $img->resize(1200, 600, function ($constraint) {
            //     $constraint->aspectRatio();
            // })->insert('images/logo.png','bottom-right', 50, 30)
            $img->save($destinationPath.'/'.$input['newfilename']);
    
            $chat->file_extension = $upload_files->getClientOriginalExtension();
            $chat->file_name = $_FILES['upload_files']['name'];;
            $chat->upload_files = $input['newfilename'];
        }

        $chat->save();

        return response()->json(['message' => 'Save Chat Successfully!','user_id'=>$request->to_id,'post_id'=>$request->post_id],200); 
    }

    public function getnewchatcount($user_id,$post_id){
        $getnewchatcount = DB::table('chats')
        ->where([
            ['sender_id',$user_id],
            ['to_id',Auth::user()->id],
            ['post_id',$post_id],
            // ['chat_offer',0],
            ['read_status',0],
        ])
        ->count();
        return response()->json($getnewchatcount); 
    }

    public function getchat($user_id,$post_id){
        $get_chat = DB::table('chats')
        ->where([
            ['sender_id',$user_id],
            ['to_id',Auth::user()->id],
            ['post_id',$post_id],
            // ['chat_offer',0],
            ['read_status',0],
        ])
        ->get();

        foreach($get_chat as $row){
            $upchat = chat::find($row->id);
            $upchat->read_status = 1;
            $upchat->save();
        }
        
        $chat = DB::table('chats')
        ->where([
            ['sender_id',$user_id],
            ['to_id',Auth::user()->id],
            ['post_id',$post_id],
            // ['chat_offer',0],
        ])
        ->orWhere([
            ['sender_id',Auth::user()->id],
            ['to_id',$user_id],
            ['post_id',$post_id],
            // ['chat_offer',0],
        ])
        ->get();

        $user = User::find($user_id);
        $post = post_ad::find($post_id);
  
        date_default_timezone_set("Asia/Dubai");
        date_default_timezone_get();
$output='
<div class="header-chat">
<i class="icon fas fa-user" aria-hidden="true"></i>
<p class="name">'.$user->first_name.' '.$user->last_name.'
<br><span style="font-size:14px !important;">('.$post->title.')</span></p>

<div style="margin-left:20px !important;" class="searchbar">
    <b class="right">Price: '.$post->price.' AED</b>
    <br>
    <i class="fa fa-search" aria-hidden="true"></i>
    <input autocomplete="off" id="search_text" type="text" placeholder="Search..."></input>
</div>
</div>
<div id="new_chat" style="height:530px;overflow:scroll;" class="messages-chat">';
    foreach($chat as $row){
        $dateTime = new Carbon($row->created_at, new \DateTimeZone('Asia/Dubai'));
        if($row->to_id == $user_id && $row->sender_id == Auth::user()->id){
        $output.='
        <div class="message message1 text-only">
            <div class="response">';
                if($row->chat_type == 0){
                    $output.='<p class="text"> '.$row->msg.' </p>';
                }
                else{
                    $output.='<a download href="/chat_files/'.$row->upload_files.'" class="buttonDownload">'.$row->file_name.'</a>';
                }
            $output.='</div>
        </div>
        ';
        }
        elseif($row->sender_id == $user_id && $row->to_id == Auth::user()->id){
        $output.='
        <div class="message message1">';
            if($user->profile_image != ''){
            $output.='<div class="photo" style="background-image: url(/upload_profile_image/'.$user->profile_image.');">
            </div>';
            }
            else{
            $output.='<div class="photo" style="background-image: url(/assets/images/icons/user-icon.png);">
            </div>';
            }
            if($row->chat_type == 0){
                $output.='<p class="text"> '.$row->msg.' </p>';
            }
            else{
                $output.='<a download href="/chat_files/'.$row->upload_files.'" class="buttonDownload">'.$row->file_name.'</a>';
            }
        $output.='</div>
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
    <a data-toggle="modal" data-target="#documentmodal" href="javascript:void(0)"><i style="right:45px;font-size: 24px;" class="fas fa-paperclip clickable attach-icon" aria-hidden="true"></i></a>
    <!--<i class="fas fa-cog clickable settings-icon" aria-hidden="true"></i>-->
</div>
<script src="/assets/js/jquery.js"></script>
<script type="text/javascript">
$("#search_text").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".message1").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
    $(".time").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
});
</script>
';
          
        return response()->json(['html'=>$output,'user_id'=>$user_id],200); 
    }


    public function reloadchat($user_id,$post_id){
        $get_chat = DB::table('chats')
        ->where([
            ['sender_id',$user_id],
            ['to_id',Auth::user()->id],
            ['post_id',$post_id],
            // ['chat_offer',0],
            ['read_status',0],
        ])
        ->get();

        foreach($get_chat as $row){
            $upchat = chat::find($row->id);
            $upchat->read_status = 1;
            $upchat->save();
        }

        $chat = DB::table('chats')
        ->where([
            ['sender_id',$user_id],
            ['to_id',Auth::user()->id],
            ['post_id',$post_id],
            // ['chat_offer',0],
        ])
        ->orWhere([
            ['sender_id',Auth::user()->id],
            ['to_id',$user_id],
            ['post_id',$post_id],
            // ['chat_offer',0],
        ])
        ->get();

        $user = User::find($user_id);
  
        date_default_timezone_set("Asia/Dubai");
        date_default_timezone_get();
        $output='';
        foreach($chat as $row){
            $dateTime = new Carbon($row->created_at, new \DateTimeZone('Asia/Dubai'));
            if($row->to_id == $user_id && $row->sender_id == Auth::user()->id){
            $output.='
            <div class="message message1 text-only">
                <div class="response">';
                if($row->chat_type == 0){
                    $output.='<p class="text"> '.$row->msg.' </p>';
                }
                else{
                    $output.='<a download href="/chat_files/'.$row->upload_files.'" class="buttonDownload">'.$row->file_name.'</a>';
                }
                $output.='</div>
            </div>
            ';
            }
            elseif($row->sender_id == $user_id && $row->to_id == Auth::user()->id){
            $output.='
            <div class="message message1">';
                if($user->profile_image != ''){
                $output.='<div class="photo" style="background-image: url(/upload_profile_image/'.$user->profile_image.');">
                </div>';
                }
                else{
                $output.='<div class="photo" style="background-image: url(/assets/images/icons/user-icon.png);">
                </div>';
                }
                if($row->chat_type == 0){
                    $output.='<p class="text"> '.$row->msg.' </p>';
                }
                else{
                    $output.='<a download href="/chat_files/'.$row->upload_files.'" class="buttonDownload">'.$row->file_name.'</a>';
                }
            $output.='</div>
            <p class="time"> '.$dateTime->diffForHumans().'</p>';
            }
        }

        return response()->json(['html'=>$output,'user_id'=>$user_id],200); 
    }

    public function chatadmin(){
        $chat_admin = DB::table('admin_customers')
        ->where([
            ['customer_id',Auth::user()->id],
        ])
        ->get();
        $language = language::all();
        return view('customers.chat_admin',compact('chat_admin','language'));
    }

    public function savechatadmin(Request $request){
        $request->validate([
            'message'=>'required',
        ]);
        date_default_timezone_set("Asia/Dubai");
        date_default_timezone_get();
        $admin_customer = new admin_customer;
        $admin_customer->message = $request->message;
        $admin_customer->customer_id = Auth::user()->id;
        $admin_customer->date = date('Y-m-d');
        $admin_customer->time = date('h:i A');
        $admin_customer->message_from = 0;
        $admin_customer->save();
        $dateTime = new Carbon($admin_customer->created_at, new \DateTimeZone('Asia/Dubai'));
  
        return response()->json(Auth::user()->id); 
    }

    public function getnewchatadmincount(){
        $getnewchatcount = DB::table('admin_customers')
        ->where([
            ['customer_id',Auth::user()->id],
            ['read_status',0],
        ])
        ->count();
        return response()->json($getnewchatcount); 
    }

    public function reloadchatadmin(){
        $get_chat = DB::table('admin_customers')
        ->where([
            ['customer_id',Auth::user()->id],
            ['read_status',0],
        ])
        ->get();

        foreach($get_chat as $row){
            $upchat = admin_customer::find($row->id);
            $upchat->read_status = 1;
            $upchat->save();
        }

        $chat = DB::table('admin_customers')
        ->where([
            ['customer_id',Auth::user()->id],
        ])
        ->get();

  
        date_default_timezone_set("Asia/Dubai");
        date_default_timezone_get();
        $output='';
        foreach($chat as $row){
            $dateTime = new Carbon($row->created_at, new \DateTimeZone('Asia/Dubai'));
            if($row->message_from == 0){
            $output.='
            <div class="message text-only">
                <div class="response">
                    <p class="text"> '.$row->message.' </p>
                </div>
            </div>
            ';
            }
            elseif($row->message_from == 1){
            $output.='
            <div class="message">';
                $output.='<div class="photo" style="background-image: url(/assets/images/icons/user-icon.png);">
                </div>';
                $output.='<p class="text"> '.$row->message.' </p>
            </div>
            <p class="time"> '.$dateTime->diffForHumans().'</p>';
            }
        }

        return response()->json(['html'=>$output],200); 
    }


}
