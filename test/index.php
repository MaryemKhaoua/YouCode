<?php

include_once "app/controllers/RegisterController.php";

$registercontroller = new RegisterController();

if (isset($_POST['action']) ){

    $post = $_POST['action'];
    switch ($post) {
        case 'register':
            $registercontroller->register();
            break;
        
        default:
            # code...
            break;
    }



    if (isset($_GET['action']) ){

        $get = $_GET['action'];
        switch ($post) {
            case 'register':
                echo "a";
                include_once "views/register.php";
                break;
            
            default:
                # code...
                break;
        }



}


}
?>
