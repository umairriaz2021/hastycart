<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use Session;    
class BrandController extends Controller
{
    public function index(){
        $brand = Brand::get();
        return view('admin.brands.all_brands',compact('brand'));
    }

    public function addEdit(Request $request, $id=null){
        if($id==null){
            $title =  "Add Brands";
            $brand = new Brand;
            $brands = array();
        }
        else{
            $title  = "Edit Brands";
            $brand = Brand::find($id);
            $brands = Brand::find($id);
        }

        //Add & Edit Brands
        if($request->isMethod('post')){
            $data = $request->all();

            if($request->hasFile('image')  && $request->file('image')->isValid()){
                $ext = $request->file('image')->extension();
                $filename = sprintf('hastybrand_%s.'.$ext,random_int(1,2000));
                $request->file('image')->storeAs('brands',$filename,'public');
              
            }
            else{
                if($brands->image){
                    $filename = $brands->image;
                }
                else
                {
                $filename = 'no-image.png';
                }
            }
            
            $brand->name = $data['brand_name'];
         
            $brand->image = $filename;
            $brand->status = 1;
            $save = $brand->save();
            if($save){
                Session::flash('msg','Brand Added Successfully');
                return redirect()->back();
            }
            else{
                Session::flash('error','Error ! Adding Brands');
                return redirect()->back();
            }
        }
        //Add & Edit Brands Ends


      
    
        return view('admin.brands.add_edit',compact('title','brands'));
        
    }

    public function statusChange(Request $request){
        $s = $request->status;
        $id = $request->id;

        if($s == 'Active'){
            $status = 0;
        }
        else{
            $status = 1;
        }
        


        Brand::where('id',$id)->update(['status'=>$status]);
        return response()->json(['id'=>$id,'status'=>$status]);
    }

    public function deleteBrand(Request $request){
        $id = $request->id;
        $brand = Brand::find($id);
       
        $path = 'storage/brands/';
        if(file_exists($path.$brand->image)){
            unlink($path.$brand->image);
        }

        Brand::where('id',$brand->id)->delete();
        return response()->json(['status'=>1]);
    }
}
