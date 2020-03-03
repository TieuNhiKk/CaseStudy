<div class="text-center">
    <button type="button" class="btn btn-primary btn-lg my-3 w-75" data-toggle="modal" data-target="#addFood">
        <i class="btn-block fas fa-plus">Adding</i>
    </button>
</div>
<div class="modal fade text-center" id="addFood">
    <div class="modal-dialog">
        <form action="addFood" method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm sản phẩm</h4>
                    <button type="button" class="close" data-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="name4" class="form-control" require placeholder="Tên sản phẩm" id="inputDefault">
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" name="avatar4" accept="image/*">
                                <label class="custom-file-label" for="inputGroupFile02">Chọn ảnh mặt hàng</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Price</span>
                                </div>
                                <input type="text" name="price4" class="form-control" require aria-label="Amount (to the nearest VND)">
                                <div class="input-group-append">
                                    <span class="input-group-text">VNĐ</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <select class="custom-select" name="type4">
                            <option value="1">Food</option>
                            <option value="2">Drink</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-lg w-100 fas fa-save"></button>
                    <button type="button" class="btn btn-secondary mr-auto" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Delete food -->

<div class="modal text-center" id="delete<?= $food->id ?>">
    <div class="modal-dialog" role="document">
        <form action="deleteFood" method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mx-auto">Xác nhận xóa</h5>
                    <input type="hidden" name="id" value="<?= $food->id ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary float-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning float-right">DELETE</button>
                </div>
            </div>
        </form>
    </div>
</div>