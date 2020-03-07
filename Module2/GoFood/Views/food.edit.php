<!-- Delete food -->

<div class="modal" id="delete<?= $food->id ?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mx-auto">Xác nhận xóa</h5>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
            <div class="modal-body">
                <form action="deleteFood" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $food->id ?>">
                    <button type="submit" class="btn btn-warning btn-block w-75 mx-auto">Xóa</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Edit food -->
<div class="modal" id="editFood<?= $food->id ?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mx-auto">Sửa thông tin</h5>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
            <div class="modal-body">
                <form action="editFood" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $food->id ?>">
                    <div class="form-group">
                        <input type="text" name="name" value="<?= $food->name ?>" class="form-control" require placeholder="Tên sản phẩm" id="inputDefault">
                    </div>
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" name="avatar" accept="image/*" onchange="readURL(this);">
                            <img src="<?= $food->avatar ?>" id="avatar" width="50px" height="50px" alt="">
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Price</span>
                        </div>
                        <input type="text" name="price" class="form-control" require value="<?= $food->price ?>" aria-label="Amount (to the nearest VND)">
                        <div class="input-group-append">
                            <span class="input-group-text">VNĐ</span>
                        </div>

                    </div>
                    <div class="form-group my-3">
                        <select class="custom-select" name="type">
                            <option value="1" <?= $food->type == 1 ? "selected" : '' ?>>Food</option>
                            <option value="2" <?= $food->type == 1 ? "" : 'selected' ?>>Drink</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success form-control w-75 mx-auto fas fa-save"></button>
                </form>
            </div>
        </div>
    </div>
</div>