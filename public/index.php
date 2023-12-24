<?php


$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'register':
        $registerController = new RegisterController();
        $registerController->registerUser();
        break;
    case 'login':
        break;
    default:
        break;
}


















?>