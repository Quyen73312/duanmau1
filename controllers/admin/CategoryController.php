<?php
class CategoryController {
    public $modelCategory;
    public function __construct(){
        $this->modelCategory = new Category();
    }
    public function list(){
        $view = 'category/list';
        $title = 'Danh sách danh mục';
        $categories = $this->modelCategory->getAllCategories();
        require_once PATH_VIEW_MAIN_ADMIN;
    }
}
