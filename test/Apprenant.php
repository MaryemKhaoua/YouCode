<?php


    include 'DataBase.php';

class Apprenant extends DataBase {
    private $id;
    private $nom;
    private $prenom;
    private $email;

    public function addApprenant($nom, $prenom, $email)
    {
        $stmt = $this->connexion()->prepare("INSERT INTO users (nom, prenom, email) VALUES (:nom, :prenom, :email)");
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':email', $email);

        return $stmt->execute();
    }

    public function getApprenants()
    {
        $stmt = $this->connexion()->prepare("SELECT * FROM users");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateApprenant($apprenantId, $newNom, $newPrenom, $newEmail)
    {
        $stmt = $this->connexion()->prepare("UPDATE users SET nom=:newNom, prenom=:newPrenom, email=:newEmail WHERE id=:id");
        $stmt->bindParam(':newNom', $newNom);
        $stmt->bindParam(':newPrenom', $newPrenom);
        $stmt->bindParam(':newEmail', $newEmail);
        $stmt->bindParam(':id', $apprenantId);

        return $stmt->execute();
    }

    public function deleteApprenant($apprenantId)
    {
        $stmt = $this->connexion()->prepare("DELETE FROM users WHERE id=:id");
        $stmt->bindParam(':id', $apprenantId);

        return $stmt->execute();
    }
}
