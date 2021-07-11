<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\ProductAttribute;
use App\ProductImage;
use Session;
class ProductController extends Controller
{
    public function index(){
        $products = Product::with(['categories','sections'])->get();
        return view('admin.products.index',compact('products',$products));
    }
    
    public function prodActiveInactive(Request $request){
        $st = $request->status;
        if($st == 'Active'){
            $status = 1;
        }
        else{
            $status = 0;
        }
       Product::where('id',$request->prod_id)->update(['status'=>$status]);
      return response()->json(['status'=>$status,'prod_id'=>$request->prod_id]);
    
    }



    public function addEditProduct(Request $request,$id=null){
        if($id == null){
            $product_title = 'Add Product';
            $product = new Product;
            $msg = 'Product added successfully';
            $products = array();
        }
        else{
            $products = Product::where('id',$id)->first();
            $product = Product::find($id);
            // echo "<pre>";
            $msg  = 'Product updated successfully';  
            $product_title = 'Edit Product';
            
        }
        if($request->isMethod('POST')){
           $request->validate([
             'prod_title' => 'required|max:255|bail',
               'prod_sku'  => 'required',
               'prod_color' => 'required',
               'prod_price' => 'required|numeric',
               'cat_id' => 'required'              
           ]);

           if(empty($request->prod_fabric)){
               $fabric = "";
           }
           else{
            $fabric = $request->prod_fabric;
           }
           if(empty($request->prod_sleeve)){
               $sleeve = "";
           }
           else{
               $sleeve = $request->prod_sleeve;
           }
           if(empty($request->prod_pattern)){
               $pattern = "";
           }
           else{
               $pattern = $request->prod_pattern;
           }
           if(empty($request->prod_fit)){
               $fit = "";
           }
           else{
            $fit = $request->prod_fit;
           }
           if(empty($request->prod_ocassion)){
               $ocassion = "";
           }
           else{
            $ocassion  = $request->prod_ocassion;
           }

           $product->product_title = $request->prod_title;
           $catdata = Category::find($request->cat_id);
        
           $product->section_id = $catdata->section_id;
           $product->category_id = $request->cat_id;
           $product->product_sku = $request->prod_sku;
           $product->product_color = $request->prod_color;
           $product->product_price = $request->prod_price;
           $product->product_weight = $request->prod_weight;
           $product->product_discount = $request->prod_disc;
           $product->product_desc = $request->prod_desc;
           $product->wash_care = $request->wash_care;
           $product->slug = $request->prod_slug;
           $product->meta_title = $request->meta_title;
           $product->meta_keywords = $request->meta_key;
           $product->meta_desc = $request->meta_desc;
           $product->fabric	 =  $fabric;
           $product->pattern	 =  $pattern;
           $product->sleeve	 = $sleeve;
           $product->fit	 = $fit;
           $product->occassion	 = $ocassion;
           if($request->hasFile('prod_img')){
               $ext = $request->file('prod_img')->extension();
               $filename = sprintf('hasty_%s.'.$ext,random_int(1,300));
               $file = $request->file('prod_img')->storeAs('products',$filename,'public');
           }else{
               $filename = 'no-image.png';
           }
           if($request->hasFile('prod_video')){
            $ext = $request->file('prod_video')->extension();
            $videofilename = sprintf('hasty_%s.'.$ext,random_int(1,300));
            $file = $request->file('prod_video')->storeAs('products',$videofilename,'public');
        }else{
            $videofilename = 'no-image.png';
        }
           $product->product_image = $filename;
           $product->product_video = $videofilename;
           $product->status = 1;
           $product->is_featured = $request->feature;
           
             $save = $product->save();
        
           if($save){
           Session::flash('msg',$msg);
           return redirect()->route('all.prod');
           }
           else{
                Session::flash('error','Product not created');
                return redirect()->back();
           }
        }
       


        $sections = \App\Section::with('categories')->get();
        
        
        
        //$sections = json_decode(json_encode($sections),true);
        // echo "<pre>";
        // print_r($sections);
        // echo "<pre>";die;
        
        $fabricArray = ['Cotton','Polyester','Wool'];
        $sleeveArray = ['Full Sleeves','Half Sleeves','Short Sleeves','Sleeveless'];
        $patternArray = ['Checked','Plain','Printed','Self','Solid'];
        $fitArray = ['Regular','Slim'];
        $ocassionArray = ['Casual','Formal'];
        return view('admin.products.add_edit',compact('product_title','products','sections','fabricArray','sleeveArray','patternArray','fitArray','ocassionArray'));
    }

