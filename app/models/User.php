<?php
require_once 'C:\xampp\htdocs\YouCode\core\DataBase.php';


class User extends DataBase {
    public function register($nom, $prenom, $email, $password, $id_role) {
        $query = 'INSERT INTO users (nom, prenom, email, password, id_role) VALUES (?, ?, ?, ?, 1)';
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$nom, $prenom, $email, $password, $id_role]);
        return $stmt;
    }
}











?>