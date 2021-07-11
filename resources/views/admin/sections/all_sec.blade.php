@extends('admin.dashboard.dashboard')
@section('title','All Section')
@section('s')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">DataTable with minimal features & hover style</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="myTable" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>S#</th>
              <th>Section Name</th>
              <th>Status</th>
              <th>Updated_at</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
              @if($sections)
              <?php $i = 1;?>
              @foreach($sections as $sec)
              <tr>
                <td>{{$i++}}</td>
                <td>{{$sec->sec_title}}</td>
                <td>
                  @if($sec->status == 1)
                  <a href="javascript:void(0)" class="status" id="status_{{$sec->id}}"  data="{{$sec->id}}">Active</a>
                  @else
                  <a href="javascript:void(0)" class="status" id="status_{{$sec->id}}"  data="{{$sec->id}}">Inactive</a>
                  @endif
                </td>
                <td>{{$sec->updated_at}}</td>
                <td>
                 <a href="javascript:void(0)" class="text-secondary"><i class="fas fa-eye"></i></a> 
                 | <a href="javascript:void(0)" class="text-secondary"><i class="fas fa-pencil-alt"></i></a> 
                 | <a href="javascript:void(0)" class="text-secondary"><i class="fas fa-trash-alt"></i></a> 
                                 
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