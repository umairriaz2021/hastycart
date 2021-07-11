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
                      <p><strong>Product Name: </strong> {{$attributes->product_title}}</p>
                      <p><strong>Product SKU: </strong> {{$attributes->product_sku}}</p>
                      <p><strong>Product Color: </strong> {{$attributes->product_color}}</p>
                    </div>
              <div class="col-md-6 col-sm-12 col-12">
                  <div class="image_tg align-content-end">
                      <img src="{{asset("storage/products/$attributes->product_image")}}" width="250px" height="250px" class="img-fluid img-thumbnail" alt="">
                    </div>
                </div>
            </div>
            <form action="{{url("dashboard/products/add-images/$attributes->id")}}" enctype="multipart/form-data" method="POST" id="add_images">
                    @csrf
                <div class="form-group">
                    <input type="file" name="images[]" multiple="" class="" value=""/>
                </div>
                <button class="btn btn-success" type="submit">Add Images</button>
                
            </div>
            </div>
        </form>
            <table id="myTable" class="table table-bordered table-hover my-3">
          <thead>
          <tr class="text-center">
            <th>S#</th>
            <th>Images</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
            @if($attributes->images)
            
            <?php $i = 1;?>
            @foreach($attributes->images as $prod)
           
            <tr class='text-center'>
              <td class="align-middle">{{$i++}}</td>
              <td class="align-middle">
              <img src="{{asset('storage/products/'.$prod->image)}}" class="img-fluid img-thumbnail" width="150px" height="150px"> 
              </td>
              <td class="align-middle">
                  @if($prod->status == 1)
                  <a href="javascript:void(0)" class="attr_image" id="attr_image_{{$prod->id}}"  data="{{$prod->id}}">Active</a>
                  @else
                  <a href="javascript:void(0)" class="attr_image" id="attr_image_{{$prod->id}}"  data="{{$prod->id}}">Inactive</a>
                  @endif
              </td>
              
              <td class="align-middle">
               <a href="javascript:void(0)" class="text-secondary"><i class="fas fa-plus"></i></a> 
               | <a href="{{url('dashboard/products/edit-images/'.$prod->id)}}" class="text-secondary"><i class="fas fa-pencil-alt"></i></a> 
               | <a href="{{--{{url('dashboard/delete-cat/'.$cat->id)}}--}}javascript:void(0)" data-id="{{$prod->id}}" class="text-secondary" id="confirmProductImageDel"><i class="fas fa-trash-alt"></i></a> 
                               
              </td>
            </tr>
            <tr>
                @endforeach
            @endif
           
    
          </tbody>
          
        </table>
       
      </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>

  @endsection