<?php require "html/nav.php" ?>
<i class='fas fa-user-circle btn btn-toolbar' data-toggle="modal" style="font-size: 42px ;color:seashell" data-target="#myinfor"></i>
</div>
<a href="?admin=1" <?= $_SESSION['user']->access == 2 ? '' : 'hidden' ?> class="btn btn-outline-success btn-group">Admin</a>
</div>
</nav>
<div>
    <div class="modal fade" id="myinfor">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title text-center">Thông tin</h4>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Đóng</button>
                </div>
                <div class="modal-body bg-sencondary">
                    <!-- name -->
                    <div class="row my-2">
                        <label class="col-4">Họ và tên:</label>
                        <span class="col-8"><?= ucwords($_SESSION['user']->name) ?></span>
                    </div>
                    <!-- phone -->
                    <div class="row my-2">
                        <label class="col-4">Số điện thoại:</label>
                        <span class="col-8"><?= $_SESSION['user']->phone ?></span>
                    </div>
                    <!-- email -->
                    <div class="row my-2">
                        <label class="col-4">Email:</label>
                        <span class="col-8"><?= $_SESSION['user']->email ?></span>
                    </div>
                    <!-- address -->
                    <div class="row my-2">
                        <label class="col-4">Địa chỉ:</label>
                        <span class="col-8"><?= $_SESSION['user']->address ?></span>
                    </div>
                </div>
                <div class="modal-footer row">
                    <a href="#userUpdate" type="button" class="btn btn-warning col-5" data-toggle="modal" data-dismiss="modal">
                        <i class="fa fa-user-edit">Sửa</i>
                    </a>
                    <form action="logOut" class="col-5" method="post">
                        <button type="sybmit" class="btn btn-danger">
                            <i class='fa fa-sign-out-alt'> Đăng xuất</i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="userUpdate">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title">Chỉnh sửa Thông tin</h4>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Đóng</button>
                </div>
                <div class="modal-body">
                    <form action="userUpdate" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $_SESSION['user']->value ?>">
                        <div class="row my-2">
                            <label class="col-3">Họ và tên:</label>
                            <input type="text" name="name" class="form-control col-9" placeholder="col-form-label-sm" value="<?= $_SESSION['user']->name ?>">
                            <!-- phone -->
                        </div>
                        <div class="row my-2">
                            <label class="col-3">Điện thoại:</label>
                            <input type="tel" name="phone" class="form-control col-9" placeholder="0913721389" value="<?= $_SESSION['user']->phone ?>">
                        </div>
                        <!-- email -->
                        <div class="row my-2">
                            <label class="col-3">Email:</label>
                            <input type="email" name="email" class="form-control col-9" placeholder="example@gmail.com" value="<?= $_SESSION['user']->email ?>">
                        </div>
                        <!-- address -->
                        <div class="row my-2">
                            <label class="col-3">Địa chỉ:</label>
                            <input type="text" name="address" class="form-control col-9" placeholder="12 Điện Biên Phủ" value="<?= $_SESSION['user']->address ?>">
                        </div>
                        <!-- Password -->
                        <div class="row my-2">
                            <label class="col-3">Mật khẩu:</label>
                            <input type="password" name="password" class="form-control col-9" placeholder="Mật khẩu" pattern="\w{6,}">
                        </div>
                        <button type="submit" class="btn btn-primary w-75 mx-auto btn-block">
                            <i class='fas fa-save'>Lưu</i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>