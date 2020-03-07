<?php require "html/nav.php" ?>
<i class='fas fa-user-circle btn btn-toolbar' data-toggle="modal" style="font-size: 42px ;color:seashell" data-target="#mylogin"></i>
</div>
</div>
</nav>
<div class="modal" id="mylogin" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content w-75">
            <div class="modal-header">
                <a href="#signUp" class="btn btn-outline-danger" data-toggle="modal" data-dismiss="modal">Đăng ký</a>
                <h4 class="modal-title mx-auto">Đăng nhập</h4>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Đóng</button>
            </div>
            <!-- Đăng nhập -->
            <div class="modal-body mx-2">
                <form action="signIn" method="post">
                    <input type="text" class="form-control my-1" pattern="^(0|84)[1-9][0-9]{8,10}$" name="phone" placeholder="Phone number" required="" autofocus="">
                    <input type="password" name="password" class="form-control my-1" placeholder="password" required="">
                    <input type="submit" class="btn btn-success form-control mt-3" value="Đăng nhập">
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="signUp" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content w-75">
            <div class="modal-header">
                <a href="#mylogin" class="btn btn-outline-danger" data-toggle="modal" data-dismiss="modal">Đăng Nhập</a>
                <h4 class="modal-title mx-auto">Đăng ký</h4>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Đóng</button>
            </div>
            <!-- Đăng ký -->
            <div class="modal-body mx-2">
                <form action="signUp" method="post">
                    <input type="text" name="name" class="form-control my-1" placeholder="Full name" required="" autofocus="">
                    <input type="tel" name="phone" class="form-control my-1" pattern="^(0|84)[1-9][0-9]{8,10}$" placeholder="Phone number" required="" autofocus="">
                    <input type="email" name="email" class="form-control my-1" placeholder="Email address">
                    <input type="text" name="address" class="form-control my-1" placeholder="Address" required="">
                    <input type="password" name="password" class="form-control my-1" pattern="[0-9a-zA-Z_]{6,}" placeholder="Password" required="">
                    <input type="submit" value="Đăng Ký" class="btn btn-success form-control mt-3">
                </form>
            </div>
        </div>
    </div>
</div>