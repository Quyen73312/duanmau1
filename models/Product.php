<?php
class Product extends BaseModel {

    public function getAll() {
        $sql = "SELECT * FROM `products` ORDER BY `id` DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
?>