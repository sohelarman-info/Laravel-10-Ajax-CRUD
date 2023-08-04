<!-- Modal -->
<div class="modal fade" id="UpdateProductModal" tabindex="-1" aria-labelledby="productUpdateModelLabel" aria-hidden="true">
    <form action="#" method="POST" id="UpdateProductForm">
        @csrf
        <div class="modal-dialog">
            <input type="hidden" name="update_id" id="update_id">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="productUpdateModelLabel">Update Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="errorMsg"></div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Product Name</label>
                    <input type="text" name="update_name" id="update_name" class="form-control" id="exampleFormControlInput1">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Product Price</label>
                    <input type="text" name="update_price" id="update_price" class="form-control" id="exampleFormControlInput1">

                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary update_product">Update</button>
              </div>
            </div>
          </div>
    </form>
  </div>
