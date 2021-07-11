@extends('admin.dashboard.dashboard')
@section('title','All Products')
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
            <form action="{{url('dashboard/products/add-attributes/'.$attributes->id)}}" method="POST" id="add_attr">
                    @csrf
                <div class="field_wrapper">
                <div>
                    <input type="number" required name="size[]"  class="" placeholder="Size" style="width:100px;" value=""/>
                    <input type="text" required name="sku[]" class="" placeholder="SKU" style="width:100px;" value=""/>
                    <input type="number" required name="price[]" class="" placeholder="Price" style="width:100px;" value=""/>
                    <input type="number" required name="stock[]" class="" placeholder="Stock" style="width:100px;" value=""/>
                    <a href="javascript:void(0)" class="add_button" title="Add field"><i class="fas fa-plus"></i></a>
                </div>
                
            </div>
            <button class="btn btn-primary my-2" type="submit">submit</button>
            </div>
          </form>
        <form action="{{url("dashboard/products/edit-attributes/$attributes->id")}}" method="POST">
        <table id="myTable" class="table table-bordered table-hover my-3">
          <thead>
          <tr class="text-center">
            <th>S#</th>
            <th>Size</th>
            <th>Sku</th>
            <th>Stock</th>
            <th>Price</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
            @if($attributes->attributes)
            <?php $i = 1;?>
             @csrf
            @foreach($attributes->attributes as $prod)
            <input type="hidden" name="attrid[]" value="{{$prod->id}}">
            <tr class='text-center'>
              <td class="align-middle">{{$i++}}</td>
              <td class="align-middle">{{$prod->size}}</td>
              <td class="align-middle">{{$prod->sku}}</td>
              <td class="align-middle">
              <input type="number" name="stock[]" class="" placeholder="stock" style="width:100px;" value="{{$prod->stock}}"/>
              </td>
              <td class="align-middle">
              <input type="number" name="price[]" class="" placeholder="price" style="width:100px;" value="{{$prod->price}}"/>
              </td>
              <td class="align-middle">
                  @if($prod->status == 1)
                  <a href="javascript:void(0)" class="attr_status" id="attr_status_{{$prod->id}}"  data="{{$prod->id}}">Active</a>
                  @else
                  <a href="javascript:void(0)" class="attr_status" id="attr_status_{{$prod->id}}"  data="{{$prod->id}}">Inactive</a>
                  @endif
              </td>
              
              <td class="align-middle">
               <a href="javascript:void(0)" class="text-secondary"><i class="fas fa-plus"></i></a> 
               | <a href="javascript:void(0)" class="text-secondary"><i class="fas fa-pencil-alt"></i></a> 
               | <a href="{{--{{url('dashboard/delete-cat/'.$cat->id)}}--}}javascript:void(0)" data-id="{{$prod->id}}" class="text-secondary" id="confirmAttrDel"><i class="fas fa-trash-alt"></i></a> 
                               
              </td>
            </tr>
            <tr>
                @endforeach
            @endif
           
    
          </tbody>
          
        </table>
        <button type="submit" class="btn btn-success">Update</button>
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