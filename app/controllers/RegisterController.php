<?php

include('core/Database.php');
include('app/models/User.php');


class RegisterController {
    public function register(){

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        echo "test";
    
    
        $user = new User(); 
        $result = $user->register($nom, $prenom, $email, $password);
    
        if ($result) {
            echo "Registration successful!";
        } else {
            echo "Registration failed!";
        }
    }
}
    
}













?>