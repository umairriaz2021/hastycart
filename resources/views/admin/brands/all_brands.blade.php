@extends('admin.dashboard.dashboard')
@section('title','All Brands')
@section('s')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">All Brands</h3>
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
              <th>Brand Name</th>
              <th>Status</th>
              <th>Updated_at</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
              @if($brand)
              <?php $i = 1;?>
              @foreach($brand as $brand)
              <tr>
                <td>{{$i++}}</td>
                <td>{{ucfirst($brand->name)}}</td>
                <td>
                  @if($brand->status == 1)
                  <a href="javascript:void(0)" class="brand_status" id="brand_status_{{$brand->id}}"  data="{{$brand->id}}">Active</a>
                  @else
                  <a href="javascript:void(0)" class="cat_status" id="cat_status_{{$brand->id}}"  data="{{$brand->id}}">Inactive</a>
                  @endif
                </td>
             
                <td>{{$brand->updated_at}}</td>
                <td>
                 <a href="{{url('dashboard/brands/add-edit/'.$brand->id)}}" class="text-secondary"><i class="fas fa-pencil-alt"></i></a> 
                 | <a href="{{--{{url('dashboard/delete-cat/'.$cat->id)}}--}}javascript:void(0)"  data-id="{{$brand->id}}" class="text-secondary" id="confirmBrandDel"><i class="fas fa-trash-alt"></i></a> 
                                 
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