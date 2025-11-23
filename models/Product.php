<?php
class Product extends BaseModel {

    protected $table = 'products';

    public function getAll() {
        $sql = 'SELECT pro.*, cat.name AS cat_name 
                FROM `products` as pro
                JOIN categories as cat ON pro.category_id = cat.id ORDER BY pro.id DESC;';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function store($data)
    {
        $sql = "INSERT INTO {$this->table} (category_id, name, description, price, quantity, img)
                VALUES (:category_id, :name, :description, :price, :quantity, :img)";
        return $this->pdo_execute($sql, $data);
    }
    
    // Lowercase alias to keep naming consistent across code that may call addProduct
    public function delete($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE id = :id";
        return $this->pdo_execute($sql, ['id' => $id]);
    }

}
?>