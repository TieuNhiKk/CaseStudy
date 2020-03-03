<?php require "html/nav.php" ?>
<i class='fas fa-user-circle btn btn-toolbar' data-toggle="modal" style="font-size: 42px ;color:seashell"
    data-target="#mylogin"></i>
</div>
</div>
</nav>
<div class="modal fade" id="mylogin" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content w-75">
            <div class="modal-header">
                <h4 class="modal-title mx-auto">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#login">Đăng nhập</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#register">Đăng ký</a>
                        </li>
                    </ul>
                </h4>
            </div>
            <div class="modal-body mx-2">
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade active show text-center" id="login">
                        <form action="signIn" method="post">
                            <input type="text" class="form-control my-1" pattern="^(0|84)[1-9][0-9]{8,10}$"
                                name="phone1" placeholder="Phone number" required="" autofocus="">
                            <input type="password" name="password1" class="form-control my-1" placeholder="Password"
                                required="">
                            <input type="submit" class="btn btn-lg btn-primary mt-3" value="Đăng nhập">
                        </form>
                    </div>
                    <div class="tab-pane fade text-center" id="register">
                        <form action="signUp" method="post">
                            <input type="text" name="name2" class="form-control my-1" placeholder="Full name"
                                required="" autofocus="">
                            <input type="tel" name="phone2" class="form-control my-1" pattern="^(0|84)[1-9][0-9]{8,10}$"
                                placeholder="Phone number" required="" autofocus="">
                            <input type="email" name="email2" class="form-control my-1" placeholder="Email address">
                            <input type="text" name="address2" class="form-control my-1" placeholder="Address"
                                required="">
                            <input type="password" name="password2" class="form-control my-1" pattern="[0-9a-zA-Z_]{6,}"
                                placeholder="Password" required="">
                            <input type="submit" value="Đăng Ký" class="btn btn-lg btn-primary mt-3">
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>