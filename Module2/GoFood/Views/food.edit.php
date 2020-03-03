<!-- Delete food -->

<div class="modal" id="delete<?= $food->id ?>">
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
<!-- Edit food -->
<div class="modal" id="editFood<?= $food->id ?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="editFood" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $food->id ?>">
                <div class="modal-header">
                    <h5 class="modal-title mx-auto">Sửa thông tin</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="name3" value="<?= $food->name ?>" class="form-control" require placeholder="Tên sản phẩm" id="inputDefault">
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" name="avatar3" accept="image/*" class="custom-file-input" id="inputGroupFile02">
                                <label class="custom-file-label" for="inputGroupFile02">Tải ảnh</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Price</span>
                                </div>
                                <input type="text" name="price3" class="form-control" require value="<?= $food->price ?>" aria-label="Amount (to the nearest VND)">
                                <div class="input-group-append">
                                    <span class="input-group-text">VNĐ</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <select class="custom-select" name="type3">
                            <option value="1" <?= $food->type == 1 ? "selected" : '' ?>>Food</option>
                            <option value="2" <?= $food->type == 1 ? "" : 'selected' ?>>Drink</option>
                        </select>
                    </div>
                </div>
                <div class="footer">
                    <button type="submit" class="btn btn-success btn-lg w-25 fas fa-save"></button>
                    <button type="button" class="btn btn-secondary mr-auto float-right" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>