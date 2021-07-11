<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Section;
use Session;
class CategoryController extends Controller
{
    public function index(){
        $categories = Category::with(['sections','categories'])->get();
        //$categories = json_decode(json_encode($categories),true);
        // echo "<pre>";
        // print_r($categories);
        // echo "</pre>";die;
        return view('admin.categories.index',compact('categories',$categories));
    }
    public function cat_status_check(Request $request){
        $data = $request->all();
        
        if($data['st'] == 'Active'){
            $status = 0;
        }
        else{
            $status = 1;
        }
        Category::where('id',$data['id'])->update(['status'=>$status]);
        return response()->json(['status'=>$status,'cat_id'=>$data['id']]);
    }

    public function addEditCategory(Request $request,$id=null){
       if($id == ""){
           $title = 'Add Category';
           $category = new Category;
           $getCat = array();
           $catdata = array();
           $category_data = array();
           $msg = "Category added successfully";
        }
        else{
            $title = 'Edit Category';
            
            $category_data = Category::find($id);
            $getCategory = Category::with('subcategories')->where(['section_id'=>$category_data->section_id,'parent_id'=>0,'status'=>1])->get();
            $catdata = Category::with('subcategories')->where([
                'parent_id'=>$category_data->parent_id,
                'section_id'=>$category_data->section_id
                ])->first();
                
                $getCat = json_decode(json_encode($getCategory),true);
                //$catdata = json_decode(json_encode($catdata),true);
                $category = Category::find($category_data->id);
                $msg = "Category updated successfully";
                //    echo "<pre>"; 
        //    print_r($catdata);
        //    echo "</pre>";die;
       }
       
       if($request->isMethod('POST')){
           $data = $request->all();
           $category->cat_title = $data['cat_title'];
           $category->section_id = $data['section_id'];
           $category->parent_id = $data['parent_id'];
           $category->cat_desc = $data['cat_desc'];
           if($request->hasFile('cat_img')){
               $ext = $request->file('cat_img')->extension();
               $filename = sprintf('hasty_%s.'.$ext,random_int(1,2000));
               $request->file('cat_img')->storeAs('categories',$filename,'public');

           }
           else{
               $filename = 'no-image.png';
           }
           $category->image = $filename;
           $category->slug = $data['cat_url'];
           $category->cat_disc = $data['cat_disc'];
           $category->meta_title = $data['meta_title'];
           $category->meta_key = $data['meta_key'];
           $category->meta_desc = $data['meta_desc'];
           $category->status = 1;
           $save = $category->save();
           if($save){
               Session::flash('msg',$msg);
               return redirect()->route('all.cat');
           }
           else{
               Session::flash('error','Error ! Creating Category');
               return redirect()->back();
           }
       }
       
       
       $getSections = Section::get();
       

        return view('admin.categories.add_edit',['title'=>$title,'sections'=>$getSections,'category'=>$category_data,'catdata'=>$catdata,'getCat'=>$getCat]);
    }

    public function append_cat(Request $request){
        $data = $request->all();
        
        $getCategory = Category::with('subcategories')->where(['section_id'=>$data['sec_id'],'parent_id'=>0,'status'=>1])->get();
           
         $getCat = json_decode(json_encode($getCategory),true);
        // echo "<pre>";
        // print_r($getCat);
        // echo "</pre>";die;
        return view('admin.categories.append_categories',compact('getCat',$getCat));
    }

    public function delete_img($id){
        $cat_img = Category::where('id',$id)->first();
        //print_r($cat_img->image);die;
        $path = 'storage/categories/';
        //print_r($path);die;
        if(file_exists($path.$cat_img->image)){
            unlink($path.$cat_img->image);
        }
        $cat_update = Category::where('id',$id)->update(['image'=>'no-image.png']);
        if($cat_update){
            Session::flash('msg','Image Deleted Successfully');
            return redirect()->back();
        }
    }

    public function delete_cat($id){
       Category::where('id',$id)->delete();
      
        Session::flash('message','Category Deleted Successfully');
        return redirect()->back();
       
    }

}
