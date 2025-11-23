<?php
// Nhúng BaseModel trước
// require_once PATH_MODEL . 'BaseModel.php'; 

class Category extends BaseModel
{
    protected $table = 'categories';

    public function getAllCategories()
    {
        $sql = "SELECT * FROM {$this->table} ORDER BY id DESC";
        // Gọi hàm đã định nghĩa trong BaseModel
        return $this->pdo_query_all($sql); 
    }
    
    // ... thêm các hàm khác (thêm, sửa, xóa)
}
?>