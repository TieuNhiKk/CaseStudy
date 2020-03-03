<?php

namespace Controller;

use Core\Model\{Foods, Users};
use Core\App\Apps;

class HomePage
{

    /**
     * Trang chủ
     */

    public function home()
    {
        $index = new Foods;
        $foods = $index->show();
        $pages = $index->getPage();
        $types = Foods::$categories;
        $id = null;
        if (isset($_GET['type'])) {
            $foods = Foods::getType($_GET['type']);
            $id = $_GET['type'];
        }
        // require "test.php";
        if (isset($_SESSION['login']) && isset($_GET['admin'])) {
            if ($_SESSION['login']->access == 2) {
                require "views/index.edit.php";
            } else {
                require "views/index.view.php";
            }
        } else {
            require "views/index.view.php";
        }
    }

    /**
     * Thêm sản phẩm
     */

    public function addFood()
    {
        die(var_dump($_GET));
        $name = $_POST['name4'];
        $avatar = Apps::uploadImg($_FILES['avatar4']);
        $price = $_POST['price4'];
        $type = $_POST['type4'];
        Foods::addFood([$name, $avatar, $price, $type]);
        header("location:/");
    }

    /**
     * Chỉnh sửa thông tin sản phẩm
     */

    public function editFood()
    {
        try {
            $data = [
                $_POST['name3'],
                Apps::uploadImg($_FILES['avatar3']),
                $_POST['price3'],
                $_POST['type3']
            ];
            Foods::update($data, $_POST['id']);
            header("location:/");
        } catch (\Exception $e) {
            $food = Foods::search($_POST['id']);
            header("location:/");
        }
    }

    /**
     * Xóa sản phẩm
     */

    public function deleteFood()
    {
        // die(var_dump($_POST['id']));
        Foods::delete($_POST['id']);
        header("location:/");
    }

    /**
     * Đăng nhập
     */

    public function signIn()
    {
        $phone = $_POST['phone1'];
        $pass = $_POST['password1'];
        Users::signIn($phone, $pass);
        if (isset($_SESSION['login'])) {
            header("location:/");
        }
        echo "Thất bại";
        header("location:/");
    }

    /**
     * Đăng ký
     */

    public function signUp()
    {
        $infor = [
            $_POST['name2'],
            // $_POST['avatar'],
            $_POST['phone2'],
            $_POST['email2'],
            $_POST['address2'],
            $_POST['password2']
        ];

        Users::signUp($infor);
        header("location:/");
    }

    /**
     * Cập nhật thông tin người dùng
     */

    public function userUpdate()
    {
        $data = [
            $_POST['name5'],
            Apps::uploadImg($_FILES['avatar5']),
            $_POST['phone5'],
            $_POST['email5'],
            $_POST['address5'],
            $_POST['password5']
        ];

        Users::userUpdate($data, $_SESSION['login']->id);
        header('location:/');
    }

    public function logOut()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            Users::signOut();
        }
        header("location:/");
    }
}
