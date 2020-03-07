<?php require_once "logged.php" ?>
<div class="container">
    <?php require_once "food.add.php" ?>
    <div class="container">
        <table class="table table-secondary">
            <thead class="table-primary">
                <tr>
                    <th class="text-center">STT</th>
                    <th>Tên sản phẩm</th>
                    <th class="text-center">Ảnh sản phẩm</th>
                    <th>Giá</th>
                    <th>Loại</th>
                    <th class="text-center">Hành động</th>
                </tr>
            </thead>
            <tbody id="datatb">
                <?php foreach ($foods as $no =>
                    $food) : ?>
                    <tr>
                        <td class="text-center"><?= $no ?></td>
                        <td>
                            <?= $food->name ?>
                        </td>
                        <td class="text-center">
                            <img src="<?= $food->avatar ?>" alt="<?= $food->name ?>" width="100px" height="50px" />
                        </td>
                        <td>
                            <?= $food->price ?>
                        </td>
                        <td>
                            <?= $food->type ?>
                        </td>
                        <td class="text-center">
                            <button data-toggle="modal" data-target="#editFood<?= $food->id ?>" class="btn  btn-outline-info btn-lg fa fa-edit">
                                Sửa
                            </button>
                            <button data-toggle="modal" data-target="#delete<?= $food->id ?>" class="btn  btn-danger btn-lg far fa-trash-alt">
                                Xóa
                            </button>
                        </td>
                    </tr>
                    <?php require "food.edit.php" ?>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<?php require_once "html/footer.php" ?>