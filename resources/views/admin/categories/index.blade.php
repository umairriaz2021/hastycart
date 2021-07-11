@extends('admin.dashboard.dashboard')
@section('title','All Categories')
@section('s')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">All Categories</h3>
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
              <th>Category Name</th>
              <th>Category Level</th>
              <th>Section Name</th>
              <th>Status</th>
              <th>URL</th>
              <th>Updated_at</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
              @if($categories)
              <?php $i = 1;?>
              @foreach($categories as $cat)
              @if(!empty($cat->categories))
              <?php $parent_name = $cat->categories->cat_title;?>
              @else
              <?php $parent_name = 'Root';?>
              @endif
              <tr>
                <td>{{$i++}}</td>
                <td>{{$cat->cat_title}}</td>
                <td>{{$parent_name}}</td>
                <td>{{$cat->sections->sec_title}}</td>
                <td>
                  @if($cat->status == 1)
                  <a href="javascript:void(0)" class="cat_status" id="cat_status_{{$cat->id}}"  data="{{$cat->id}}">Active</a>
                  @else
                  <a href="javascript:void(0)" class="cat_status" id="cat_status_{{$cat->id}}"  data="{{$cat->id}}">Inactive</a>
                  @endif
                </td>
                <td>{{$cat->slug}}</td>
                <td>{{$cat->updated_at}}</td>
                <td>
                 <a href="javascript:void(0)" class="text-secondary"><i class="fas fa-eye"></i></a> 
                 | <a href="{{url('dashboard/add-category/'.$cat->id)}}" class="text-secondary"><i class="fas fa-pencil-alt"></i></a> 
                 | <a href="{{--{{url('dashboard/delete-cat/'.$cat->id)}}--}}javascript:void(0)" data="cat" data-id="{{$cat->id}}" class="text-secondary" id="confirmDel"><i class="fas fa-trash-alt"></i></a> 
                                 
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