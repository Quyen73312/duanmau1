<?php
// có class chứa các function thực thi xử lý logic 
class ProductController
{
    public $modelProduct;
    public function __construct(){
        $this->modelProduct = new Product();
    }
    public function dashboad() {
        $title = 'Đây là trang quản trị';
        require_once PATH_VIEW_MAIN_ADMIN;
    }
    public function index() {
        $view = 'product/index';
        $title = 'Danh sách Sản phẩm';
        // lấy danh sách từ csdl
        $data = $this->modelProduct->getAll();
        // var_dump($data);
        require_once PATH_VIEW_MAIN_ADMIN;
    }
}
