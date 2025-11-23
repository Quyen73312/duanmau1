<h1 class="h3 mb-4 text-gray-800">Quản lý Danh mục</h1>
<a href="<?= BASE_URL_ADMIN ?>&action=list-category&action_type=add" class="btn btn-primary mb-3">Thêm Danh mục mới</a>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên Danh mục</th>
                        <th>Mô tả</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categories as $cate): ?>
                        <tr>
                            <td><?= $cate['id'] ?></td>
                            <td><?= htmlspecialchars($cate['name']) ?></td>
                            <td><?= htmlspecialchars($cate['description']) ?></td>
                            <td>
                                <a href="<?= BASE_URL_ADMIN ?>&action=list-category&action_type=edit&id=<?= $cate['id'] ?>" class="btn btn-warning btn-sm">Sửa</a>
                                <a href="<?= BASE_URL_ADMIN ?>&action=list-category&action_type=delete&id=<?= $cate['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Xác nhận xóa: <?= $cate['name'] ?>?')">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>