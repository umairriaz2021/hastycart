@extends('admin.dashboard.dashboard')
@section('title','Add Brands')
@section('setting')
<div class="row">
    <div class="col-sm-12 col-12 d-block">
        <div class="vw-100">
            @if(Session::has('msg'))
            <p class="alert alert-success" style="margin:20px 0">{{Session::get('msg')}}</p>
            @elseif(Session::has('error'))
            <p class="alert alert-danger" style="margin:20px 0">{{Session::get('error')}}</p>
            @endif
        </div>
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">{{$title}}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="@if(!empty($brands->id)){{url('dashboard/brands/add-edit/'.$brands->id)}} @else {{url("dashboard/brands/add-edit")}} @endif"   method="POST" enctype="multipart/form-data"> 
              @csrf
                <div class="card-body">
                <div class="row">
                    <div class="col-md-8 col-sm-6 col-12 d-block">
                        <div class="form-group">
   
                            <label for="brand_name">Brand Name</label>
                            <input type="text" class="form-control" id="brand_name" name="brand_name" placeholder="Enter Brand name" value="@if(!empty($brands->name)) {{$brands->name}} @else {{old('brand_name')}} @endif" >
                          </div>
              
                          <div class="form-group">
                            <label for="exampleInputFile">Upload Image</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image" id="image">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                              </div>
                              
                            </div>
                           
                          </div> 
                    </div>
                    @if(!empty($brands->image))
                    <div class="col-md-4 col-sm-6 col-12 d-block">
                        <div class="form-group">
                        <img src="{{asset('storage/brands/'.$brands->image)}}" class="img-fluid img-thumbnail" width="400px" height="500">
                        </div>
                    </div>
                    @endif
                </div>
              
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                
                <button type="submit" class="btn btn-primary">@if(!empty($brands->id)) Update @else Submit @endif</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
    </div>
</div>
@endsection