<?php
// có class chứa các function thực thi xử lý logic 
class ProductController
{
    public $modelProduct;

    public function home() {
        $title = 'Đây là trang quản trị';
        require_once PATH_VIEW_ADMIN . 'main.php';
    }
    
}
