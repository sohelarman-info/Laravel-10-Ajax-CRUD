<!-- Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="productModelLabel" aria-hidden="true">
    <form action="#" method="POST" id="addProductForm">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="productModelLabel">Add Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Product Name</label>
                    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Monitor">
                    <p class="mt-1 text-danger">error</p>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Product Price</label>
                    <input type="text" name="price" class="form-control" id="exampleFormControlInput1" placeholder="7000">

                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </div>
    </form>
  </div>
