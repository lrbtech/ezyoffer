<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function savecategory(Request $request){
        $this->validate($request, [
            'category'=>'required',
            'image' => 'required|mimes:jpeg,jpg,png,pdf|max:1000', // max 1000kb
          ],[
            'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            'image.required' => 'Category Image Field is Required',
        ]);

        $category = new category;
        $category->category = $request->category;
        $category->parent_id = 0;

        if($request->image!=""){
            if($request->file('image')!=""){
            $image = $request->file('image');
            $upload_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload_files/'), $upload_image);
            $category->image = $upload_image;
            }
        }

        $category->save();

        return response()->json('successfully save'); 
    }
    public function updatecategory(Request $request){
        $this->validate($request, [
            'category'=>'required',
            'image' => 'mimes:jpeg,jpg,png,pdf|max:1000', // max 1000kb
          ],[
            'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            //'image.required' => 'Category Image Field is Required',
        ]);
        
        $category = category::find($request->id);
        $category->category = $request->category;
        $category->parent_id = 0;
        if($request->image!=""){
            $old_image = "upload_files/".$category->image;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            if($request->file('image')!=""){
            $image = $request->file('image');
            $upload_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload_files/'), $upload_image);
            $category->image = $upload_image;
            }
        }
        $category->save();

        return response()->json('successfully update'); 
    }

    public function category(){
        $category = category::where('parent_id',0)->get();
        return view('admin.category',compact('category'));
    }

    public function editcategory($id){
        $category = category::find($id);
        return response()->json($category); 
    }
    
    public function deletecategory($id,$status){
        $category = category::find($id);
        $category->status = $status;
        $category->save();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }


    public function savesubcategory(Request $request){
        $this->validate($request, [
            'category'=>'required',
            'image' => 'required|mimes:jpeg,jpg,png,pdf|max:1000', // max 1000kb
          ],[
            'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            'image.required' => 'Category Image Field is Required',
        ]);

        $category = new category;
        $category->category = $request->category;
        $category->parent_id = $request->parent_id;
        if($request->image!=""){
            if($request->file('image')!=""){
            $image = $request->file('image');
            $upload_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload_files/'), $upload_image);
            $category->image = $upload_image;
            }
        }
        $category->save();
        return response()->json('successfully save'); 
    }

    public function updatesubcategory(Request $request){
        $this->validate($request, [
            'category'=>'required',
            'image' => 'mimes:jpeg,jpg,png,pdf|max:1000', // max 1000kb
          ],[
            'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            //'image.required' => 'Category Image Field is Required',
        ]);
        
        $category = category::find($request->id);
        $category->category = $request->category;
        $category->parent_id = $request->parent_id;
        if($request->image!=""){
            $old_image = "upload_files/".$category->image;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            if($request->file('image')!=""){
            $image = $request->file('image');
            $upload_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload_files/'), $upload_image);
            $category->image = $upload_image;
            }
        }
        $category->save();
        return response()->json('successfully update'); 
    }

    public function subcategory($id){
        $subcategory = category::where('parent_id',$id)->get();
        $parent_id = $id;
        return view('admin.subcategory',compact('subcategory','parent_id'));
    }

    public function editsubcategory($id){
        $category = category::find($id);
        return response()->json($category); 
    }
    
    public function deletesubcategory($id,$status){
        $category = category::find($id);
        $category->status = $status;
        $category->save();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }
}
