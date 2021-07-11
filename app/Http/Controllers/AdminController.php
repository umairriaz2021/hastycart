<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Hash;
class AdminController extends Controller
{
    
    public function dashboard(){
       
        return view('admin.dashboard.dashboard');
        
        
    }

    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $email = $data['email'];
            $pass = $data['pass'];
         
         if(Auth::guard('admin')->attempt(['email'=>$email,'password'=>$pass])){
            $id = Auth::guard('admin')->user()->id;
            $email = Auth::guard('admin')->user()->email; 
            Session::put('ADMIN_ID',$id);
            Session::put('ADMIN_EMAIL',$email);
            Session::flash('msg','Login Successfully');    
            return redirect()->route('admin.dashboard');
         }
         else{
             Session::flash('error','Login failed');
             return redirect()->back();
         }
        }
        if(Auth::guard('admin')->check()){
            return redirect()->route('admin.dashboard');
        }else{
        return view('login');
        }
        
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    public function settings(){
        return view('admin.dashboard.settings');
    }

    public function update_password(Request $request){
       if($request->isMethod('post')){
           $data = $request->all();
           if(Hash::check($data['curr_pass'],Auth::guard('admin')->user()->password)){
                if($data['new_pass'] == $data['conf_pass']){
                    \App\Admin::where('id',Auth::guard('admin')->user()->id)
                                ->update(['password'=>bcrypt($data['new_pass'])]);
                     Session::flash('msg','Your password changed successfully');
                     return redirect()->back();
                }
                else{
                    
                    Session::flash('error','New password not matched with confirm password');
                    return redirect()->back();
                }
           }
           else{
               Session::flash('error','Your password is not matched with your old password');
               return redirect()->back();
           }
       } 
           
       
    }

    public function checkPassword(Request $request){
            $data = $request->all();
            if(Hash::check($data['curr_ps'],Auth::guard('admin')->user()->password)){
                echo "true";
            }
            else{
                echo "false";
            }
    }

    public function update_details(Request $request){
     if($request->isMethod('POST')){
         $data = $request->all();
         if($request->hasFile('upload_img')){
             $ext = $request->file('upload_img')->extension();
             $filename = sprintf('admin_%s.'.$ext,random_int(1,1000));
             $img_path = $request->file('upload_img')->storeAs('admin/images',$filename,'public');
         }
         else{
             $filename = 'no-image.png';
         }

        $id = Auth::guard('admin')->user()->id;
        $admin_details =  \App\Admin::find($id);
        $admin_details->mobile = $data['mob_no'];
        $admin_details->name = $data['n'];
        $admin_details->image = $filename;
        if($admin_details->save()){
            Session::flash('msg','Admin Details updated Successfully');
            return redirect()->back();
        }
        else{
            Session::flash('error','Admin Details not updated');
            return redirect()->back();

        }

     }
    
     return view('admin.dashboard.update_admin');
    }
}
