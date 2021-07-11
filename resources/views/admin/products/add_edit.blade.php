@extends('admin.dashboard.dashboard')
@section('title','Add / Edit Categories')
@section('s')
<div class="row">
    @if(Session::has('msg'))
    <div class="alert alert-success my-3 w-100 rounded-0">{{Session::get('msg')}}</div>

    @elseif ($errors->any())
    <div class="alert alert-danger w-100">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @elseif(Session::has('e'))
    <div class="alert alert-danger my-3 w-100 rounded-0">{{Session::get('err')}}</div>

    @endif
    <div class="col-12">

        <div class="card">

            <div class="card-header">
                <h3 class="card-title">{{$product_title}}</h3>
            </div>
            <!-- /.card-header -->
            <form
                action="@if(empty($products)) {{route('prod.add_edit')}} @else {{url('dashboard/add-product/'.$products->id)}} @endif"
                method="POST" id="add_edit_form" class="add_edit_form" enctype="multipart/form-data">
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
                                <label for="prod_title">Product Title</label>
                                <input type="text" required class="form-control" id="prod_title" name="prod_title"
                                    placeholder="Enter Product Title"
                                    value="@if(!empty($products)) {{$products->product_title}} @else {{old('prod_title')}} @endif">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Main Categories</label>
                                <select class="form-control select2" required name="cat_id" id="cat_id"
                                    style="width:100%;">
                                    <option value="0">Select Categories</option>
                                    @foreach($sections as $section)
                                    <optgroup label="{{$section->sec_title}}"></optgroup>
                                    @foreach($section->categories as $cat)
                                    <option value="{{$cat->id}}" @if(!empty(old('cat_id')) && old('cat_id')==$cat->id)
                                        selected="" @elseif(!empty($products->category_id) && $products->category_id ==
                                        $cat->id) selected="" @endif>&nbsp;&nbsp;--&nbsp;&nbsp;{{$cat->cat_title}}
                                    </option>
                                    @foreach($cat->subcategories as $subcat)
                                    <option value="{{$subcat->id}}" @if(!empty(old('cat_id')) &&
                                        old('cat_id')==$subcat->id) selected="" @elseif(!empty($products->category_id)
                                        && $products->category_id == $subcat->id) selected=""
                                        @endif>&nbsp;&nbsp;&nbsp;&nbsp;--&nbsp;&nbsp;&nbsp;&nbsp;{{$subcat->cat_title}}
                                    </option>
                                    @endforeach
                                    @endforeach
                                    @endforeach
                                </select>
                            </div>



                        </div>


                    </div>
                    <!-- /.form-group -->


                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-sm-12">
                            <div class="form-group">
                                <label>SKU</label>
                                <input type="text" name="prod_sku" required id="prod_sku" class="form-control"
                                    value="@if(!empty($products)) {{$products->product_sku}} @else {{old('prod_sku')}} @endif"
                                    placeholder="Enter SKU">
                            </div>

                        </div>
                        <div class="col-md-4 col-sm-6 col-sm-12">
                            <div class="form-group">
                                <label>Product Color</label>
                                <input type="text" name="prod_color" required id="prod_color" class="form-control"
                                    value="@if(!empty($products)) {{$products->product_color}} @else {{old('prod_color')}} @endif"
                                    placeholder="Enter Product Color">

                            </div>



                        </div>

                        <div class="col-md-4 col-sm-6 col-sm-12">
                            <div class="form-group">
                                <label for="">Product Price</label>
                                <input type="text" name="prod_price" required id="prod_price" class="form-control"
                                    value="@if(!empty($products)) {{$products->product_price}} @else {{old('prod_price')}} @endif"
                                    placeholder="Enter Product Price">
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-12">
                            <div class="form-group">
                                <label for="prod_fabric">Fabric</label>
                                <select name="prod_fabric" class="form-control" id="prod_fabric">
                                    <option value="0">All Fabrics</option>
                                    @foreach($fabricArray as $key => $fabric)
                                    <option value="{{strtolower($fabric)}}" @if(!empty($products->fabric) &&
                                        strtolower($products->fabric) == strtolower($fabric)) selected=""
                                        @endif>{{$fabric}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-12">
                            <div class="form-group">
                                <label for="prod_sleeve">Sleeves</label>

                                <select name="prod_sleeve" class="form-control" id="prod_sleeve_array">
                                    <option value="0">All Sleeves</option>
                                    @foreach($sleeveArray as $sleeves)
                                    <option value="{{strtolower($sleeves)}}" @if(!empty($products->sleeve) &&
                                        strtolower($products->sleeve) == strtolower($sleeves)) selected=""
                                        @endif>{{$sleeves}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-12">
                            <div class="form-group">
                                <label for="prod_pattern">Patterns</label>
                                <select name="prod_pattern" class="form-control" id="prod_pattern">
                                    <option value="0">All Patterns</option>
                                    @foreach($patternArray as $pattern)
                                    <option value="{{strtolower($pattern)}}" @if(!empty($products->pattern) &&
                                        strtolower($products->pattern) == strtolower($pattern)) selected=""
                                        @endif>{{$pattern}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="prod_fit">Fit</label>
                                <select name="prod_fit" class="form-control" id="prod_fit">
                                    <option value="0">All Fits</option>
                                    @foreach($fitArray as $fit)
                                    <option value="{{strtolower($fit)}}" @if(!empty($products->fit) &&
                                        strtolower($products->fit) ==strtolower($fit)) selected="" @endif>{{$fit}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="prod_occassion">Ocassions</label>
                                <select name="prod_ocassion" class="form-control" id="prod_ocassion">
                                    <option value="0">All Ocassions</option>
                                    @foreach($ocassionArray as $ocassion)
                                    <option value="{{strtolower($ocassion)}}" @if(!empty($products->occassion) &&
                                        strtolower($products->occassion) == strtolower($ocassion)) selected=""
                                        @endif>{{$ocassion}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="">Product Discount</label>
                                <input type="text" name="prod_disc" id="prod_disc" class="form-control"
                                    value="@if(!empty($products)) {{$products->product_discount}} @else {{old('prod_disc')}} @endif"
                                    placeholder="Enter Product Discount">
                            </div>

                        </div>



                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Product Weight</label>
                                <input type="text" name="prod_weight" id="prod_weight" class="form-control"
                                    value="@if(!empty($products)) {{$products->product_weight}} @else {{old('prod_weight')}} @endif"
                                    placeholder="Enter Product Weight">

                            </div>


                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="prod_img" id="prod_img">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>

                                </div>
                                <div class="my-3">
                                    @if(!empty($products->product_image))
                                    <img src="{{asset('storage/products/'.$products->product_image)}}"
                                        class="img-fluid img-thumbnail" width="150px" height="150px" alt="">
                                    @else
                                    <img src="{{asset('storage/products/no-image.png')}}"
                                        class="img-fluid img-thumbnail" width="150px" height="150px" alt="">
                                    @endif
                                    @if(!empty($products->id))
                                    <a href="{{url('dashboard/products/image-delete/'.$products->id)}}" id="img_del"
                                        name="img_del" data-id="{{$products->id}}" class="btn btn-outline-danger ml-3">
                                        Delete</a>
                                    @endif

                                </div>
                            </div>

                        </div>



                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="prod_video" id="prod_video">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>

                                </div>

                            </div>
                            <div class="mt-3">
                                @if(!empty($products->product_video))
                                <img src="{{asset('storage/products/'.$products->product_video)}}"
                                    class="img-fluid img-thumbnail" width="150px" height="150px" alt="">
                                @endif
                                @if(!empty($products->id))
                                <a href="{{url('dashboard/products/delete-video/'.$products->id)}}"
                                    class="btn btn-outline-secondary ml-3">Delete</a>

                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-12">
                        <h3 class="text-center font-weight-bold my-5">SEO Section</h3>

                    </div>
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="prod_desc">Product Description</label>
                                <textarea name="prod_desc" id="prod_desc" class="form-control" cols="30"
                                    rows="10">@if(!empty($products)) {{$products->product_desc}} @else {{old('prod_desc')}} @endif</textarea>
                            </div>
                        </div>



                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="wash_care">Description</label>
                                <textarea name="wash_care" id="wash_care" class="form-control" cols="30"
                                    rows="10">@if(!empty($products)) {{$products->wash_care}} @else {{old('wash_care')}} @endif</textarea>
                            </div>


                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="prod_slug">Slug</label>
                                <input type="text" name="prod_slug" id="prod_slug" class="form-control"
                                    value="@if(!empty($products)) {{$products->slug}} @else {{old('prod_slug')}} @endif">
                            </div>
                        </div>



                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="meta_title">Meta Title</label>
                                <input type="text" name="meta_title" id="meta_title" class="form-control"
                                    value="@if(!empty($products)) {{$products->meta_title}} @else {{old('meta_title')}} @endif">
                            </div>


                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="meta_desc">Meta Description</label>
                                <textarea name="meta_desc" id="meta_desc" class="form-control" cols="30"
                                    rows="10">@if(!empty($products->meta_desc)) {{$products->meta_desc}} @else {{old('meta_desc')}} @endif</textarea>
                            </div>
                        </div>



                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="meta_key">Meta Keywords</label>
                                <textarea name="meta_key" id="meta_key" class="form-control" cols="30"
                                    rows="10">@if(!empty($products->meta_keywords)) {{$products->meta_keywords}} @else {{old('meta_key')}} @endif</textarea>
                            </div>


                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="">Is Featured: </label><br>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label" for="inlineCheckbox1">Yes</label>
                                    <input class="form-check-input ml-1" type="checkbox" name="feature"
                                        @if(!empty($products->is_featured) && $products->is_featured == 'yes') checked
                                    @else value="yes" @endif id="inlineCheckbox1">
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label" for="inlineCheckbox2">No</label>
                                    <input class="form-check-input ml-1" type="checkbox" id="inlineCheckbox2"
                                        name="feature" @if(!empty($products->is_featured) && $products->is_featured ==
                                    'no') checked @else value="no" @endif>
                                </div>
                            </div>
                        </div>
                    </div>






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
