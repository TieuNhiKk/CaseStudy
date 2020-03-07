<?php

namespace Core\Model;

use Core\Database\QueryDB;

class Foods
{
    public static $foods;
    public static $categories;

    public function __construct()
    {
        self::$foods = QueryDB::selectAll('foods');
        self::$categories = QueryDB::selectAll('categories');
    }

    /**
     * Lấy thông tin sản phẩm
     * 
     * @return Array  Trả về mảng các sản phẩm
     */

    public function get()
    {
        $sql = "SELECT `foods`.id, `foods`.name, `foods`.avatar, `foods`.price, `categories`.name AS type
                FROM `foods`
                INNER JOIN `categories`
                ON `foods`.type = `categories`.id";

        return QueryDB::get($sql);
    }

    /**
     * Thêm sản phẩm
     * 
     *@param Array $infor [name, avatar, price, type]
     *@return signIn user hoặc trả về lỗi
     */

    public function addFood($infor)
    {
        $data = [
            'name' => "'{$infor[0]}'",
            'avatar' => "'{$infor[1]}'",
            'price' => "$infor[2]",
            'type' => "$infor[3]"
        ];

        $error = QueryDB::insert('foods', $data);
    }

    /**
     * Xóa sản phẩm
     * 
     *@param id $id id của sản phẩm
     *@return error  trả về thông tin nếu lỗi
     */

    public function delete($id)
    {
        $error = QueryDB::delete('foods', $id);
    }

    /**
     * Chỉnh sửa thông tin sản phẩm
     * 
     * @param Array $fiel ['cột'=>'giá trị'];
     * @param mixed $id id người dùng
     * @return String "edit" báo lỗi
     */

    public static function update($data, $id)
    {
        $datas = [
            'name' => "'{$data[0]}'",
            'avatar' => "'{$data[1]}'",
            'price' => "'{$data[2]}'",
            'type' => "'$data[3]'",
        ];
        QueryDB::update('foods', $datas, $id);
    }

    /**
     * Lọc theo loại sản phẩm
     * @param Array $type "`type` = 'type'"
     */

    public static function getType($type)
    {
        $result = QueryDB::search('foods', "`type` = {$type}");
        return $result;
    }

    /**
     * Tìm sản phẩm theo id
     */

    public static function search($id)
    {
        return QueryDB::search('foods', "`id` = {$id}")[0];
    }
}