    public function prodDelete($id){
        if(Product::where('id',$id)->delete()){
            Session::flash('msg','Product Deleted Successfully');
            return redirect()->back();
        }
    }

    public function imgDel($id){
        //$id = $request->id;
        $products = Product::where('id',$id)->first();
      
        $path = 'storage/products/';
        if(file_exists($path.$products->product_image)){
            unlink($path.$products->product_image);
        }

        if(Product::where('id',$id)->update(['product_image'=>'no-image.png'])){
        Session::flash('msg','Image deleted successfully');
        return redirect()->back();    
         }
    else{
            Session::flash('error','Image not deleted');
            return redirect()->back();
        }    
    }

    public function videoDel($id){
        $products = Product::where('id',$id)->first();
        $path = 'storage/products/';
        if(file_exists($path.$products->product_video)){
            unlink($path.$products->product_video);
        }

        if(Product::where('id',$id)->update(['product_video'=>'no-image.png'])){
            Session::flash('msg','Video deleted successfully');
            return redirect()->back();
        }
        else{
            Session::flash('error','Video deleted successfully');
            return redirect()->back();
        }
    }

    public function addAttributes(Request $request,$id){
         if($request->isMethod('post')){
             $data= $request->all();
             $i = 0;
             foreach($data['sku'] as $key => $value){
                
                
                if(!empty($value)){
                    
                $attrSku = ProductAttribute::where('sku',$value)->count();
                if($attrSku > 0){
                    $message = 'SKU Already exists, Please add another SKU';
                    Session::flash('error',$message);
                    return redirect()->back();
                }

                $attrSize = ProductAttribute::where(['product_id'=>$id,'size'=>$data['size'][$key]])->count();
                if($attrSize > 0){
                    $message = 'Size Already Exists, Please add another size';
                    Session::flash('error',$message);
                    return redirect()->back();
                }
               
                for($i = 0; $i < count($data['sku']); $i++){
                $attributes = new ProductAttribute;
                $attributes->product_id = $id;
                $attributes->sku = $data['sku'][$i];
                $attributes->size = $data['size'][$i];
                $attributes->price = $data['price'][$i];
                $attributes->stock = $data['stock'][$i];
                $attributes->status = 1;
                $save = $attributes->save(); 
                   
                    }
                //$attributes->status = 1;
                if($save){
                    Session::flash('msg','Attribute Added Successfully');
                    return redirect()->back();
                } 
                else{
                    Session::flash('error','Attributed not added');
                    return redirect()->back();
                }
                }
               
             }
         }
        $attributes = Product::select('id','product_title','product_sku','product_color','product_image')->with('attributes')->find($id);
        // $data = json_decode(json_encode($attributes),true);
        // echo "<pre>";
        // print_r($data);die;
        return view('admin.products.add_attributes',compact('attributes'));
    
    }

    public function editAttributes(Request $request,$id){
        if($request->isMethod('post')){
           $data = $request->all();
           if(!empty($data)){
               foreach($data['attrid'] as $key => $value){

                     $update =  ProductAttribute::where('id',$value)->update(['stock'=>$data['stock'][$key],'price'=>$data['price'][$key]]);      
                   

               }
               if($update){
                   Session::flash('msg','Attribute Updated Successfully');
                   return redirect()->back();
                }
                else{
                   Session::flash('error','Attribute not Updated');
                   return redirect()->back();

               }
            }
        }
    }

