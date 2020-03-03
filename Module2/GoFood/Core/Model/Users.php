<?php

namespace Core\Model;

use Core\Database\QueryDB;

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
        $login = QueryDB::search('users', "`phone` = '{$phone}' AND `pass` = PASSWORD('{$pass}')");

        return $_SESSION['login'] = $login[0];
    }

    /**
     * Đăng ký người dùng
     * 
     *@param Array $infor ['name', 'avatar', phone, 'email', 'PASSWORD('pass')']
     *@return signIn user hoặc trả về lỗi
     */

    public static function signUp($infor)
    {
        $data = [
            'name' => "'{$infor[0]}'",
            // 'avatar' => "'{$infor[1]}'",
            'phone' => "'{$infor[1]}'",
            'email' => "'{$infor[2]}'",
            'address' => "'{$infor[3]}'",
            'pass' => "PASSWORD('{$infor[4]}')",
            'access' => '1',
            'avatar' => "''"
        ];
        
        QueryDB::insert('users', $data);

        return self::signIn($infor[1], $infor[4]);
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
        $datas = [
            'name' => "'{$data[0]}'",
            'avatar' => "'{$data[1]}'",
            'phone' => "'{$data[2]}'",
            'email' => "'{$data[3]}'",
            'address' => "'{$data[4]}'",
            'pass' => "PASSWORD('{$data[5]}')"
        ];
        QueryDB::update('users', $datas, $id);

        return self::signIn($data[2], $data[5]);
    }

    /**
     * Thoát session
     */

    public static function signOut()
    {
        session_destroy();
    }
}
