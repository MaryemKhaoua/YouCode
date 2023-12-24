<?php

include 'DataBase.php';
class User extends DataBase {
    public function register($nom, $prenom, $email, $password) {
        $query = 'INSERT INTO users (nom, prenom, email, password) VALUES (?, ?, ?, ?)';
        $stmt = $this->connection->prepare($query);
        $stmt->execute([$nom, $prenom, $email, password_hash($password, PASSWORD_DEFAULT)]);
        return $stmt;
    }
}

?>
