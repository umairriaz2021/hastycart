@extends('admin.dashboard.dashboard')
@section('title','Add / Edit Categories')
@section('s')
<div class="row">
  @if(Session::has('msg'))
             <div class="alert alert-success my-3 w-100 rounded-0">{{Session::get('msg')}}</div>
       @endif
    <div class="col-12">
     
      <div class="card">
        
        <div class="card-header">
          <h3 class="card-title">{{$title}}</h3>
        </div>
        <!-- /.card-header -->
        <form action="@if(empty($category)) {{route('categories.add_edit')}} @else {{url('dashboard/add-category/'.$category->id)}} @endif"  method="POST" id="add_edit_form" class="add_edit_form" enctype="multipart/form-data" id="updatePassword"> 
            @csrf
              <div class="card-body">
              <div class="row">
                <div class="col-sm-12 col-12">
                  @if(Session::has('error'))
                  <span class="alert alert-danger">{{Session::get('error')}}</span>
                  @endif
                </div>
                  <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        {{-- @if(Session::has('msg'))
                        <p class="alert alert-success" style="margin:20px 0">{{Session::get('msg')}}</p>
                        @elseif(Session::has('error'))
                        <p class="alert alert-danger" style="margin:20px 0">{{Session::get('error')}}</p>
                        @endif --}}
                        <label for="cat_title">Title</label>
                        <input type="text" class="form-control" id="cat_title" name="cat_title" value="@if(!empty($category)) {{$category->cat_title}} @else {{old('cat_title')}} @endif" placeholder="Enter Title">
                      </div>
                  </div>
                  <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                      <label>All Sections</label>
                      <select class="form-control select2" name="section_id" id="section_id" style="width:100%;">
                        @if($sections)
                        <?php $selected = 'selected';?>
                        @foreach($sections as $sec)
                        <option value="{{$sec->id}}" @if(!empty($category->section_id) && $category->section_id == $sec->id) selected="" @endif>{{$sec->sec_title}}</option>
                        @endforeach
                        @endif

                      </select>
                    </div>


                
                    </div>
                    </div>
                      <!-- /.form-group -->
                 
                      <div class="row">
                        <div class="col-md-6 col-sm-12">
                          <div id="main_cat">
                          @include('admin.categories.append_categories')
                        </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <div class="input-group">
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="cat_img" id="cat_img">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                  </div>
                                  
                                </div>
                              
                              </div>
                               @if(!empty($category->image))
                               <img src="{{asset('storage/categories/'.$category->image)}}" class="img-thumbnail img-fluid" width="150px" height="150px" alt="">
                               <a href="{{url('dashboard/delete-category-image/'.$category->id)}}" class="btn btn-outline-danger ml-2">  Delete </a>
                               @endif
                          </div>
                          </div>
              
              <div class="row">
                  <div class="col-md-12 col-12">
                    <div class="form-group">
                        <label for="cat_desc">Description</label>
                     <textarea name="cat_desc" id="cat_desc"  class="form-control" cols="30" rows="10">@if(!empty($category)) {{$category->cat_desc}} @else {{old('cat_desc')}} @endif</textarea>  
                    </div>
                  </div>
                
              </div>
              
              <div class="row">
                  <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="cat_url">Category URL</label>
                        <input type="text" name="cat_url" class="form-control" id="cat_url" value="@if(!empty($category)) {{$category->slug}} @else {{old('cat_url')}} @endif" placeholder="Enter Category URL">
                      </div>
                      
                  </div>
                  <div class="col-md-6 col-sm-12">
                    <div class="form-group">    
                        <label for="cat_disc">Category Discount</label>
                        <input type="text" name="cat_disc" value="@if(!empty($category)) {{$category->cat_disc}} @else {{old('cat_disc')}} @endif" id="cat_disc" class="form-control">
                    </div>
                  </div>
              </div>
              
              <div class="row">
                <div class="col-sm-12 col-12">
                <h3 class="text-center font-weight-bold my-5">SEO Section</h3>  

                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="meta_title">Meta Title</label>
                        <input type="text" name="meta_title" class="form-control" value="@if(!empty($category)) {{$category->meta_title}} @else {{old('meta_title')}} @endif" id="meta_title" placeholder="Enter Meta Title">
                      </div>
                      
                  </div>
                  <div class="col-md-6 col-sm-12">
                    <div class="form-group">    
                        <label for="meta_key">Meta Keywords</label>
                        <input type="text" name="meta_key" id="meta_key" value="@if(!empty($category)) {{$category->meta_key}} @else {{old('meta_key')}} @endif" class="form-control" placeholder="Enter Meta keywords">
                    </div>
                  </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-12">
                  <div class="form-group">
                      <label for="meta_desc">Meta Description</label>
                   <textarea name="meta_desc" id="meta_desc"  class="form-control" cols="30" rows="10">@if(!empty($category)) {{$category->meta_desc}} @else {{old('meta_desc')}} @endif</textarea>  
                  </div>
                </div>
              
            </div>
              {{-- <div class="form-group">
                <label for="exampleInputFile">Upload Image</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="upload_img" id="upload_img">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                  </div>
                  
                </div>
              </div>  --}}
            
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>

  @endsection