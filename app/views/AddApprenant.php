<?php



    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $email = $_POST["email"];
    
        if (empty($nom) || empty($prenom) || empty($email)) {
            echo "Please fill in all fields";
            exit;
        }
        $conn = new PDO("mysql:host=localhost;dbname=youcode", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $stmt = $conn->prepare("INSERT INTO users (nom, prenom, email) VALUES (:nom, :prenom, :email)");
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':email', $email);
    
        try {
            $stmt->execute();
            echo "Apprenant added successfully";
        } catch (PDOException $e) {
            echo "Error adding apprenant: " . $e->getMessage();
        }
    }









    
    ?>