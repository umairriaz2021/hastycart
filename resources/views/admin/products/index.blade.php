@extends('admin.dashboard.dashboard')
@section('title','All Products')
@section('s')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">All Products</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            @if(Session::has('msg'))
            <span class="alert alert-success my-3 w-100">{{Session::get('msg')}}</span>
            @elseif(Session::has('message'))
            <span class="alert alert-success my-3 w-100">{{Session::get('message')}}</span>
            @endif
            
          </div>
          <table id="myTable" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>S#</th>
              <th>Product Title</th>
              <th>Image</th>
              <th>Section</th>
              <th>Category</th>
              <th>Price</th>
              <th>Status</th>
              <th>URL</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
              @if($products)
              <?php $i = 1;?>
              @foreach($products as $prod)
              <tr class='text-center'>
                <td class="align-middle">{{$i++}}</td>
                <td class="align-middle">{{$prod->product_title}}</td>
                <td class="align-middle"><img src="{{asset('storage/products/'.$prod->product_image)}}" class="img-fluid img-thumbnail" width="100px" height="100px"></td>
                <td class="align-middle">{{$prod->sections->sec_title}}</td>
                <td class="align-middle">{{$prod->categories->cat_title}}</td>
                <td class="align-middle">${{$prod->product_price}}</td>
                <td class="align-middle">
                    @if($prod->status == 1)
                    <a href="javascript:void(0)" class="prod_status" id="prod_status_{{$prod->id}}"  data="{{$prod->id}}">Active</a>
                    @else
                    <a href="javascript:void(0)" class="prod_status" id="prod_status_{{$prod->id}}"  data="{{$prod->id}}">Inactive</a>
                    @endif
                </td>
                
                <td class="align-middle">{{$prod->slug}}</td>
                <td class="align-middle">
                 <a href="{{url('dashboard/products/add-attributes/'.$prod->id)}}" class="text-secondary"><i class="fas fa-plus"></i></a> 
                 | <a href="{{url('dashboard/products/add-images/'.$prod->id)}}" class="text-secondary"><i class="fas fa-plus-square"></i></a> 
                 | <a href="{{url('dashboard/add-product/'.$prod->id)}}" class="text-secondary"><i class="fas fa-pencil-alt"></i></a> 
                 | <a href="{{--{{url('dashboard/delete-cat/'.$cat->id)}}--}}javascript:void(0)" data="prod" data-id="{{$prod->id}}" class="text-secondary" id="confirmProdDel"><i class="fas fa-trash-alt"></i></a> 
                                 
                </td>
              </tr>
              <tr>
                  @endforeach
              @endif
             
          
            </tbody>
            
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>

  @endsection