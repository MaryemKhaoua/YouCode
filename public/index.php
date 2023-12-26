<?php

$registerController = new RegisterController();
$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'register':
        
        $registerController->registerUser();
        break;
    case 'login':
        break;
    default:
        break;
}


















?>