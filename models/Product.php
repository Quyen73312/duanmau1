<?php
class Product extends BaseModel {

    public function getAll() {
        $sql = 'SELECT pro.*, cat.name AS cat_name 
                FROM `products` as pro
                JOIN categories as cat ON pro.category_id = cat.id ORDER BY pro.id DESC;';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
?>