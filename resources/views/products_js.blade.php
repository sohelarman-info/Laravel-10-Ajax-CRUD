<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
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
                    $('.table').load(location.href+' .product-item');
                }
            },
            error: function(err){
                let error = err.responseJSON;
                $.each(error.errors, function(index, value){
                    $('.errorMsg').append("<span class='text-danger'>"+value+"</span><br>");
                });
            }
        })
        // console.log(name+" "+price)
    })
</script>
