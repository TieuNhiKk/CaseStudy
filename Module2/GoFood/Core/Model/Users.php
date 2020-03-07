<?php

namespace Core\Model;

use Core\Database\QueryDB;
use Exception;

class Users
{
    protected static $users;

    public function __construct()
    {
        self::$users = QueryDB::selectAll('users');
    }

    /**
     * Đăng nhập
     * @param String $phone Số điện thoại
     * @param String $pass Mật khẩu
     * @return Session['login'] hoặc trả về chuỗi đăng nhập thất bại
     */

    public static function signIn($phone, $pass)
    {
        try {
            $login = QueryDB::search('users', "`phone` = '{$phone}'");
            if ($login) {
                if (password_verify($pass, $login[0]->pass)) {
                    $sql = "SELECT `id`, `name`, `phone`, `email`, `address`, `access` FROM `users` WHERE `phone` = '{$phone}'";
                    $_SESSION['user'] = QueryDB::get($sql)[0];
                    return $_SESSION['user'];
                }
                throw new \Exception("Sai mật khẩu");
            }
            throw new \Exception("Chưa đăng ký");
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * Đăng ký người dùng
     * 
     *@param Array $infor ['name', 'avatar', phone, 'email', 'PASSWORD('pass')']
     *@return signIn user hoặc trả về lỗi
     */

    public static function signUp($infor)
    {
        try {
            $pass = password_hash($infor[4], PASSWORD_BCRYPT);
            $data = [
                'name' => "'{$infor[0]}'",
                'phone' => "'{$infor[1]}'",
                'email' => "'{$infor[2]}'",
                'address' => "'{$infor[3]}'",
                'pass' => "'{$pass}'",
                'access' => '1'
            ];
            QueryDB::insert('users', $data);
            return self::signIn($infor[1], $infor[4]);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Chỉnh sửa thông tin người dùng
     * 
     * @param Array $fiel ['cột'=>'giá trị'];
     * @param mixed $id id người dùng
     * @return String "edit" báo lỗi
     */

    public static function userUpdate($data, $id)
    {
        try {
            $pass = password_hash($data[4], PASSWORD_BCRYPT);
            $datas = [
                'name' => "'{$data[0]}'",
                'phone' => "'{$data[1]}'",
                'email' => "'{$data[2]}'",
                'address' => "'{$data[3]}'",
                'pass' => "'{$pass}'"
            ];
            QueryDB::update('users', $datas, $id);
            return self::signIn($data[1], $data[4]);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * Thoát session
     */

    public static function signOut()
    {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        } else {
            throw new \Exception('Thất bại');
        }
    }
}
