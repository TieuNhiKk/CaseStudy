<?php require "html/header.login.php" ?>
<div class="container">
    <?php require "userinfor.php" ?>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Ảnh sản phẩm</th>
                    <th>Giá sản phẩm</th>
                </tr>
            </thead>
            <tbody id="datatb">
                <?php foreach ($foods as $no => $food) : ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $food->name ?></td>
                        <td>
                            <img src="<?= $food->avatar ?>" alt="<?= $food->name ?>" width="100px" height="50px">
                        </td>
                        <td><?= $food->price ?></td>
                        <td><?= $food->type ?></td>
                        <td>
                            <a href="index.php/editFood?id=<?= $food->id ?>" class="btn fa-edit">Edit</a>
                            <a href="index.php/deleteFood?id=<?= $food->id ?>" class="btn fa-edit">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <?php require "html/footer.php" ?>