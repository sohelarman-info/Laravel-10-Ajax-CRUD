<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    $(document).ready(function(){
        // Product add from modal
        $(document).on('click', '.add_product',function(e){
            e.preventDefault();
            let name = $('#name').val();
            let price = $('#price').val();
            $.ajax({
                url: "{{ route('AddProduct') }}",
                method: "post",
                data: {name:name, price:price},
                success: function(res){
                    if(res.status == 'success'){
                        $('#addProductForm')[0].reset();
                        $('#addProductModal').modal('hide');
                        $('.product-item').load(location.href+' .product-item');

                        Command: toastr["success"]("Product Added", "Success")

                        toastr.options = {
                        "closeButton": true,
                        "progressBar": true,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                        }
                    }
                },
                error: function(err){
                    let error = err.responseJSON;
                    $.each(error.errors, function(index, value){
                        $('.errorMsg').append("<span class='text-danger'>"+value+"</span><br>");
                    });
                }
            })
        })
        // Product add from Blade
        $(document).on('click', '.add_product_from_blade',function(e){
            e.preventDefault();
            let name = $('#product_name').val();
            let price = $('#product_price').val();
            $.ajax({
                url: "{{ route('AddProduct') }}",
                method: "post",
                data: {name:name, price:price},
                success: function(res){
                    if(res.status == 'success'){
                        $('#addProductForm')[0].reset();
                        $('#addProductModal').modal('hide');
                        $('.product-item').load(location.href+' .product-item');

                        Command: toastr["success"]("Product Added", "Success")

                        toastr.options = {
                        "closeButton": true,
                        "progressBar": true,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                        }
                    }
                },
                error: function(err){
                    let error = err.responseJSON;
                    $.each(error.errors, function(index, value){
                        $('.errorMsg').append("<span class='text-danger'>"+value+"</span><br>");
                    });
                }
            })
        })

        // show product value in update form
        $(document).on('click', '.update-product-form',function(e){
            let id = $(this).data('id')
            let name = $(this).data('name')
            let price = $(this).data('price')

            $('#update_id').val(id)
            $('#update_name').val(name)
            $('#update_price').val(price)
        })

        // Product Update
        $(document).on('click', '.update_product',function(e){
            e.preventDefault();
            let update_id = $('#update_id').val();
            let update_name = $('#update_name').val();
            let update_price = $('#update_price').val();

            $.ajax({
                url: "{{ route('UpdateProduct') }}",
                method: "post",
                data: {update_id:update_id, update_name:update_name, update_price:update_price},
                success: function(res){
                    if(res.status == 'success'){
                        $('#UpdateProductForm')[0].reset();
                        $('#UpdateProductModal').modal('hide');
                        $('.table').load(location.href+'table');

                        Command: toastr["success"]("Product Updated", "Success")

                        toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-center",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                        }
                    }
                },
                error: function(err){
                    let error = err.responseJSON;
                    $.each(error.errors, function(index, value){
                        $('.errorMsg').append("<span class='text-danger'>"+value+"</span><br>");
                    });
                }
            })
        })

        // Product Deleted
        $(document).on('click', '.delete_product',function(e){
            e.preventDefault();
            let product_id = $(this).data('id');
            if(confirm('Are you sure delete this product?')){
                $.ajax({
                    url: "{{ route('deleteProduct') }}",
                    method: "post",
                    data: {product_id:product_id},
                    success: function(res){
                        if(res.status == 'success'){
                            $('.product-item').load(location.href+' .product-item');
                        }

                        Command: toastr["success"]("Product Deleted", "Success")

                        toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-center",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                        }
                    }
                })
            }


        })

        //  ajax pagination
        $(document).on('click', '.pagination a', function(e){
            e.preventDefault();
            let page = $(this).attr('href').split('page=')[1]
            product(page)
        })

        function product(page){
            $.ajax({
                url: "/pagination/paginate-data?page="+page,
                success:function(res){
                    $('.product-item').html(res);
                }
            })
        }

        // search functionality
        $(document).on('keyup', function(e){
            e.preventDefault();
            let search = $('#search').val();

            $.ajax({
                url:"{{ route('searchProduct') }}",
                method:'GET',
                data: {search:search},
                success:function(res){
                    $('.product-item').html(res);
                    if(res.status == 'nothing_found'){
                        $('.product-item').html('<div class="text-danger text-center">'+'Search Result Not Found'+'</div>');
                    }
                }
            });
        });
    });
</script>
