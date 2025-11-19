<?php
// Kiểm tra login có quyền vào trang admin không
// TODO
$action = $_GET['action'] ?? '/';

match ($action) {
    '/'         => (new ProductController)->home(),
    
};