<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ajax CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
  </head>
  <body>


<div class="container">
<div class="row">
    <div class="col-md-4">
        <a href="#" class="btn btn-success my-3" data-bs-toggle="modal" data-bs-target="#addProductModal">Add Product</a>
    </div>
    <div class="col-md-8">
        <div class="product-lists">
            <div class="prodact-header text-center my-3">
                <h3>Product List</h3>
            </div>
            <div class="product-item">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">SL</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col" class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td class="text-center">
                            <a href="#" class="btn btn-success btn-sm">
                                <i class="las la-edit"></i>
                            </a>
                            <a href="#" type="button" class="btn btn-danger btn-sm">
                                <i class="las la-trash-alt"></i>
                            </a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>
</div>



@include('products_js')
@include('add_product_modal')
  </body>
</html>