    public function attrStatus(Request $request){
        $data = $request->all();
        if($data['name'] == 'Active'){
            $status = 0;
        }
        else{
            $status = 1;
        }

            ProductAttribute::where('id',$request->id)->update(['status'=>$status]);
            return response()->json(['status'=>$status,'id'=>$data['id']]);
        
    }

    public function deleteAttribute(Request $request){
        $id = $request->id;
        if(ProductAttribute::find($id)->delete()){
         return response()->json(['status'=>200,'msg'=>'deleted']);   
        }
        else{
            return response()->json(['status'=>400,'msg'=>'not deleted']);
        }
        
    }

    public function addImages(Request $request, $id){   
    
        if($request->isMethod('post')){
            if($id==null){
                $addImage = new ProductImage;
            }
            else{
                $addImage = ProductImage::find($id);
                
            }   
            
             
            
            if($request->hasFile('images')){
            //    $images = $request->file('images');
            //    echo "<pre>";
            //    print_r($images);die;
            $uploadImages = [];
            foreach($request->file('images') as $key=>$value){
                    //print_r(count((array)$value));die;
                    $ext = $value->extension();
                    $filename = sprintf("hasty_%s.$ext",random_int(1,1000));
                    $path = $value->storeAs('products',$filename,'public');
                    if($path){
                        array_push($uploadImages,$filename);
                    }                        
                }
                
                //$fileupload = serialize($uploadImages);
            }
            else{
                $fileupload = 'no-image.png';
            }

            foreach($uploadImages as $uimg){
                
                $addImage->product_id = $id;
                $addImage->image = $uimg;
                $addImage->status = 1;
                $save = $addImage->save();
               }
                if($save){
                    Session::flash('msg','Product Images Added Successfully');
                    return redirect()->back();
                   }
                   else{
                   Session::flash('msg','Product Images Added Successfully');
                   return redirect()->back();
               }    
             
            }
           
        
        $attributes = Product::select('id','product_title','product_sku','product_image')->with('images')->find($id);
        //  $data = json_decode(json_encode($attributes),true);
        //  foreach($data['images'] as $key=>$f){

        //      echo "<pre>";
        //         print_r(unserialize($f['image']));
        //     }
        //     die;
         //$images = unserialize($data['images'][6]['image']));die;
        return view('admin.products.product_images',compact('attributes'));
    }

    public function ProductImagesStatus(Request $request){
            $data = $request->all();
            if($data['status'] == 'Active'){
                $status = 0;
            }
            else{
                $status = 1;
            }

            $update = ProductImage::where('id',$data['id'])->update(['status'=>$status]);

     
               return response()->json(['id'=>$data['id'],'status'=>$data['status']]);

    }

    public function editImages(Request $request, $id){
        $productImage = ProductImage::find($id);
        //$product_id = ProductImage::with('products')->find($id);
        $product_id = $productImage->product_id;
        if($request->isMethod('post')){
          $data = $request->all();
         
          if($request->hasFile('image')){
              $ext = $request->file('image')->extension();
              $filename = sprintf('hasty_cart_%s.'.$ext,random_int(1,1000));
              $request->file('image')->storeAs('products',$filename,'public');
              if(!empty($filename)){
                    $productImage->image = $filename;
                    $save = $productImage->save();
                    if($save){
                        Session::flash('msg','Images updated successfully');    
                        return redirect('dashboard/products/add-images/'.$product_id);
                    }
                    else{
                        Session::flash('error','Error ! Uploading Images');    
                        return redirect('dashboard/products/add-images/'.$product_id);
                    }
              }  
            
            }        
            
        }
        $info = ProductImage::with('products')->find($id);
        return view('admin.products.edit_product_image',compact('info'));
    }

    public function ProductImageDel(Request $request){
        $data = $request->all();
       
        ProductImage::where('id',$data['id'])->delete();
        return response()->json(['id'=>$data['id']]);
    }
}
