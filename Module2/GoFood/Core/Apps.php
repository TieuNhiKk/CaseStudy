<?php

namespace Core\App;

/**
 * Lưu ảnh base64 đã mã hóa
 * @param mixed $file $_FILES['name'] 
 */

class Apps
{
    public static function uploadImg($file)
    {
        if ($file['name'] != '') {
            $type = pathinfo($file['name'], PATHINFO_EXTENSION);
            if (in_array(strtolower($type), ['png', 'jpg', 'jpeg', 'gif'])) {
                $data = file_get_contents($file['tmp_name']);
                $base64 = "data:image/$type;charset=utf-8;base64," . base64_encode($data);
                return  $base64;
            }
            throw new \Exception("Upload ảnh không thành công");
        }
        throw new \Exception("Chưa chọn ảnh để tải lên");
    }
}
