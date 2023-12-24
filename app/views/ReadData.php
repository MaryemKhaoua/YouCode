<?php 
include_once "core/DataBase.php";
include_once "views/Apprenant.php"; 


class Apprenant extends Database {
    public function getApprenant(){
        $sqlsel = "SELECT * FROM users";
        return $this->connect()->query($sqlsel)->fetchAll();
    }

}
$apprenantObj = new Apprenant();
$user = $apprenantObj->getApprenant();