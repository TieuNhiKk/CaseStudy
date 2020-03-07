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
        $foods = $index->get();
        $types = Foods::$categories;
        $id = null;
        if (isset($_GET['type'])) {
            $foods = Foods::getType($_GET['type']);
            $id = $_GET['type'];
        }
        // require "test.php";
        if (isset($_SESSION['user']) && isset($_GET['admin'])) {
            if ($_SESSION['user']->access == 2) {
                require "./views/index.edit.php";
            } else {
                require "./views/index.view.php";
            }
        } else {
            require "./views/index.view.php";
        }
    }

    /**
     * Thêm sản phẩm
     */

    public function addFood()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $_GET['admin'] = 1;
                $name = $_POST['name'];
                $avatar = Apps::uploadImg($_FILES['avatar']);
                $price = $_POST['price'];
                $type = $_POST['type'];
                Foods::addFood([$name, $avatar, $price, $type]);

                echo "Thêm thành công";
            }
            $this->home();
        } catch (\Exception $e) {
            echo "Lỗi " . $e->getMessage();
            $this->home();
        }
    }

    /**
     * Chỉnh sửa thông tin sản phẩm
     */

    public function editFood()
    {


        try {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $_GET['admin'] = 1;
                $data = [
                    $_POST['name'],
                    Apps::uploadImg($_FILES['avatar']),
                    $_POST['price'],
                    $_POST['type']
                ];
                Foods::update($data, $_POST['id']);
                echo "Chỉnh sửa thành công";
            }

            $this->home();
        } catch (\Exception $e) {
            echo "Lỗi " . $e->getMessage();
            $this->home();
        }
    }

    /**
     * Xóa sản phẩm
     */

    public function deleteFood()
    {

        try {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $_GET['admin'] = 1;
                Foods::delete($_POST['id']);
                echo "Xóa thành công";
            }
            $this->home();
        } catch (\Exception $e) {
            echo "Lỗi " . $e->getMessage();
            $this->home();
        }
    }

    /**
     * Đăng nhập
     */

    public function signIn()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                Users::signIn($_POST['phone'], $_POST['password']);
                echo "Đăng nhập thành công";
            }
            $this->home();
        } catch (\Exception $e) {
            echo "Lỗi " . $e->getMessage();
            $this->home();
        }
    }

    /**
     * Đăng ký
     */

    public function signUp()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $infor = [
                    $_POST['name'],
                    $_POST['phone'],
                    $_POST['email'],
                    $_POST['address'],
                    $_POST['password']
                ];
                Users::signUp($infor);
                echo "Đăng ký thành công";
            }

            $this->home();
        } catch (\Exception $e) {
            echo "Lỗi " . $e->getMessage();
            $this->home();
        }
    }

    /**
     * Cập nhật thông tin người dùng
     */

    public function userUpdate()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $data = [
                    $_POST['name'],
                    $_POST['phone'],
                    $_POST['email'],
                    $_POST['address'],
                    $_POST['password']
                ];

                Users::userUpdate($data, $_SESSION['user']->id);
                echo "Cập nhật thành công";
            }

            $this->home();
        } catch (\Exception $e) {
            echo "lỗi " . $e->getMessage();
            $this->home();
        }
    }

    public function logOut()
    {
        try {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                Users::signOut();
            }

            $this->home();
        } catch (\Exception $e) {
            echo "lỗi " . $e->getMessage();
            $this->home();
        }
    }
}


function dd($ad)
{
    return die(var_dump($ad));
}
