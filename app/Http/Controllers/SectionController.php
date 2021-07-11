<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Section;
use Session;
class SectionController extends Controller
{
    public function index(){
        $sections = Section::get();
        return view('admin.sections.all_sec',compact('sections',$sections));
    }

    public function add_edit_sections(Request $request,$id=""){


        return view('admin.sections.add_sec');
    }

    public function status_check(Request $request){
        $data = $request->all();
        if($data['st'] == 'Active'){
            $status = 0;
        }
        else{
            $status = 1;
        }
        Section::where('id',$data['id'])->update(['status'=>$status]);
        return response()->json(['status'=>$status,'section_id'=>$data['id']]);
    }
}
