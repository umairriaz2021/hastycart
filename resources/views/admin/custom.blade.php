<script src="123">
    $(document).ready(function(){
       
        $('.status').on('click',function(){
            var id = $(this).attr('data');
            var st = $(this).text();
            //console.log(id);
            $.ajax({
                url:'{{route("status.check")}}',
                type:'POST',
                data:{id:id,st:st},
                success:function(resp){
                    //console.log(resp.section_id);
                    if(resp.status==0){
                       $('#status_'+resp.section_id).html('<a href="javascript:void(0)" class="status">Inactive</a>');
                    }
                    else{
                        $('#status_'+resp.section_id).html('<a href="javascript:void(0)" class="status">Active</a>');
                        
                   }
                }
            });
        });

        $('.cat_status').on('click',function(){
            var id = $(this).attr('data');
            var st = $(this).text();
            //console.log(id);
            $.ajax({
                url:'{{route("categories.status_check")}}',
                type:'POST',
                data:{id:id,st:st},
                success:function(resp){
                    //console.log(resp.status);
                    if(resp.status==0){
                       $('#cat_status_'+resp.cat_id).html('<a href="javascript:void(0)" class="cat_status">Inactive</a>');
                    }
                    else{
                        $('#cat_status_'+resp.cat_id).html('<a href="javascript:void(0)" class="cat_status">Active</a>');
                        
                   }
                }
            });
        });  


        $(document).on('click','#confirmDel',function(){
        var data = $(this).attr('data');
        var id = $(this).attr('data-id');
        swal.fire({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        showCancelButton:true,
        confirmButtonColor:'#3085d6',
        cancelButtonColor:'#d33',
        confirmButtonText:'Yes, deleted',    
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete.value) {
            swal.fire("Poof! Your imaginary file has been deleted!", {
            icon: "success",
            });
            window.location.href = 'delete-'+data+'/'+id;
        } 
        });
    });
    
    $('.prod_status').click(function(){
        var status = $(this).text();
        var prod_id = $(this).attr('data');
        $.ajax({
            url:'{{route("prod.active_inactive")}}',
            type:'POST',
            data:{status:status,prod_id:prod_id},
            success:function(resp){
                if(resp.status == 1){
                    $('#prod_status_'+resp.prod_id).html('<a href="javascript:void(0)" class="prod_status">Inactive</a>');
                }
                else{
                    $('#prod_status_'+resp.prod_id).html('<a href="javascript:void(0)" class="prod_status">Active</a>');

                }
            }
        });
    });

    $(document).on('click','#confirmProdDel',function(){
        var data = $(this).attr('data');
        var id = $(this).attr('data-id');
        swal.fire({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        showCancelButton:true,
        confirmButtonColor:'#3085d6',
        cancelButtonColor:'#d33',
        confirmButtonText:'Yes, deleted',    
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete.value) {
            swal.fire("Poof! Your imaginary file has been deleted!", {
            icon: "success",
            });
            window.location.href = data+'-delete/'+id;
        } 
        });
    });
    $('.attr_status').on('click',function(e){
        e.preventDefault();
        var id = $(this).attr('data');
        var name = $(this).text();
        $.ajax({
            url:'{{url("dashboard/products/attribute-status")}}',
            type:'POST',
            data:{id:id,name:name},
            success:function(res){
                console.log(res.status);
                if(res.status == 0){
                    $('#attr_status_'+res.id).html('<a href="javascript:void(0)" class="attr_status">Inactive</a>')
                }
                else{
                    $('#attr_status_'+res.id).html('<a href="javascript:void(0)" class="attr_status">Active</a>')

                }
            }
        });
    });

    $('.attr_image').on('click',function(){
         var status = $(this).text();
         var id = $(this).attr('data');
         $.ajax({
             url:"{{route('productimg.active')}}",
             type:'POST',
             data:{status:status,id:id},
             success:function(res){
                 if(res.status == 'Inactive'){
                     $('#attr_image_'+res.id).html('<a href="javascript:void(0)" class="attr_image">Active</a>');
                 }
                 else{
                     $('#attr_image_'+res.id).html('<a href="javascript:void(0)" class="attr_image">Inactive</a>');

                 }
             }
         });
    });

    $('.brand_status').on('click',function(){
        let id = $(this).attr('data');
        let status = $(this).text();
        $.ajax({
            url:"{{route('brand.status')}}",
            type:'POST',
            data:{id:id,status:status},
            success:function(res){
                console.log(res.id);
                if(res.id == 0){
                    $('#brand_status_'+res.id).html('<a href="javascript:void(0)" class="brand_status">Active</a>');
                }
                else{
                    $('#brand_status_'+res.id).html('<a href="javascript:void(0)" class="brand_status">Inactive</a>');
                }
            }
        });
    });

    $(document).on('click','#confirmProductImageDel',function(){
        let id = $(this).attr('data-id');
        let conf = confirm('Are you sure, you want to delete this image');
        if(conf){
            $.ajax({
                url:"{{route('productImage.del')}}",
                type:'POST',
                data:{id:id},
                success:function(res){
                    setTimeout(function(){
                        location.reload();
                    },1000);
                }
            });
        }
    });

    $(document).on('click','#confirmAttrDel',function(e){
        e.preventDefault();
        let id = $(this).attr('data-id');
        let conf = confirm('Are you sure, you want to delete this attribute');
        if(conf){
            $.ajax({
                url:'{{route("attribute.delete")}}',
                type:'POST',
                data:{id:id},
                success:function(res){
                    //console.log(res);
                if(res.status == 200){
                    setTimeout(function(){
                        location.reload();
                    },1000);
                }
               
                }

            });
        }
    });

    $(document).on('click','#confirmBrandDel',function(){
        let id = $(this).attr('data-id');
        let conf = confirm('Are you sure, you want to delete this brand');
        if(conf){
            $.ajax({
            url:"{{url('dashboard/brands/delete-image')}}",
            type:'POST',
            data:{id:id},
            success:function(res){
                if(res.status==1){
                    setTimeout(function(){
                        location.reload();
                    },1000);
                }
                console.log(res);
            }
        });
        }
    });

    var maxField1 = 4; //Input fields increment limitation
    var addButton1 = $('.add_button_1'); //Add button selector
    var wrapper1 = $('.field_wrapper_1'); //Input field wrapper
    var fieldHTML1 = '<div><input type="file" name="images[]" multiple="" class="mt-2" style="" required /><a href="javascript:void(0);" class="remove_button"><i class="fas fa-trash-alt"></i></a></div>'; //New input field html 
    var f = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton1).click(function(){
        //Check maximum number of input fields
        if(f < maxField1){ 
            f++; //Increment field counter
            $(wrapper1).append(fieldHTML1); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper1).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        f--; //Decrement field counter
    });
    
    $("#myTable").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('.select2').select2();
   
    $('#curr_pass').keyup(function(){
        var curr_ps = $(this).val();
        var curr_length = $(this).length;
        
        $.ajax({
            url:'{{route("check.password")}}',
            type:'POST',
            data:{curr_ps:curr_ps},
            success:function(resp){
                console.log(resp);
            if(resp=="false"){
                $('#show_res').html('<span class="text-danger">Password not matched</span>');
            }
            else{
                $('#show_res').html('<span class="text-success">Password Correct</span>');
              }
            }
        });
    });
    

    $('#section_id').change(function(){
        var sec_id = $(this).val();
        $.ajax({
            url:'{{route("append.cat")}}',
            type:'POST',
            data:{sec_id:sec_id},
            success:function(resp){
                $('#main_cat').html(resp);
            }
        });
    });

    var maxField = 5; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div><input type="number" name="size[]" class="mr-1 mt-2" placeholder="Size" style="width:100px;" required value=""/><input type="number" name="sku[]" class="mr-1 mt-2" placeholder="SKU" style="width:100px;" required value=""/><input type="number" name="price[]" class="mr-1 mt-2" placeholder="Price" style="width:100px;" required value=""/><input type="number" name="stock[]" class="mr-1 mt-2" placeholder="Stock" required style="width:100px;" value=""/><a href="javascript:void(0);" class="remove_button"><i class="fas fa-trash-alt"></i></a></div>'; //New input field html 
    
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
   
  

  
   
    
});


    </script>