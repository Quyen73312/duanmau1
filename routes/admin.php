<?php
// Kiểm tra login có quyền vào trang admin không
// TODO
$action = $_GET['action'] ?? '/';

match ($action) {
    '/'         => (new ProductController)->home(),
      'list-product' => (new ProductController)->index(), // Hiển thị danh sách sản phẩm
    'delete-product' => '', // Xóa sản phẩm
    'show-product' => '', // Hiển thị chi tiết sản phẩm
    'create-product' => '', // Hiển thị form tạo mới sản phẩm
    'store-product' => '', // Lưu sản phẩm vào CSDL
    'edit-product'=> '', // Hiển thị form cập nhật sản phẩm
    'update-product'=> '', // Lưu thông tin sản phẩm cập nhật vào CSDL
};