@extends('admin.dashboard.dashboard')
@section('title','Settings')
@section('setting')
<div class="row">
    <div class="col-sm-12 col-12 d-block">
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Update Admin Details</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('update.details')}}" data="{{route('update.password')}}" method="POST" enctype="multipart/form-data" id="updatePassword"> 
              @csrf
                <div class="card-body">
                <div class="form-group">
                  @if(Session::has('msg'))
                  <p class="alert alert-success" style="margin:20px 0">{{Session::get('msg')}}</p>
                  @elseif(Session::has('error'))
                  <p class="alert alert-danger" style="margin:20px 0">{{Session::get('error')}}</p>
                  @endif
                  <label for="admin_name">Admin Name</label>
                  <input type="text" class="form-control" id="admin_name" name="admin_name" value="{{Auth::guard('admin')->user()->name}}" placeholder="Enter name" readonly="">
                </div>
                
                <div class="form-group">
                    <label for="admin_type">Admin Type</label>
                    <input type="email" class="form-control" id="admin_type" name="admin_type" value="{{Auth::guard('admin')->user()->type}}" placeholder="Enter type" readonly="">
                  </div>
                <div class="form-group">
                  <label for="mob_no">Mobile Number</label>
                  <input type="text" class="form-control" required id="mob_no" name="mob_no" placeholder="Enter Mobile Number">
                  <span id="show_res"></span>
                </div>
                <div class="form-group">
                  <label for="n">Admin Name</label>
                  <input type="text" class="form-control" id="n" name="n" placeholder="Enter Name">
                </div>
        
                <div class="form-group">
                  <label for="exampleInputFile">Upload Image</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="upload_img" id="upload_img">
                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                    
                  </div>
                </div> 
              
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
    </div>
</div>
@endsection