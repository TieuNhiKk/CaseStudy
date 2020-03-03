<?php

namespace Core\Database;

use PDO;
use Core\Database\ConectDB;
use PDOException;

class QueryDB
{
    protected static $pdo;

    /**Hàm khởi tạo với tham số dầu vào là một database được kết nối mặc định là null kết nối đến cơ sở dữ liệu */

    public function __construct($pdo = null)
    {
        self::$pdo = $pdo ?? ConectDB::connect();
    }

    /**
     * Lấy tất cả dữ liệu từ bảng và trả về các hàng dưới dạng mảng
     * 
     * @param Array $table Tên bảng cần lấy dữ liệu
     * @return Array hàng Trả về mảng các hàng dưới dạng stdclass
     */

    public static function selectAll($table)
    {
        return self::$pdo->query("SELECT * FROM {$table}")->fetchAll(PDO::FETCH_CLASS);
    }

    /**
     * Tìm dựa trên điều kiện
     * 
     * @param String $table Tên bảng cần tìm
     * @param mixed $cond Các tham số điều kiện
     * @param Array $cols là các trường dữ liệu cần truy vấn mặc định là *
     * @return mixed Object trả về mảng các đối tượng
     * @return  mixed $e trả về lỗi nếu xóa không thành công
     */

    public static function search($table, $cond, $cols = null)
    {
        try {

            /**Xác định cá trường cần lấy */

            $fiels = '*';
            if (isset($cols)) {
                $fiels = '';
                foreach ($cols as $col) {
                    $fiels .= "`{$col}`, ";
                }
                $fiels = trim($fiels, ',');
            }

            /**Truy vấn database */

            $sql = "SELECT {$fiels} FROM {$table} WHERE {$cond}";
            return self::$pdo->query($sql)->fetchAll(PDO::FETCH_CLASS);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /**
     * Thêm dữ liệu vào bảng
     *
     * @param   String $table Tên bảng
     * @param   Array $data dữ liệu thêm vào
     * @return  mixed $e trả về lỗi nếu xóa không thành công
     */

    public static function insert($table, $data)
    {
        try {
            $cols = '';
            $values = '';

            /**Gán các cột và giá trị cho các cột */

            foreach ($data as $col => $value) {
                $cols .= "$col,";
                $values .= "$value,";
            }
            $cols = trim($cols, ',');
            $values = trim($values, ',');
            /**Truy vấn database */

            self::$pdo->query("INSERT INTO `{$table}` ({$cols}) VALUE ({$values})");
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /**
     * Cập nhật dữ liệu với tham số tên bảng, data là mảng liên kết với tên key ứng với tên cột
     *
     * @param   String $table Tên bảng
     * @param   Array $data Mảng liên kết ['col'=>"'value'"]
     * @param   mixed $id id của hàng
     * @return  mixed $e trả về lỗi nếu cập nhật không thành công
     */
    public static function update($table, $data, $id)
    {
        // die(var_dump($data));
        try {
            foreach ($data as $col => $value) {
                // die(var_dump($data));
                self::$pdo->query("UPDATE `{$table}` SET `{$col}` = {$value} WHERE `id` = {$id}");
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /**
     * Xóa dữ liệu từ bảng ứng với điều kiện
     *
     * @param   String $table Tên bảng
     * @param   mixed $id id của mảng cần xóa
     * @return  mixed $e trả về lỗi nếu xóa không thành công
     * 
     */

    public static function delete($table, $id)
    {
        try {
            self::$pdo->query("DELETE FROM `{$table}` WHERE `id` = {$id}");
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public static function show($sql)
    {
        return self::$pdo->query($sql)->fetchAll(PDO::FETCH_CLASS);
    }
    /**
     * Phân trang, số lượng phần tử của trang
     */

    public static function pagenation($table)
    {
       return self::$pdo->query("SELECT count(*) FROM `$table`")->fetch()[0];
    }
}
