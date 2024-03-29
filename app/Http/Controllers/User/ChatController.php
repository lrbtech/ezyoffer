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
use App\Models\settings;
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
        session(['lang'=>'english']);
    }

    public function chatfrompost($user_id,$post_id){        
        $category = category::where('parent_id',0)->where('status',0)->get();
    	$subcategory = category::where('parent_id','!=',0)->where('status',0)->get();
        $language = language::all();
        $chat_user_id=$user_id;
        $chat_post_id=$post_id;

        return view('customers.chat',compact('category','subcategory','language','chat_user_id','chat_post_id'));
    }

    public function chat(){
        $category = category::where('parent_id',0)->where('status',0)->get();
    	$subcategory = category::where('parent_id','!=',0)->where('status',0)->get();
        $language = language::all();
        $chat_user_id=0;
        $chat_post_id=0;

        return view('customers.chat',compact('category','subcategory','language','chat_user_id','chat_post_id'));
    }


    public static function getallchatusers(){
        $chat_from =DB::table('chats as c')
        ->where('c.to_id',Auth::user()->id)
        ->join('post_ads as p', 'p.id', '=', 'c.post_id')
        ->where('p.customer_id',Auth::user()->id)
        // ->where('c.chat_offer',0)
        ->select(DB::raw("c.sender_id as sender_id") , DB::raw("c.post_id as post_id") )
        //->select(DB::raw("c.sender_id as sender_id") , DB::raw("c.post_id as post_id") , DB::raw("c.id as order_id") )
        ->orderBy('c.id','DESC')
        ->groupBy('c.sender_id','c.post_id')
        //->groupBy('c.sender_id','c.post_id','c.id')
        ->get();

        $chat_to =DB::table('chats as c')
        ->where('c.sender_id',Auth::user()->id)
        ->join('post_ads as p', 'p.id', '=', 'c.post_id')
        ->where('p.customer_id','!=',Auth::user()->id)
        // ->where('c.chat_offer',0)
        ->select(DB::raw("c.to_id as to_id") , DB::raw("c.post_id as post_id")  )
        //->select(DB::raw("c.to_id as to_id") , DB::raw("c.post_id as post_id") , DB::raw("c.id as order_id")  )
        ->orderBy('c.id','DESC')
        ->groupBy('c.to_id','c.post_id')
        //->groupBy('c.to_id','c.post_id','c.id')
        ->get();

        $datas=array();
        foreach($chat_from as $key => $value){
            $data = array(
                //'order_id' => $value->order_id,
                'id' => $value->sender_id,
                'post_id' => $value->post_id,
            );
            $datas[] = $data;
        }
        foreach($chat_to as $key => $value){
            $data = array(
                //'order_id' => $value->order_id,
                'id' => $value->to_id,
                'post_id' => $value->post_id,
            );
            $datas[] = $data;
        }

        // array_multisort(array_column($datas, 'order_id'), SORT_DESC, $datas);
        // $result = collect($datas)
        // ->groupBy('post_id')
        // ->map(function ($item) {
        //     return array_merge(...$item->toArray());
        // })
        // ->values()
        // ->toArray();

        // $result = collect($datas)->groupBy('post_id');

        // return response()->json($result); 

        //print_r($result);

        

        $output='';
        foreach($datas as $row){
            $getnewchatcount = DB::table('chats')
            ->where([
                ['sender_id',$row['id']],
                ['to_id',Auth::user()->id],
                ['post_id',$row['post_id']],
                //['chat_offer',0],
                ['read_status',0],
            ])
            ->count();
            if($getnewchatcount > 0){
                $output.=\App\Http\Controllers\User\ChatController::chatuserslist($row['id'],$row['post_id']);
            }
        }
        foreach($datas as $row){
            $getnewchatcount = DB::table('chats')
            ->where([
                ['sender_id',$row['id']],
                ['to_id',Auth::user()->id],
                ['post_id',$row['post_id']],
                //['chat_offer',0],
                ['read_status',0],
            ])
            ->count();
            if($getnewchatcount == 0){
                $output.=\App\Http\Controllers\User\ChatController::chatuserslist($row['id'],$row['post_id']);
            }
        }
        

        // $output='';
        // foreach($result as $row){
        //     $output.=\App\Http\Controllers\User\ChatController::chatuserslist($row->id,$row['post_id']);
        // }
        
        echo $output;

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
            $output.='<div class="photo" style="background-image: url(/upload_profile_image/'.$user->profile_image.');">';
            if($getnewchatcount > 0){
                $output.='<div class="chat_count">
                <center>'.$getnewchatcount.'</center>
                </div>';
            }
            $output.='</div>';
            }
            else{
            $output.='<div class="photo" style="background-image: url(/assets/images/icons/user-icon.png);">';
            if($getnewchatcount > 0){
                $output.='<div class="chat_count">
                <center>'.$getnewchatcount.'</center>
                </div>';
            }
            $output.='</div>';
            }
            $output.='<div class="desc-contact">
                <p class="name">'.$user->first_name.' '.$user->last_name.'</p>';
                if(!empty($post)){
                    $output.='<p class="message">'.$post->title.'</p>';
                }
            $output.='</div>
            <div onclick="ChatDelete('.$user->id.','.$post_id.')" class="timer"><i class="fas fa-trash"></i></div>
        </div>';
        echo $output;
        // <div class="timer">'.$getnewchatcount.'</div>
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

    public function chatdelete($user_id,$post_id){
        $chat = chat::where('post_id',$post_id)->where('sender_id',$user_id)->where('to_id',Auth::user()->id)->delete();

        $chat1 = chat::where('post_id',$post_id)->where('sender_id',Auth::user()->id)->where('to_id',$user_id)->delete();

        return response()->json(['message' => 'Chat Deleted Successfully!'], 200);
    }

    public function chatbulkdelete(Request $request)
    {
        $arraydata=array();
        foreach($request->id as $row){
            foreach(explode(',',$row) as $user1){
            $arraydata[]=$user1;
            }
        }
       
        // $chat = chat::where('post_id',$post_id)->where('sender_id',$user_id)->where('to_id',Auth::user()->id)->delete();

        // $chat1 = chat::where('post_id',$post_id)->where('sender_id',Auth::user()->id)->where('to_id',$user_id)->delete();

        return response()->json(["Successfully Delete"], 200);
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

        $settings = settings::first();
        $from_name = Auth::user()->first_name .' '.Auth::user()->last_name;
        $from_email = Auth::user()->email;
        $customer = User::find($post->customer_id);

        Mail::send('mail.customer_chat',compact('chat','from_name','settings'),function($message) use($customer,$from_name,$from_email){
            $message->to($customer->email)->subject('EZY Offer - New Chat');
            $message->from($from_email,$from_name);
        });

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

        $settings = settings::first();
        $from_name = Auth::user()->first_name .' '.Auth::user()->last_name;
        $from_email = Auth::user()->email;
        $customer = User::find($post->customer_id);

        Mail::send('mail.customer_chat',compact('chat','from_name','settings'),function($message) use($customer,$from_name,$from_email){
            $message->to($customer->email)->subject('EZY Offer - New Chat');
            $message->from($from_email,$from_name);
        });

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

        $post = post_ad::find($request->post_id);

        $settings = settings::first();
        $from_name = Auth::user()->first_name .' '.Auth::user()->last_name;
        $from_email = Auth::user()->email;
        $customer = User::find($post->customer_id);

        Mail::send('mail.customer_chat',compact('chat','from_name','settings'),function($message) use($customer,$from_name,$from_email){
            $message->to($customer->email)->subject('EZY Offer - New Chat');
            $message->from($from_email,$from_name);
        });

        return response()->json(['message' => 'Save Chat Successfully!','user_id'=>$request->to_id,'post_id'=>$request->post_id],200); 
    }

    public function chatuploaddocument(Request $request){
        $this->validate($request, [
            //'upload_files'=>'required|max:1000',
            'upload_files' => 'required',
            'upload_files.*' => 'required'
          ],[
            //'upload_files.mimes' => 'Only jpeg,jpg,png,pdf,docx files are allowed',
            'upload_files.required' => 'Upload File is Required',
            //'upload_files.max' => 'Sorry! Maximum allowed size for an files is 1MB',
        ]);

        // if(isset($_FILES['upload_files'])){
        //     $name_array = $_FILES['upload_files']['name'];
        //     $tmp_name_array = $_FILES['upload_files']['tmp_name'];
        //     $type_array = $_FILES['upload_files']['type'];
        //     $size_array = $_FILES['upload_files']['size'];
        //     $error_array = $_FILES['upload_files']['error'];
        //     for ($x=0; $x<count($name_array); $x++) 
        //     {
        //         if($name_array[$x] != ""){

        //             $image = $name_array[$x];
        //             $image_info = explode(".", $name_array[$x]); 
        //             $image_type = end($image_info);
        //             $input['newfilename'] = rand().time().'.'.$image_type;
        //             //$destinationPath = public_path('/chat_files');
        //             // $img = Image::make($tmp_name_array[$x]);
        //             //$img->save($destinationPath.'/'.$input['newfilename']);
        //             $image->move(public_path('chat_files/'), $input['newfilename']);

        //             $chat = new chat;
        //             $chat->date = date('Y-m-d');
        //             $chat->sender_id = Auth::user()->id;
        //             $chat->to_id = $request->to_id;
        //             $chat->post_id = $request->post_id;
        //             $chat->chat_type = 1;
        //             $chat->chat_offer = 0;
        //             $chat->file_extension = $image_type;
        //             $chat->file_name = $name_array[$x];
        //             $chat->upload_files = $input['newfilename'];
        //             $chat->save();
        //         }
    	//     }
        // }

        if ($request->hasFile('upload_files')) {
            $files = $request->file('upload_files'); // will get all files
        
            foreach ($files as $file) {
                $original_file_name = $file->getClientOriginalName();
                $new_file_name = rand().time().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('chat_files/'), $new_file_name);

                $chat = new chat;
                $chat->date = date('Y-m-d');
                $chat->sender_id = Auth::user()->id;
                $chat->to_id = $request->to_id;
                $chat->post_id = $request->post_id;
                $chat->chat_type = 1;
                $chat->chat_offer = 0;
                $chat->file_extension = $file->getClientOriginalExtension();
                $chat->file_name = $original_file_name;
                $chat->upload_files = $new_file_name;
                $chat->save();
            }
        }

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
<span><i class="icon fas fa-arrow-left arrow-click" aria-hidden="true" onclick="goback();"></i></span>
<i class="icon fas fa-user" aria-hidden="true"></i>
<p class="name">'.$user->first_name.' '.$user->last_name.'
<br><span style="font-size:14px !important;">('.$post->title.')</span></p>
<b style="top:10px;" class="right pricing-tag-new">Price: '.$post->price.' AED</b>
<br>
<div style="margin-top:30px;
padding: 3px 7px;" class="searchbar right1">
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
                    //$output.='<a download href="/chat_files/'.$row->upload_files.'" class="buttonDownload">'.$row->file_name.'</a>';
                    if($row->file_extension == 'jpeg' || $row->file_extension == 'jpg' || $row->file_extension == 'png'){
                        $output.='<div class="card">
                            <a download href="/chat_files/'.$row->upload_files.'">
                            <img download class="card-img-top img-fluid" src="/chat_files/'.$row->upload_files.'" style="height: 5rem;" />
                            </a>
                        </div>';
                    }else{
                        $output.='<a style="text-align:center;" download href="/chat_files/'.$row->upload_files.'" class="btn-slide">
                        <span class="circle"><i class="fa fa-download"></i></span>
                        <span class="title">'.substr($row->file_name,0,20).'</span>
                        <span class="title-hover">Click here</span>
                    </a>';
                    }
                 
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
                //$output.='<a download href="/chat_files/'.$row->upload_files.'" class="buttonDownload">'.$row->file_name.'</a>';
                if($row->file_extension == 'jpeg' || $row->file_extension == 'jpg' || $row->file_extension == 'png'){
                    $output.='<div class="card">
                        <a download href="/chat_files/'.$row->upload_files.'">
                        <img download class="card-img-top img-fluid" src="/chat_files/'.$row->upload_files.'" style="height: 5rem;" />
                        </a>
                    </div>';
                }else{
                $output.='<a style="text-align:center;" download href="/chat_files/'.$row->upload_files.'" class="btn-slide2">
                    <span class="circle2"><i class="fa fa-download"></i></span>
                    <span class="title2">'.substr($row->file_name,0,20).'</span>
                    <span class="title-hover2">Click here</span>
                </a>';
                }
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
    <a id="upload_icon" onclick="DocumentClearHistory()" data-toggle="modal" data-target="#documentmodal" href="javascript:void(0)"><i class="fas fa-paperclip clickable attach-icon" aria-hidden="true"></i></a>
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
<script>
function goback(){
    // $(".arrow-click").click(function(){
        $(".discussions").show();
        $("#viewchat").hide();
    // });
}
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
                    // $output.='<a download href="/chat_files/'.$row->upload_files.'" class="buttonDownload">'.$row->file_name.'</a>';
                    if($row->file_extension == 'jpeg' || $row->file_extension == 'jpg' || $row->file_extension == 'png'){
                        $output.='<div class="card">
                            <a download href="/chat_files/'.$row->upload_files.'">
                            <img download class="card-img-top img-fluid" src="/chat_files/'.$row->upload_files.'" style="height: 5rem;" />
                            </a>
                        </div>';
                    }else{
                        $output.='<a style="text-align:center;" download href="/chat_files/'.$row->upload_files.'" class="btn-slide">
                            <span class="circle"><i class="fa fa-download"></i></span>
                            <span class="title">'.substr($row->file_name,0,20).'</span>
                            <span class="title-hover">Click here</span>
                        </a>';
                    }
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
                    // $output.='<a download href="/chat_files/'.$row->upload_files.'" class="buttonDownload">'.$row->file_name.'</a>';
                    if($row->file_extension == 'jpeg' || $row->file_extension == 'jpg' || $row->file_extension == 'png'){
                        $output.='<div class="card">
                            <a download href="/chat_files/'.$row->upload_files.'">
                            <img download class="card-img-top img-fluid" src="/chat_files/'.$row->upload_files.'" style="height: 5rem;" />
                            </a>
                        </div>';
                    }else{
                        $output.='<a style="text-align:center;" download href="/chat_files/'.$row->upload_files.'" class="btn-slide2">
                            <span class="circle2"><i class="fa fa-download"></i></span>
                            <span class="title2">'.substr($row->file_name,0,20).'</span>
                            <span class="title-hover2">Click here</span>
                        </a>';
                    }
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

        $settings = settings::first();
        $from_name = Auth::user()->first_name .' '.Auth::user()->last_name;
        $from_email = Auth::user()->email;

        Mail::send('mail.admin_chat',compact('admin_customer','settings','from_name'),function($message) use($settings,$from_name,$from_email){
            $message->to($settings->admin_receive_email)->subject('EZY Offer - Message From Customer');
            $message->from($from_email,$from_name);
        });
  
        return response()->json(Auth::user()->id); 
    }

    public function getnewchatadmincount(){
        $getnewchatcount = DB::table('admin_customers')
        ->where([
            ['customer_id',Auth::user()->id],
            ['read_status',0],
            ['message_from',1],
        ])
        ->count();
        return response()->json($getnewchatcount); 
    }

    public function reloadchatadmin(){
        $get_chat = DB::table('admin_customers')
        ->where([
            ['customer_id',Auth::user()->id],
            ['read_status',0],
            ['message_from',1],
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
