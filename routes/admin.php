<?php
// Kiểm tra login có quyền vào trang admin không
// TODO
$action = $_GET['action'] ?? '/';

match ($action) {
    '/'         => (new ProductController)->dashboad(),
      'list-product' => (new ProductController)->index(), // Hiển thị danh sách sản phẩm
    'delete-product' => (new ProductController)->delete(), // Xóa sản phẩm
    'show-product' => '', // Hiển thị chi tiết sản phẩm
    'create-product' => (new ProductController)->create(), // Hiển thị form tạo mới sản phẩm
    'store-product' => (new ProductController)->store(), // Lưu sản phẩm vào CSDL
    'edit-product'=> '', // Hiển thị form cập nhật sản phẩm
    'update-product'=> '', // Lưu thông tin sản phẩm cập nhật vào CSDL
    'list-category' => (new CategoryController)->list(), // Hiển thị danh sách danh mục
    'delete-category' => '', // Xóa danh mục
    'show-category' => '', // Hiển thị chi tiết danh mục
    'create-category' => '', // Hiển thị form tạo mới danh mục
    'store-category' => '', // Lưu danh mục vào CSDL
    'edit-category'=> '', // Hiển thị form cập nhật danh mục
    'update-category'=> '', // Lưu thông tin danh mục cập nhật vào CSDL
   

};  