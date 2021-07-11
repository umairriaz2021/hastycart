@extends('admin.dashboard.dashboard')
@section('title','All Product Images')
@section('s')
<div class="row">
    <div class="col-12">
        <div class="row">
            @if(Session::has('msg'))
            <span class="alert alert-success my-3 w-100">{{Session::get('msg')}}</span>
            @elseif(Session::has('error'))
            <span class="alert alert-warning my-3 w-100">{{Session::get('error')}}</span>
            @endif
            
          </div>
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Product Attributes</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
         
          <div class="row">
              <div class="d-flex flex-direction-row w-100 align-items-center justify-content-center">
                  @csrf
                  <div class="col-md-6 col-sm-12 col-12">
                      <p><strong>Product Name: </strong> {{$info->products->product_title}}</p>
                      <p><strong>Product SKU: </strong> {{$info->products->product_sku}}</p>
                      <p><strong>Product Color: </strong> {{$info->products->product_color}}</p>
                    </div>
              <div class="col-md-6 col-sm-12 col-12">
                  <div class="image_tg align-content-end">
                      <img src="{{asset("storage/products/$info->image")}}" width="250px" height="250px" class="img-fluid img-thumbnail" alt="">
                    </div>
                </div>
            </div>
            <form action="{{url("dashboard/products/edit-images/$info->id")}}" enctype="multipart/form-data" method="POST" id="add_images">
                    @csrf
                <div class="form-group">
                    <input type="file" name="image" class="" value=""/>
                </div>
                <button class="btn btn-success" type="submit">Update Image</button>
                
            </div>
            </div>
        </form>
        
       
      </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>

  @endsection