<?php require "html/nav.php" ?>
<i class="btn btn-toolbar">
    <img id='useravatar' src="<?= $_SESSION['login']->avatar != '' ? $_SESSION['login']->avatar : $_SESSION['login']->avatar = 'Public/guest.png' ?>" class="rounded-circle" data-toggle="modal" data-target="#myinfor">
</i>
</div>
<a href="?admin=1" <?= $_SESSION['login']->access == 2 ? '' : 'hidden' ?> class="btn btn-outline-success btn-group">Admin</a>
</div>
</nav>
<div class="modal fade" id="myinfor">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title text-center">Thông tin</h4>
                <img src="<?= $_SESSION['login']->avatar ?>" alt="<?= $_SESSION['login']->name ?>" id="useravatar">
                <button type="button" class="close" data-dismiss="modal">Đóng</button>
            </div>
            <div class="modal-body">
                <!-- name -->
                <div class="form-group row">
                    <label for="a" class="col-sm-3 col-form-label col-form-label-sm">Họ và tên</label>
                    <div class="col-sm-9">
                        <p><?= ucwords($_SESSION['login']->name) ?></p>
                    </div>
                </div>
                <!-- phone -->
                <div class="form-group row">
                    <label for="a" class="col-sm-3 col-form-label col-form-label-sm">Số điện thoại</label>
                    <div class="col-sm-9">
                        <p><?= $_SESSION['login']->phone ?></p>
                    </div>
                </div>
                <!-- email -->
                <div class="form-group row">
                    <label for="a" class="col-sm-3 col-form-label col-form-label-sm">Email</label>
                    <div class="col-sm-9">
                        <p><?= $_SESSION['login']->email ?></p>
                    </div>
                </div>
                <!-- address -->
                <div class="form-group row">
                    <label for="a" class="col-sm-3 col-form-label col-form-label-sm">Địa chỉ</label>
                    <div class="col-sm-9">
                        <p><?= $_SESSION['login']->address ?></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#userUpdate">
                    <i class='fas fa-user-edit'> Sửa</i>
                </button>
                <form action="logOut" method="post">
                    <button type="sybmit" class="btn btn-danger">
                        <i class='fas fa-sign-out-alt'>Thoát</i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="userUpdate">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="userUpdate" method="post" enctype="multipart/form-data">
                <div class="modal-header text-center">
                    <h4 class="modal-title">Chỉnh sửa Thông tin</h4>
                    <img src="<?= $_SESSION['login']->avatar ?>" alt="<?= $_SESSION['login']->name ?>" id="useravatar">
                    <button type="button" class="close" data-dismiss="modal">Đóng</button>
                </div>
                <input type="hidden" name="id" value="<?= $_SESSION['login']->value ?>">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="a" class="col-sm-3 col-form-label col-form-label-sm">Họ và tên</label>
                        <div class="col-sm-9">
                            <input type="text" name="name5" class="form-control form-control-sm" placeholder="col-form-label-sm" value="<?= $_SESSION['login']->name ?>">
                        </div>
                    </div>
                    <!-- avatar -->
                    <div class="form-group row">
                        <label for="a" class="col-sm-3 col-form-label col-form-label-sm">Avatar</label>
                        <div class="col-sm-8 ml-3">
                            <input type="file" name="avatar5" accept="image/*" id="inputGroupFile02">
                            <label class="custom-file-label" for="inputGroupFile02">Chọn ảnh đại diện</label>
                        </div>
                    </div>
                    <!-- phone -->
                    <div class="form-group row">
                        <label for="a" class="col-sm-3 col-form-label col-form-label-sm">Điện thoại</label>
                        <div class="col-sm-9">
                            <input type="tel" name="phone5" class="form-control form-control-sm" placeholder="0913721389" value="<?= $_SESSION['login']->phone ?>">
                        </div>
                    </div>
                    <!-- email -->
                    <div class="form-group row">
                        <label for="a" class="col-sm-3 col-form-label col-form-label-sm">Email</label>
                        <div class="col-sm-9">
                            <input type="email" name="email5" class="form-control form-control-sm" placeholder="example@gmail.com" value="<?= $_SESSION['login']->email ?>">
                        </div>
                    </div>
                    <!-- address -->
                    <div class="form-group row">
                        <label for="a" class="col-sm-3 col-form-label col-form-label-sm">Địa chỉ:</label>
                        <div class="col-sm-9">
                            <input type="text" name="address5" class="form-control form-control-sm" placeholder="12 Điện Biên Phủ" value="<?= $_SESSION['login']->address ?>">
                        </div>
                    </div>
                    <!-- Password -->
                    <div class="form-group row">
                        <label for="a" class="col-sm-3 col-form-label col-form-label-sm">Mật khẩu</label>
                        <div class="col-sm-9">
                            <input type="password" name="password5" class="form-control form-control-sm" placeholder="Mật khẩu" pattern="\w{6,}">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-block">
                        <i class='fas fa-save'>Lưu</i>
                    </button>
                </div>
                <form>
        </div>
    </div>
</div>