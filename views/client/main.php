<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= htmlspecialchars($title ?? 'Trang chủ') ?></title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-xxl bg-light justify-content-center">
        <div class="container-fluid">
            <!-- Nội dung bên trái -->
            <div class="d-flex align-items-center">
                <a href="<?= BASE_URL ?>" class="navbar-brand">
                    <img src="<?= BASE_ASSETS_UPLOADS . 'products/609.jpg' ?>" alt="logo" width="150" height="150">
                </a>
                <ul class="navbar-nav">
                    <?php if (!empty($categories)): ?>
                        <?php foreach ($categories as $cate): ?>
                            <li class="nav-item">
                                <a href="<?= BASE_URL ?>?action=category&id=<?= $cate['id'] ?>" class="nav-link"><?= htmlspecialchars($cate['name']) ?></a>
                            </li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li class="nav-item"><a class="nav-link">Danh mục 1</a></li>
                        <li class="nav-item"><a class="nav-link">Danh mục 2</a></li>
                    <?php endif; ?>
                </ul>
            </div>
            <!-- Nội dung bên phải -->
            <div>
                 <ul class="navbar-nav">
                     <?php if (!empty($_SESSION['admin'])): ?>
                        
                            <a href="<?= BASE_URL ?>?mode=admin" class="nav-link text-success">🔐 Trang quản trị</a>
                        <?php endif; ?>

                        </li>
                    <?php if (!empty($_SESSION['user'])): ?>
                        <!--  ĐÃ ĐĂNG NHẬP -->
                        <li class="nav-item">
                            <span class="nav-link text-primary fw-bold">
                                Xin chào, <?= htmlspecialchars($_SESSION['user']['name']) ?>
                            </span>
                        </li>
                        <li class="nav-item">
                            <a href="<?= BASE_URL ?>?action=logout" class="nav-link text-danger">Đăng xuất</a>
                        </li>
                    <?php else: ?>
                        <!--  CHƯA ĐĂNG NHẬP -->
                        <li class="nav-item">
                            <a href="<?= BASE_URL ?>?action=login" class="nav-link">Đăng nhập</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= BASE_URL ?>?action=register" class="nav-link">Đăng ký</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>  
        </div>
    </nav>
    
    <!-- Nội dung -->
    <div class="container">
        <!-- Slideshow -->
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?= BASE_ASSETS_UPLOADS . 'products/slide1.avif' ?>" class="d-block w-100 h-50" alt="...">
            </div>
            <div class="carousel-item">
                <img src="<?= BASE_ASSETS_UPLOADS . 'products/slide2.avif' ?>" class="d-block w-100 h-50" alt="...">
            </div>
            <div class="carousel-item">
                <img src="<?= BASE_ASSETS_UPLOADS . 'products/slide3.avif' ?>" class="d-block w-100 h-50" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        </div>
        <!-- Hết slide -->
        <!-- Khu vực sản phẩm -->
        <h3 class="mt-3">Sản phẩm mới</h3>
        <div class="row">
            <?php if (!empty($products)): ?>
                <?php foreach ($products as $product): ?>
                    <?php $img = !empty($product['image']) ? BASE_ASSETS_UPLOADS . $product['image'] : BASE_URL . 'assets/no-image.png'; ?>
                    <div class="col-3">
                        <div class="border rounded mb-4">
                            <div class="bg-light d-flex justify-content-center align-items-center" style="height: 400px;">
                                <img src="<?= $img ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="mw-100 mh-100">
                            </div>
                            <!-- Hiển thị nội dung sản phẩm -->
                            <div class="p-2 d-flex align-items-center justify-content-around">
                                <div>
                                    <h5><?= htmlspecialchars($product['name']) ?></h5>
                                    <span class="fw-bold"> <?= number_format($product['price']) ?> </span>
                                </div>
                                <a href="index.php?controller=home&action=detail&id=<?= $product['id'] ?>" class="btn btn-danger">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <!-- giữ cấu trúc mẫu nếu không có dữ liệu -->
                <div class="col-3">
                    <div class="border rounded mb-4">
                        <div class="bg-light d-flex justify-content-center align-items-center" style="height: 400px;">
                            <img src="<?= BASE_ASSETS_UPLOADS . 'products/san-pham_ao-blazer-01.webp' ?>" alt="" class="mw-100 mh-100">
                        </div>
                        <div class="p-2 d-flex align-items-center justify-content-around">
                            <div>
                                <h5>Tên sản phẩm 01</h5>
                                <span class="fw-bold"> 100.000 </span>
                            </div>
                            <a href="<?= BASE_URL ?>?action=detail&id=<?= $product['id'] ?>" class="btn btn-danger">Mua ngay</a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <!-- Hết nội dung -->
    <footer class="bg-dark text-white pt-5">
  <div class="container">
    <div class="row">

      <!-- Cột 1 -->
      <div class="col-md-3 col-sm-6 mb-4">
        <h5 class="text-warning fw-bold">FASHION SHOP</h5>
        <p class="small">
          Chuyên cung cấp quần áo thời trang nam nữ, phong cách trẻ trung, hiện đại.
        </p>
        <p class="small mb-1"><strong>Hotline:</strong> 0988 888 888</p>
        <p class="small"><strong>Email:</strong> fashionshop@gmail.com</p>
      </div>
      <div class="col-md-3 col-sm-6 mb-4">
        <h5 class="text-warning fw-bold">Hỗ trợ khách hàng</h5>
        <ul class="list-unstyled">
          <li><a href="#" class="text-white text-decoration-none">Chính sách mua hàng</a></li>
          <li><a href="#" class="text-white text-decoration-none">Chính sách đổi trả</a></li>
          <li><a href="#" class="text-white text-decoration-none">Chính sách bảo mật</a></li>
          <li><a href="#" class="text-white text-decoration-none">Liên hệ</a></li>
        </ul>
      </div>

      <!-- Cột 4 -->
      <div class="col-md-3 col-sm-6 mb-4">
        <h5 class="text-warning fw-bold">Kết nối với chúng tôi</h5>
        <div class="d-flex flex-column gap-2">
          <a href="#" class="btn btn-outline-light btn-sm">Facebook</a>
          <a href="#" class="btn btn-outline-light btn-sm">Instagram</a>
          <a href="#" class="btn btn-outline-light btn-sm">TikTok</a>
          <a href="#" class="btn btn-outline-light btn-sm">Shopee</a>
        </div>
      </div>

    </div>

    <hr class="border-secondary">

    <!-- Bản quyền -->
    <div class="text-center pb-3">
      <small>© 2025 FASHION SHOP. All rights reserved.</small>
    </div>
  </div>
</footer>

</body>

</html>