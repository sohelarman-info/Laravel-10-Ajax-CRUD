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

