<?php
class User extends BaseModel{
    protected $table = "users";
    
    public function findByEmail($email) {
        $stmt = $this->pdo->prepare("SELECT id, username, email, password, is_main FROM {$this->table} WHERE email = :email");
        $stmt->execute(['email' => $email]);
        return $stmt->fetch();
    }
    public function create($username, $email, $password_hash, $is_main = 0) {
        $stmt = $this->pdo->prepare("INSERT INTO {$this->table} (username, email, password, is_main) VALUES (:username, :email, :password, :is_main)");
        return $stmt->execute([
            'username' => $username,
            'email' => $email,
            'password' => $password_hash,
            'is_main' => $is_main 
        ]);
    }
}
?>