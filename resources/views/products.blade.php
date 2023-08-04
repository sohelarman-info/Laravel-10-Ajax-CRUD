<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ajax CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

  </head>
  <body>


<div class="container">
<div class="row">
    <div class="col-md-8">
        <div class="product-lists">
            <div class="prodact-header text-center my-3">
                <h3>Product List</h3>
            </div>
            <div class="search-product mb-3">
                <div class="input-group">
                    <input type="text" name="search" id="search" class="form-control" placeholder="Search Here..." aria-label="Search Here...">
                    <button class="btn btn-secondary" type="button"><i class="las la-search"></i></button>
                  </div>
            </div>
            <div class="product-item">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col" class="text-center">SL</th>
                        <th scope="col">Name</th>
                        <th scope="col" class="text-center">Price</th>
                        <th scope="col" class="text-center">Created</th>
                        <th scope="col" class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $key=>$product)
                        <tr>
                          <th scope="row" class="text-center">{{ $key+1 }}</th>
                          <td>{{ $product->name }}</td>
                          <td class="text-center">{{ $product->price }}</td>
                          <td class="text-center">{{ $product->created_at->diffForHumans() }}</td>
                          <td class="text-center">
                              <a href="#"
                                class="btn btn-success btn-sm update-product-form"
                                data-bs-toggle="modal"
                                data-bs-target="#UpdateProductModal"
                                data-id="{{ $product->id }}"
                                data-name="{{ $product->name }}"
                                data-price="{{ $product->price }}"
                              >
                                  <i class="las la-edit"></i>
                              </a>
                              <a href="#" type="button"
                              class="btn btn-danger btn-sm delete_product"
                              data-id="{{ $product->id }}"
                              >
                                  <i class="las la-trash-alt"></i>
                              </a>
                          </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $products->links() !!}
            </div>

        </div>
    </div>
    <div class="col-md-4">
        <form action="#" method="POST" id="addProductForm">
            <div class="text-center">
                <a href="#" class="btn btn-success my-3" data-bs-toggle="modal" data-bs-target="#addProductModal"><i class="las la-plus"></i> Add Product</a>
            </div>
            <div class="border p-3">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Product Name</label>
                    <input type="text"  name="product_name" id="product_name" class="form-control" id="exampleFormControlInput1" placeholder="product name">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Product Price</label>
                    <input type="number" name="product_price" id="product_price" class="form-control" id="exampleFormControlInput1" placeholder="200">
                </div>
                <div class="mb-3 d-grid gap-2">
                    <button type="button" class="btn btn-success fluid add_product_from_blade">Add Product</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>



@include('products_js')
@include('add_product_modal')
@include('update_product_modal')
{!! Toastr::message() !!}
</body>
</html>
