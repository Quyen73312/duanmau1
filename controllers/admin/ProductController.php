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
    public function create()
    {
        $title = "Thêm sản phẩm";
        $view = "product/create";
        // Load categories for select box
        $categories = (new Category())->getAllCategories();
        require PATH_VIEW_MAIN_ADMIN;
    }

    // Lưu dữ liệu thêm mới
    public function store()
    {
        $errors = [];
        $old = [];

        // Trim inputs and collect old values
        $old['category_id'] = isset($_POST['category_id']) ? trim($_POST['category_id']) : '';
        $old['name'] = isset($_POST['name']) ? trim($_POST['name']) : '';
        $old['description'] = isset($_POST['description']) ? trim($_POST['description']) : '';
        $old['price'] = isset($_POST['price']) ? trim($_POST['price']) : '';
        $old['quantity'] = isset($_POST['quantity']) ? trim($_POST['quantity']) : '';
        $old['img'] = isset($_POST['img']) ? trim($_POST['img']) : '';

        // Validation
        if ($old['name'] === '') {
            $errors['name'] = 'Tên sản phẩm là bắt buộc.';
        }
        if ($old['category_id'] === '' || !is_numeric($old['category_id'])) {
            $errors['category_id'] = 'Danh mục không hợp lệ.';
        }
        if ($old['price'] === '' || !is_numeric($old['price']) || floatval($old['price']) < 0) {
            $errors['price'] = 'Giá phải là số không âm.';
        }
        if ($old['quantity'] === '' || !ctype_digit($old['quantity'])) {
            $errors['quantity'] = 'Số lượng phải là số nguyên không âm.';
        }

        if (!empty($errors)) {
            // Show create form again with errors and old values
            $title = "Thêm sản phẩm";
            $view = "product/create";
            $categories = (new Category())->getAllCategories();
            require PATH_VIEW_MAIN_ADMIN;
            return;
        }

        // Prepare data for insertion
        $data = [
            'category_id' => $old['category_id'],
            'name'        => $old['name'],
            'description' => $old['description'],
            'price'       => $old['price'],
            'quantity'    => $old['quantity'],
            'img'         => $old['img']
        ];

        $this->modelProduct->store($data);
        header("Location: " . BASE_URL_ADMIN . "&action=list-product");
        exit();
    }
    
    public function delete() {
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        if ($id > 0) {
            // Optionally, you could check if product exists before deleting
            $this->modelProduct->delete($id);
        }
        header("Location: " . BASE_URL_ADMIN . "&action=list-product");
        exit;
    }
      
}
