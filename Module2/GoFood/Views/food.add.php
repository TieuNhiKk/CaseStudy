<div>
    <div class="text-center">
        <button type="button" class="btn btn-primary btn-lg my-3 w-75" data-toggle="modal" data-target="#addFood">
            <i class="btn-block fas fa-plus">Adding</i>
        </button>
    </div>
    <div class="modal fade text-center" id="addFood">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm sản phẩm</h4>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                </div>
                <div class="modal-body">
                    <form action="addFood" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" require placeholder="Tên sản phẩm" id="inputDefault">
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input type="file" name="avatar" accept="image/*" onchange="readURL(this);">
                                    <img src="#" id="avatar" width="50px" height="50px" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Giá</span>
                                    </div>
                                    <input type="text" name="price" class="form-control" require aria-label="Amount (to the nearest VND)">
                                    <div class="input-group-append">
                                        <span class="input-group-text">VNĐ</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <select class="custom-select" name="type">
                                <option value="1">Đồ ăn</option>
                                <option value="2">Đò uống</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success btn-lg w-75 mx-auto fas fa-save"></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>