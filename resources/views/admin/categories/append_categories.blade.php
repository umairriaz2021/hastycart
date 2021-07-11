 
                          <div class="form-group">
                            <label>Category Levels</label>
                            <select class="form-control" name="parent_id" style="width:100%;">
                              <option value="0" @if(isset($catdata->parent_id) && $catdata->parent_id == 0) selected="" @endif>Main Category</option>
                              
                              @if(!empty($getCat))
                            
                             @foreach($getCat as $cat)
                             <option value="{{$cat['id']}}" @if(isset($catdata->parent_id) &&  $catdata->parent_id == $cat['id']) selected="" @endif>{{$cat['cat_title']}}</option>
                             @if(!empty($cat['subcategories']))
                             @foreach($cat['subcategories'] as $sub)
                             {{-- <option value="">{{$cat['subcategories']}}</option> --}}
                             <option value={{$sub['id']}}>&nbsp;&raquo;&nbsp;{{$sub['cat_title']}}</option>
                             
                             @endforeach
                             @endif
                             @endforeach
                             @endif
                            </select>
                          </div>