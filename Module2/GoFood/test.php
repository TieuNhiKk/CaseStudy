<?php require "Controllers/page.php"?>;
<?php require "header.php"?>
<hr>
<div class="container border px-auto">
    <h1>HOT</h1>
    <div class="row">
        <div id="card" class="card col-lg-4 mx-auto mt-4">
            <div id="hotorder" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner text-center">
                    <h2 class="card-header bg-info">Gần đây</h2>
                    <?php for ($i = 0; $i < count($foods); $i++): ?>
                        <div class="carousel-item <?=$i == 0 ? 'active' : ''?>">
                            <h3 class="card-header"><?=$foods[$i]->name?></h3>
                            <img id="imgcard" src="<?=$foods[$i]->avatar?>" alt="Card image" class="rounded mx-auto d-block w-100">
                            <!--Cho thêm hiện thị thông tin-->
                            <div id="pricecard" class="carousel-caption">
                                <div class="card-body">
                                    <p id="price" class="card-text d-block"><?=$foods[$i]->price?></p>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <a href="#" class="btn btn-danger w-50">Mua ngay</a>
                                <a href="#" class="btn btn-secondary w-45">Mua nhiều hơn</a>
                            </div>
                        </div>
                    <?php endfor?>
                </div>
                <!--Cho thêm khiển chuyển slide trước, sau nếu muốn-->
                <a class="carousel-control-prev" href="#hotorder" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#hotorder" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
                <!--Hết tạo điều khiển chuyển Slide-->
            </div>
        </div>
        <div id="card" class="card col-lg-4 mx-auto mt-4 ">
            <div id="newfood" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner text-center">
                    <h2 class="card-header bg-info">Đồ ăn đặt nhiều</h2>
                    <!--Slide -->
                    <?php for ($i = 0; $i < count($foods); $i++): ?>
                        <div class="carousel-item <?=$i == 0 ? 'active' : ''?>">
                            <h3 class="card-header"><?=$foods[$i]->name?></h3>
                            <img id="imgcard" src="<?=$foods[$i]->avatar?>" alt="Card image" class="rounded mx-auto d-block w-100">
                            <!--Cho thêm hiện thị thông tin-->
                            <div id="pricecard" class="carousel-caption">
                                <div class="card-body">
                                    <p id="price" class="card-text d-block"><?=$foods[$i]->price?></p>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <a href="#" class="btn btn-danger w-50">Mua ngay</a>
                                <a href="#" class="btn btn-secondary w-45">Mua nhiều hơn</a>
                            </div>
                        </div>
                    <?php endfor?>
                </div>
                <!--Cho thêm khiển chuyển slide trước, sau nếu muốn-->
                <a class="carousel-control-prev" href="#newfood" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#newfood" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
                <!--Hết tạo điều khiển chuyển Slide-->
            </div>
        </div>
        <div id="card" class="card col-lg-4 mx-auto mt-4 ">
            <div id="newdrink" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner text-center">
                    <h2 class="card-header bg-info">Đồ uống đặt nhiều</h2>
                    <!--Slide -->
                    <?php for ($i = 0; $i < count($foods); $i++): ?>
                        <div class="carousel-item <?=$i == 0 ? 'active' : ''?>">
                            <h3 class="card-header"><?=$foods[$i]->name?></h3>
                            <img id="imgcard" src="<?=$foods[$i]->avatar?>" alt="Card image" class="rounded mx-auto d-block w-100">
                            <!--Cho thêm hiện thị thông tin-->
                            <div id="pricecard" class="carousel-caption">
                                <div class="card-body">
                                    <p id="price" class="card-text d-block"><?=$foods[$i]->price?></p>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <a href="#" class="btn btn-danger w-50">Mua ngay</a>
                                <a href="#" class="btn btn-secondary w-45">Mua nhiều hơn</a>
                            </div>
                        </div>
                    <?php endfor?>
                </div>
                <!--Cho thêm khiển chuyển slide trước, sau nếu muốn-->
                <a class="carousel-control-prev" href="#newdrink" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#newdrink" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
                <!--Hết tạo điều khiển chuyển Slide-->
            </div>
        </div>
    </div>
</div>

<div class="container">
    <h2>Tất cả sản phẩm</h2>
    <?php for ($i = 0; $i < count($food); $i++): ?>
        <?=$i % 4 == 0 ? '<div class="row">' : ''?>
        <!-- Card 1 -->
        <div class="card col-lg-3 mx-auto mt-4">
            <h3 class="card-header"><?=$food[$i]->name?></h3>
            <img src="<?=$food[$i]->avatar?>" alt="Card image" width="200" height="200" class="rounded mx-auto d-block">
            <div class="card-body">
                <p id="price" class="card-text btn btn-block btn-warning"><?=$food[$i]->price?></p>
            </div>
            <div class="card-footer">
                <a href="#" class="card-link btn btn-danger">Mua ngay</a>
                <a href="#" class="card-link btn btn-secondary">Mua nhiều hơn</a>
            </div>
        </div>
        <?=$i % 4 === 3 || $i == count($food) ? '</div><hr>' : ''?>
    <?php endfor?>
    <ul class="pagination justify-content-end">
        <?=$li?>
    </ul>
</div>
<?php require "footer.php"?>