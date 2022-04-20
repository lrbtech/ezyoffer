<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\language;
use App\Models\blog;
use App\Models\settings;
use Image;
use Auth;
class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        date_default_timezone_set("Asia/Dubai");
        date_default_timezone_get();
    }

    public function saveblog(Request $request){
        $this->validate($request, [
            'title'=>'required',
            'description'=>'required',
            'image' => 'required|mimes:jpeg,jpg,png,pdf|max:1000', // max 1000kb
          ],[
            'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            'image.required' => 'blog Image Field is Required',
        ]);

        $settings = settings::first();

        $blog = new blog;
        $blog->date = date('Y-m-d');
        $blog->title = $request->title;
        $blog->description = $request->description;

        if($request->image!=""){            
            $image = $request->file('image');
            $input['imagename'] = rand().time().'.'.$image->getClientOriginalExtension();
        
            $destinationPath = public_path('/upload_files');
            $img = Image::make($image->getRealPath());
            $img->resize(1200, 600, function ($constraint) {
                $constraint->aspectRatio();
            })->insert('upload_files/logo_watermark.png','bottom-right', 50, 30)->save($destinationPath.'/'.$input['imagename']);
    
            $blog->image = $input['imagename'];
        }

        $blog->save();

        return response()->json('successfully save'); 
    }
    public function updateblog(Request $request){
        $this->validate($request, [
            'title'=>'required',
            'description'=>'required',
            'image' => 'mimes:jpeg,jpg,png,pdf|max:1000', // max 1000kb
          ],[
            'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
        ]);

        $settings = settings::first();
        
        $blog = blog::find($request->id);
        $blog->title = $request->title;
        $blog->description = $request->description;

        if($request->image!=""){
            $old_image = "upload_files/".$blog->image;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            
            $image = $request->file('image');
            $input['imagename'] = rand().time().'.'.$image->getClientOriginalExtension();
        
            $destinationPath = public_path('/upload_files');
            $img = Image::make($image->getRealPath());
            $img->resize(1200, 600, function ($constraint) {
                $constraint->aspectRatio();
            })->insert('upload_files/logo_watermark.png','bottom-right', 50, 30)->save($destinationPath.'/'.$input['imagename']);
    
            $blog->image = $input['imagename'];
        }
        $blog->save();

        return response()->json('successfully update'); 
    }

    public function blog(){
        $blog = blog::all();
        $language = language::all();
        return view('admin.blog',compact('blog','language'));
    }

    public function editblog($id){
        $blog = blog::find($id);
        return response()->json($blog); 
    }
    
    public function deleteblog($id,$status){
        $blog = blog::find($id);
        $blog->status = $status;
        $blog->save();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }



}
